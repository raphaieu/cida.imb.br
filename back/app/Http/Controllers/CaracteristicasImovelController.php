<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use App\Models\Imovel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CaracteristicasImovelController extends Controller
{
    public function index()
    {
        $tituloPagina = 'Imóveis: Características';
        $tituloConteudo = 'Características dos Imóveis';
        $descricaoConteudo = 'Gerenciamento de todas as caracterísicas pertinentes à imóveis';

        $results =  Caracteristica::where('c_tipo', 'IMOVEL')->get()->toJson();;

        return view('caracteristicas.index', [
            'pageTitle' => $tituloPagina,
            'titulo' => $tituloConteudo,
            'descricao' => $descricaoConteudo,
            'results' => $results,
        ]);
    }

    /**
     * Store a new characteristic.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'c_nome' => 'required|string|max:255',
            'c_icone' => 'nullable|string|max:255',
            'c_tipo' => 'nullable|string|max:255',
        ]);

        $caracteristica = Caracteristica::create($validatedData);

        return response()->json(['message' => 'Característica criada com sucesso!', 'data' => $caracteristica], 201);
    }

    /**
     * Update the specified characteristic.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $caracteristica = Caracteristica::findOrFail($id);

        $validatedData = $request->validate([
            'c_nome' => 'required|string|max:255',
            'c_icone' => 'nullable|string|max:255',
            'c_tipo' => 'nullable|string|max:255',
        ]);

        $caracteristica->update($validatedData);

        return response()->json(['message' => 'Característica atualizada com sucesso!', 'data' => $caracteristica]);
    }

    /**
     * Remove the specified characteristic.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $caracteristica = Caracteristica::findOrFail($id);
        $caracteristica->delete();

        return response()->json(['message' => 'Característica excluída com sucesso!']);
    }
}
