@extends('canalpro')

@section('title', 'Exportar Imóveis Canal Pro')

@section('content')
    <h1 class="h5">Seus Anúncios</h1>
    <p class="mt-3">Listagem de todos os imóveis anunciados pelo Código: CIDA MARTINS</p>
    <hr class="my-5">
    <div class="flex items-center justify-between">
        <div class="flex bg-gray-50 items-center p-2 rounded-md w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"/>
            </svg>
            <input class="outline-none ml-1 block w-full" type="text" name="" id="" placeholder="Digite o Código">
        </div>
        <div class="lg:ml-40 ml-10 space-x-8">
            <a href="{{ route('canalpro.export') }}">
                <button
                    class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                    Listar
                </button>
            </a>
        </div>
    </div>
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Título</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Situação</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Região</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">R$ / Negócio</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach($results as $imovel)
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                        <div class="relative h-10 w-10">
                                <?php $thumbnail = Image::make(public_path('sem-imagem.png'))->resize(125, 125)->encode('png', 80); ?>
                            @if ($imovel->imagens->isNotEmpty())
                                @php
                                    $primeiraImagem = $imovel->imagens->first();
                                @endphp
                                @if (Storage::disk('public')->exists('images/' . $primeiraImagem->img_nome))
                                    <img
                                        class="h-full w-full rounded-full object-cover object-center"
                                        src="{{ asset('storage/images/' . $primeiraImagem->img_nome) }}"
                                        alt="{{ $imovel->imovel_titulo }}"/>
                                @else
                                    <img
                                        class="h-full w-full rounded-full object-cover object-center"
                                        src="data:image/png;base64,{{ base64_encode($thumbnail) }}"
                                        alt="{{ $imovel->imovel_titulo }}"/>
                                @endif
                            @else
                                <img
                                    class="h-full w-full rounded-full object-cover object-center"
                                    src="data:image/png;base64,{{ base64_encode($thumbnail) }}"
                                    alt="{{ $imovel->imovel_titulo }}"/>
                            @endif
                            <span
                                class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                        </div>
                        <div class="text-sm">
                            <div class="font-medium text-gray-700">{{ $imovel->imovel_titulo }}</div>
                            <div class="text-gray-400">{{ $imovel->endereco->endereco_municipio }}
                                , {{ $imovel->endereco->endereco_uf }} | {{ $imovel->endereco->endereco_cep }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                            <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>Ativo</span>
                    </td>
                    <td class="px-6 py-4">{{ $imovel->endereco->endereco_regiao }}</td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                {{ $imovel->tipoNegocio->negocio_tipo }}
                            </span>
                            <span class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold text-violet-600">
                                {{ $imovel->tipoImovel->tipo_descricao }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                            <a href="{{ route('imovel.excluir', ['id' => $imovel->imovel_id]) }}">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6"
                                    x-tooltip="tooltip"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                    />
                                </svg>
                            </a>
                            <a href="{{ route('imovel.editar', ['id' => $imovel->imovel_id]) }}">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6"
                                    x-tooltip="tooltip"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                    />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
