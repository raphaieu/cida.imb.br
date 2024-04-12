@extends('template')

@section('title', $pageTitle)

@section('content')
    <h1 class="h5">{{ $titulo }}</h1>
    <p class="mt-3">{{ $descricao }}</p>
    <hr class="my-5">
    @include('components/alerts')
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-5">
        <lista-caracteristicas
            :characteristics='{{ $results }}'
            characteristics-type="IMOVEL"
        ></lista-caracteristicas>
    </div>

@endsection
