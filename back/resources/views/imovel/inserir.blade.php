@extends('template')

@section('title', 'Cida Imóveis - Novo Imóvel')

@section('content')
    @include("components/tinymce")
    <h1 class="h5">Cadastro de Imóvel</h1>
    <p class="mt-3">Cadastra um novo imóvel no site.</p>
    <hr class="my-5">
    <div class="card">
        <div class="card-body">
            @include('components/alerts')
            <form action="{{ route('imovel.salvar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="title">Título</label>
                    <input
                        id="title"
                        class="border border-gray-300 p-2 w-full"
                        type="text"
                        name="title"
                        value=""
                    >
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="description">Descrição</label>
                    <textarea
                        id="description"
                        class="bg-gray-200 border border-gray-300 p-2 w-full h-32"
                        name="description"
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Imagens</label>
                    <input
                        type="file"
                        class="form-file"
                        name="files[]"
                        multiple
                    >
                </div>
                <button class="bg-indigo-500 text-white py-2 px-4 rounded" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection
