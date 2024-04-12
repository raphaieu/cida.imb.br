@extends('template')

@section('title', 'Cida Imóveis - Atualizar Imóvel')

@section('content')
    <h1 class="h5">Atualizar de Imóvel</h1>
    <p class="mt-3">Atualizar este imóvel.</p>
    <hr class="my-5">
    <div class="card">
        <div class="card-body">
            @include('components/alerts')
            <form action="{{ route('imovel.salvar') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="imovel_id" value="{{ $imovel->imovel_id }}">
                <div class="flex mb-4">
                    <div class="w-1/2 mr-4">
                        <label for="HeadlineAct" class="block text-gray-700 font-medium mb-2">Tipo do Imóvel</label>
                        <select
                            name="tipo_imovel"
                            id="HeadlineAct"
                            class="border border-gray-300 p-2 w-full bg-white"
                        >
                            <option value="">Please select</option>
                            <option value="JM">John Mayer</option>
                            <option value="SRV">Stevie Ray Vaughn</option>
                            <option value="JH">Jimi Hendrix</option>
                            <option value="BBK">B.B King</option>
                            <option value="AK">Albert King</option>
                            <option value="BG">Buddy Guy</option>
                            <option value="EC">Eric Clapton</option>
                        </select>
                    </div>
                    <div class="w-1/2 mr-4">
                        <label for="HeadlineAct" class="block text-gray-700 font-medium mb-2">Tipo do Negócio:</label>
                        <select
                            name="tipo_imovel"
                            id="HeadlineAct"
                            class="border border-gray-300 p-2 w-full bg-white"
                        >
                            <option value="">Please select</option>
                            <option value="JM">John Mayer</option>
                            <option value="SRV">Stevie Ray Vaughn</option>
                            <option value="JH">Jimi Hendrix</option>
                            <option value="BBK">B.B King</option>
                            <option value="AK">Albert King</option>
                            <option value="BG">Buddy Guy</option>
                            <option value="EC">Eric Clapton</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="title">Título</label>
                    <input
                        id="title"
                        class="border border-gray-300 p-2 w-full"
                        type="text"
                        name="title"
                        value="{{ $imovel->imovel_titulo }}"
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="description">Descrição</label>
                    <tiny-m-c-e :initial-value="{{ json_encode($imovel->imovel_descricao) }}"></tiny-m-c-e>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Imagens</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10" id="drop-area">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="fileElem" id="fileLabel" class="file-label relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    Arraste e solte ou clique aqui para selecionar arquivos
                                </label>
                                <input name="files[]" type="file" id="fileElem" multiple class="sr-only">
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF até 10MB</p>
                        </div>
                    </div>
                </div>
                <div id="thumbnails" class="mb-4"></div>
                <div style="display: none; position: absolute;" id="enlarged-image-container">
                    <img id="enlarged-image" alt="Ampliação da imagem" style="max-width: 50%; max-height: 50%; margin: -250px auto; display: block;">
                </div>
                <section id="image-list" class="overflow-hidden text-gray-700">
                    <div class="container px-5 py-2 mx-auto lg:pt-24 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            <div class="flex flex-wrap w-full">
                                @foreach ($imovel->imagens as $image)
                                <div id="image-{{ $image->img_id }}" class="w-1/5 p-1 md:p-2">
                                    <label>
                                    <img src="{{ Storage::url('images/' . $image->img_nome) }}" class="block object-cover object-center w-full h-full rounded-lg">
                                    <input type="radio" name="img_destaque" value="1" {{ $image->img_destaque ? 'checked' : '' }}>Destaque</label>
                                    <label><input type="checkbox" name="delete"  value="{{ $image->img_id }}">Excluir</label>
                                    <input type="number" name="img_ordem" value="{{ $image->img_ordem }}" class="order">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                <br clear="all"/>
                <button class="bg-indigo-500 text-white py-2 px-4 rounded" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection
