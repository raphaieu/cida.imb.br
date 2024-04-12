<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImovelController extends Controller
{
    /**
     * @param Request $params
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $params)
    {
        $isDestaque = $params->get('destaque');
        $limit = $params->get('limit');
        $order = $params->get('order');
        $from = $params->get('from');
        $slug = $params->get('slug');

        if (!$slug) {
            $query = Imovel::with([
                'endereco',
                'tipoImovel',
                'tipoNegocio',
                'imagens' => function ($query) {
                    $query->orderBy('img_destaque', 'desc')
                        ->orderBy('img_ordem')
                        ->orderBy('img_id');
                }
            ]);

            if ($isDestaque === 'true') {
                $query->where('imovel_destaque', 1);
            }

            if ($from) {
                $query->where('corretor_id', $from);
            }

            if ($order) {
                $query->orderBy($order, 'desc');
            }

            if ($limit) {
                $query->limit($limit);
            }

            $results = $query->orderByDesc('imovel_id')->get();
            return response()->json($results, 200);

        } else {
            $result = Imovel::with([
                'endereco',
                'tipoImovel',
                'tipoNegocio',
                'caracteristicas.caracteristica', // Relacionamento N:M com Caracteristica do Imóvel
                'caracteristicasEdificio.caracteristica', // Relacionamento N:M com Caracteristicas do Edifício
                'imagens' => function ($query) {
                    $query->orderBy('img_destaque', 'desc')
                        ->orderBy('img_ordem', 'desc')
                        ->orderBy('img_id', 'desc');
                }
            ])->where('imovel_slug', $slug)->first();
        }
        if (!is_null($result)) {
            if (count(get_object_vars($result)) > 0) {
                return response()->json($result, 200);
            }
        }

        return response()->json(new \stdClass(), 404);
    }

    public function resultadoBusca(Request $params)
    {
        $isDestaque = $params->get('destaque');
        $limit = $params->get('limit');
        $order = $params->get('order');
        $from = $params->get('from');
        $slug = $params->get('slug');

        if (!is_null($result)) {
            if (count(get_object_vars($result)) > 0) {
                return response()->json($result, 200);
            }
        }

        return response()->json(new \stdClass(), 404);
    }
    public function importacao()
    {
        $imoveis = array();
        $result = DB::select('SELECT * FROM web_text');
        foreach ($result as $imovel) {
            $json = json_decode($imovel->content);
            $olx_data = $json->ad;

            $info = new \stdClass();
            $info->categoria = $olx_data->categoryName;
            if (strstr($olx_data->categoryName, 'Casa')) {
                $info->tipo_imovel = 1;
            }
            if (strstr($olx_data->categoryName, 'Apartamento')) {
                $info->tipo_imovel = 2;
            }
            if (strstr($olx_data->categoryName, 'Terreno')) {
                $info->tipo_imovel = 3;
            }
            $info->titulo = $olx_data->subject;
            if (strstr($olx_data->subject, 'Aluguel')) {
                $info->tipo_negocio = 1;
            }
            if (strstr($olx_data->subject, 'Venda')) {
                $info->tipo_negocio = 2;
            }
            $info->descricao = $olx_data->body;
            $info->preco = $olx_data->priceValue;
            $olx_data->priceValue .= ',00';
            $olx_data->priceValue = str_replace('R$ ', '', $olx_data->priceValue);
            $info->valor = number_format(str_replace(",",".",str_replace(".","", $olx_data->priceValue)), 2, '.', '');
            $endereco = new \stdClass();
            $endereco->logradouro = $olx_data->location->address;
            $endereco->bairro = $olx_data->location->neighbourhood;
            $endereco->municipio = $olx_data->location->municipality;
            $endereco->uf = $olx_data->location->uf;
            $endereco->cep = $olx_data->location->zipcode;
            $endereco->zona = $olx_data->location->zone;
            $endereco->regiao = $olx_data->location->region;
            $info->endereco = $endereco;
            foreach ($olx_data->properties as $key => $propriedade) {
                $propriedades = new \stdClass();
                $propriedades->item = $propriedade->label;
                $propriedades->descricao = isset($propriedade->values) && count($propriedade->values) > 0 ? $propriedade->values : $propriedade->value;
                $info->propriedades[] = $propriedades;

                switch ($propriedade->label) {
                    case 'Tipo':
                        if (strstr($propriedade->value, 'Venda')) {
                            $info->tipo_negocio = 2;
                        }
                        if (strstr($propriedade->value, 'Aluguel')) {
                            $info->tipo_negocio = 1;
                        }
                        if (strstr($propriedade->value, 'Terreno')) {
                            $info->tipo_negocio = 2;
                        }
                        break;
                    case 'Condomínio':
                        $propriedade->value .= ',00';
                        $propriedade->value = str_replace('R$ ', '', $propriedade->value);
                        $info->valor_condominio = number_format(str_replace(",",".",str_replace(".","", $propriedade->value)), 2, '.', '');
                        break;
                    case 'IPTU':
                        $propriedade->value .= ',00';
                        $propriedade->value = str_replace('R$ ', '', $propriedade->value);
                        $info->valor_iptu = number_format(str_replace(",",".",str_replace(".","", $propriedade->value)), 2, '.', '');
                        break;
                    case 'Área construída':
                    case 'Área útil':
                    case 'Tamanho':
                        $info->area = $propriedade->value;
                        break;
                    case 'Quartos':
                        $info->quarto = $propriedade->value;
                        break;
                    case 'Banheiros':
                        $info->banheiro = $propriedade->value;
                        break;
                    case 'Vagas na garagem':
                        $info->garagem = $propriedade->value;
                        break;
                }
            }
            array_push($imoveis, $info);
        }

        DB::beginTransaction();
        try {
            foreach ($imoveis as $imovel) {
                $insertImovel = "INSERT INTO imovel
                            (corretor_id, tipo_imovel_id, tipo_negocio_id, imovel_titulo,
                             imovel_descricao, imovel_area, imovel_quarto, imovel_banheiro, imovel_suite, imovel_vagas,
                             imovel_preco, imovel_valor_cond, imovel_valor_iptu)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                DB::insert($insertImovel, [
                    1,
                    $imovel->tipo_imovel ?? 4,
                    $imovel->tipo_negocio ?? 2,
                    $imovel->titulo,
                    $imovel->descricao,
                    $imovel->area ?? null,
                    $imovel->quarto ?? null,
                    $imovel->banheiro ?? null,
                    $imovel->suite ?? null,
                    $imovel->garagem ?? null,
                    $imovel->valor ?? null,
                    $imovel->valor_condominio ?? null,
                    $imovel->valor_iptu ?? null
                ]);
                $imovel_id = DB::getPdo()->lastInsertId();

                $insertEndereco = "INSERT INTO endereco
                            (endereco_imovel_id, endereco_logradouro, endereco_bairro, endereco_municipio, endereco_uf,
                             endereco_cep, endereco_zona, endereco_regiao)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                DB::insert($insertEndereco, [
                    $imovel_id,
                    $imovel->endereco->logradouro,
                    $imovel->endereco->bairro,
                    $imovel->endereco->municipio,
                    $imovel->endereco->uf,
                    $imovel->endereco->cep,
                    $imovel->endereco->zona,
                    $imovel->endereco->regiao
                ]);

                foreach ($imovel->propriedades as $propriedade) {
                    if (is_array($propriedade->descricao)) {
                        if (strstr($propriedade->item, 'imóvel')) {
                            $tipo = 'IMOVEL';
                        }
                        if (strstr($propriedade->item, 'condominio')) {
                            $tipo = 'CONDOMINIO';
                        }
                        foreach ($propriedade->descricao as $item) {
                            $c_id = DB::selectOne("SELECT c_id FROM caracteristica WHERE c_tipo = '$tipo' AND c_nome LIKE '{$item->label}'");
                            if (!$c_id) {
                                $insertCaracteristicas = "INSERT IGNORE INTO caracteristica (c_nome, c_tipo) VALUES (?, ?)";
                                DB::insert($insertCaracteristicas, [$item->label, $tipo]);
                                $c_id = DB::getPdo()->lastInsertId();
                            } else {
                                $c_id = $c_id->c_id;
                            }
                            $tabela = ($tipo == 'IMOVEL') ? 'imovel_caracteristicas' : 'imovel_edf_caracteristicas';
                            $fk = ($tipo == 'IMOVEL') ? 'c_id' : 'edf_c_id';
                            $inserImovelCaracteristicas = "INSERT INTO $tabela (imovel_id, $fk) VALUES (?, ?)";
                            DB::insert($inserImovelCaracteristicas, [$imovel_id, $c_id]);
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function atualizaSlug()
    {
        $res = Imovel::all('imovel_id', 'imovel_titulo');
        foreach ($res as $item) {
            $slug = Str::slug($item->imovel_titulo, '-');
            Imovel::where('imovel_id', $item->imovel_id)->where('imovel_slug', '-')->update(['imovel_slug' => $slug]);
        }
    }

    public function gerarImagem()
    {
        set_time_limit(0);
        $storage = Storage::disk('local');
        $diretorios = $storage->allDirectories();
        foreach ($diretorios as $diretorio) {
            if ($storage->files($diretorio)) {
                $i = 0;
                $arquivos = $storage->allFiles($diretorio);
                foreach ($arquivos as $arquivo) {
                    $ext = pathinfo($arquivo, PATHINFO_EXTENSION);
                    $ext = strtolower($ext);
                    if (strpos($storage->mimeType($arquivo), 'image/') === 0 && $diretorio !== 'public') {
                        $i++;
//                        $url = $storage->url($arquivo);
//                        $width = $image->getImageWidth();
//                        $height = $image->getImageHeight();
                        $image = new \Imagick();
                        $image->readImage($storage->path($arquivo));
                        $image->resizeImage(920,740, \Imagick::FILTER_LANCZOS, 1, true);
                        $newFile = "$diretorio/$i" . '.' . $ext;
                        $image->writeImage($storage->path($newFile));
//
//                        $image = new \Imagick();
//                        $image->readImage($storage->path($arquivo));
//                        $image->cropThumbnailImage(355, 475);
//                        $image->writeImage($diretorio . '/' . $i . '_original.' . $ext);
                    }
                }
            }
        }

//        $image = Image::make('path/to/image.jpg');
//        $image->resize(300, 200);
//        $image->save('path/to/resized_image.jpg');
    }

    public function listarImoveis()
    {
        $results = Imovel::with([
            'endereco',       // assumindo que você tem um relacionamento 'endereco' no modelo Imovel
            'tipoImovel',     // relacionamento 'tipoImovel'
            'tipoNegocio',    // relacionamento 'tipoNegocio'
            'imagens' => function ($query) {
                        $query->orderBy('img_destaque', 'desc')
                            ->orderBy('img_ordem')
                            ->orderBy('img_id');
                    }
                ])->orderByDesc('imovel_id')
            ->paginate(10);
        return view('imovel.index', compact('results'));
    }

    public function editarImovel($id)
    {
        $imovel = Imovel::with([
            'endereco',
            'tipoImovel',
            'tipoNegocio',
            'imagens' => function ($query) {
                $query->orderBy('img_destaque', 'desc')
                    ->orderBy('img_ordem', 'desc')
                    ->orderBy('img_id', 'desc');
            }
        ])->find($id);

        if (!$imovel) {
            // Trate o caso em que o imóvel não foi encontrado
            return abort(404);
        }

        return view('imovel.editar', compact('imovel'));
    }

    public function inserirImovel()
    {

        return view('imovel.inserir');
    }

    public function mudarStatus($id)
    {
        $imovel = Imovel::findOrFail($id);
        $imovel->update(['imovel_status' => !$imovel->imovel_status]);
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }

    public function salvarImovel(Request $params)
    {
        $params->validate([
            'files' => 'required',
            'title' => 'required',  // Adicionei validação para o título
            'description' => 'required'  // E para a descrição
        ]);

        $id = $params->input('imovel_id');  // Mudei para input para aceitar tanto post quanto put
        $titulo = $params->input('title');
        $descricao = $params->input('description');
        $arquivos = $params->file('files');

        if ($id) {
            // Se tiver um ID, é uma atualização
            foreach ($arquivos as $file) {
                $filename = $file->hashName();
                $file->storeAs('public/images', $filename);

                $insert = "INSERT INTO imagem (img_imovel_id, img_nome) VALUES (?, ?)";
                DB::insert($insert, [$id, $filename]);
            }
            DB::update("UPDATE imovel SET imovel_titulo = ?, imovel_descricao = ? WHERE imovel_id = ?", [$titulo, $descricao, $id]);
        } else {
            // Se não tiver ID, é uma inserção
            $id = DB::table('imovel')->insertGetId([
                'imovel_titulo' => $titulo,
                'imovel_descricao' => $descricao
            ]);
        }

        return redirect()->back();
    }

    public function busca(Request $request)
    {
        // Obtém o valor do campo de entrada "search" da solicitação
        $termoDeBusca = $request->input('search');

        // Realize a busca nos campos relevantes do modelo Imovel
        $results = Imovel::with([
            'endereco',
            'tipoImovel',
            'tipoNegocio',
            'imagens' => function ($query) {
                $query->orderBy('img_destaque', 'desc')
                    ->orderBy('img_ordem')
                    ->orderBy('img_id');
            }
        ])
            ->where(function ($query) use ($termoDeBusca) {
                $query->where('imovel_titulo', 'like', '%' . $termoDeBusca . '%');
            })
            ->orWhereHas('endereco', function ($query) use ($termoDeBusca) {
                $query->where('endereco_logradouro', 'like', '%' . $termoDeBusca . '%')
                    ->orWhere('endereco_bairro', 'like', '%' . $termoDeBusca . '%')
                    ->orWhere('endereco_municipio', 'like', '%' . $termoDeBusca . '%');
            })
            ->orWhereHas('tipoImovel', function ($query) use ($termoDeBusca) {
                $query->where('tipo_descricao', 'like', '%' . $termoDeBusca . '%');
            })
            ->orWhereHas('tipoNegocio', function ($query) use ($termoDeBusca) {
                $query->where('negocio_tipo', 'like', '%' . $termoDeBusca . '%');
            })
            ->orderByDesc('imovel_id')
            ->paginate(10);

        return view('imovel.index', compact('results', 'termoDeBusca'));
    }
}
