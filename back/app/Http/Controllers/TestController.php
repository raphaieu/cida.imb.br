<?php

namespace App\Http\Controllers;

use App\Models\Canalpro;
use App\Models\CanalproImagem;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function index()
    {
        return view('template');
    }

    public function getImovelImagesFromZapImoveis()
    {
        $imoveis = Canalpro::all();
        $lastCanalproId = 0;
        foreach ($imoveis as $imovel) {
            $zapimoveisJson = $imovel->zapimoveis_json;
            $canalproId = $imovel->canalpro_id;
            $downloaded = ['2684474920','2683987717','2683983377','2683465236','2683465021','2682337360','2681757124','2681736909','2681507007', '2680496507','2679818723','2679752096',
                '2677498635','2676349994','2676312484','2676241005','2676052195','2675722803','2675721919', '2675428000'];
            $zapimoveisArray = json_decode($zapimoveisJson, true);
            if (!in_array($canalproId, $downloaded)) {
                if ($zapimoveisArray !== null) {
                    $imagens = $zapimoveisArray['medias'];
                    foreach ($imagens as $index =>  $imagem) {
                        $imagemId = $imagem['id'];
                        $imageName = ($index + 1);
                        echo "<b>$canalproId</b> - <a href=\"https://resizedimgs.zapimoveis.com.br/fit-in/800x360/named.images.sp/$imagemId/$imageName.jpg\" target=\"_blank\">https://resizedimgs.zapimoveis.com.br/fit-in/800x360/named.images.sp/$imagemId/$imageName.jpg</a><br/>";
                    }
                    if ($canalproId !== $lastCanalproId) echo "<hr/>";
                    $lastCanalproId = $canalproId;
                }
            }
        }

    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function canalpro()
    {
//         DB::beginTransaction();
        try {
            $filePath = storage_path('app/public/anuncios.json');

            if (file_exists($filePath)) {
                $jsonContent = file_get_contents($filePath);
                $data = json_decode($jsonContent, true);

                $urls = array();
                foreach ($data['data']['listings']['listListing'] as $listing) {

                    if ($listing['id'] === '') continue;

//                    $canalpro = new Canalpro();
//                    $canalpro->canalpro_id = $listing['id'];
//                    $canalpro->canalpro_json = json_encode($listing);
//                    $canalpro->slug = $this->geraSlug($listing);
//                    $canalpro->zapimoveis_json = 'https://www.zapimoveis.com.br/imovel/' . $canalpro->slug . '/?preview=true';
//                    $canalpro->save();

//                    $zapimoveisUrl = 'https://glue-api.zapimoveis.com.br/v2/page/imovel/' . $slug . '/?preview=true&includeFields=listing(sourceId,listingsCount,displayAddressType,amenities,usableAreas,constructionStatus,listingType,description,title,stamps,createdAt,deletedAt,floors,unitTypes,nonActivationReason,providerId,propertyType,unitSubTypes,unitsOnTheFloor,legacyId,id,portal,unitFloor,parkingSpaces,updatedAt,address,suites,publicationType,externalId,bathrooms,usageTypes,totalAreas,advertiserId,advertiserContact,bedrooms,whatsappNumber,acceptExchange,pricingInfos,showPrice,resale,buildings,capacityLimit,status,priceSuggestion,contractType),account(id,name,logoUrl,licenseNumber,showAddress,legacyVivarealId,legacyZapId,config,createdDate),medias,accountStats(totalCount),page(metaContent,widgets,advertiserLinks,uriFragments,listingLinks),preview,priceHistory,listingSummary,schema,lastModified,abmi(advertiserPartner)&__zt=mtc:deduplication2023&hideSummary=true';
//                    $zapimoveisResponse = Http::get($zapimoveisUrl);
//                    if ($zapimoveisResponse->successful()) {
//                        $zapimoveisJson = $zapimoveisResponse->json();
//                        $canalpro->zapimoveis_json = json_encode($zapimoveisJson);
//                    }
//                    $slug = $this->geraSlug($listing);
//                    echo '<a href="https://www.zapimoveis.com.br/imovel/' . $slug . '/?preview=true">' .  $listing['id'] . '</a> https://www.zapimoveis.com.br/imovel/' . $slug . '/?preview=true<br/>';
                    $directory = 'app/public/canalpro/' . $listing['id'];
                    Storage::makeDirectory($directory);
                    $downloaded = ['2684474920','2683987717','2683983377','2683465236','2683465021','2682337360','2681757124','2681736909','2681507007', '2680496507','2679818723','2679752096',
                        '2677498635','2676349994','2676312484','2676241005','2676052195','2675722803','2675721919', '2675428000'];

                    if (!in_array($listing['id'], $downloaded)) {
                        foreach ($listing['images'] as $index => $image) {
                            $imageUrl = $image['imageUrl'];

                            $client = new Client();
                            $response = $client->get($imageUrl);

                            $imageName = ($index + 1) . '.' . pathinfo($imageUrl, PATHINFO_EXTENSION);

                            Storage::put($directory . '/' . $imageName, $response->getBody());

    //                        $canalproImagem = new CanalproImagem();
    //                        $canalproImagem->canalpro_id = $listing['id'];
    //                        $canalproImagem->url_imagem = $imageUrl;
    //                        $canalproImagem->caminho_local = $imageName;
    //                        $canalproImagem->save();
                        }
                    }
                }
            }
//             DB::commit();
        } catch (Exception $e) {
//             DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param $listing
     * @return string
     */
    private function geraSlug($listing): string
    {
        $businessType = $listing['pricingInfos'][0]['businessType'];

        $tipoNegocio = '';
        if ($businessType === 'SALE') {
            $tipoNegocio = 'venda-';
        } elseif ($businessType === 'RENTAL') {
            $tipoNegocio = 'aluguel-';
        }

        $unitType = $listing['unitTypes'][0];
        $tipoImovel = '';
        if ($unitType === 'APARTMENT') {
            $tipoImovel = 'apartamento';
        } elseif ($unitType === 'HOME') {
            $tipoImovel = 'casa';
        } elseif ($unitType === 'ALLOTMENT_LAND') {
            $tipoImovel = 'terreno-lote';
        }

        // Construa o slug com base nas informações do imóvel
        $slug = $tipoNegocio . $tipoImovel . '-' . $listing['bedrooms'][0] . '-quartos';

        // Adicione o bairro ao slug, removendo espaços em branco e caracteres especiais
        $slug .= '-' . Str::slug($listing['originalAddress']['neighborhood']);

        // Adicione a cidade e estado ao slug
        $slug .= '-' . Str::slug($listing['address']['city']) . '-' . Str::slug($listing['address']['state']);

        // Adicione o tamanho do imóvel ao slug
        $slug .= '-' . $listing['usableAreas'][0] . 'm2';

        // Adicione o ID do imóvel ao slug
        $slug .= '-id-' . $listing['id'];

        return $slug;
    }
}
