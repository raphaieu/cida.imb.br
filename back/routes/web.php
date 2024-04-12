<?php

use App\Http\Controllers\ImovelController;
use App\Http\Controllers\CaracteristicasImovelController;
use App\Http\Controllers\CaracteristicasEdificioController;
use App\Http\Controllers\ConfigImovelController;
use App\Http\Controllers\ConfigNegocioController;
use App\Http\Controllers\ConfigEnderecosController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', [TestController::class, 'index'])->name('dashboard');

// Gerenciamento dos Imóveis e Importações / imagens
Route::get('/imoveis', [ImovelController::class, 'listarImoveis'])->name('imovel.listar');
Route::get('/imovel/inserir', [ImovelController::class, 'inserirImovel'])->name('imovel.inserir');
Route::get('/imovel/editar/{id}', [ImovelController::class, 'editarImovel'])->name('imovel.editar');
Route::get('/imovel/status/{id}', [ImovelController::class, 'mudarStatus'])->name('imovel.status');
Route::post('/imovel/salvar', [ImovelController::class, 'salvarImovel'])->name('imovel.salvar');
Route::get('/imovel/busca', [ImovelController::class, 'busca'])->name('imovel.busca');
Route::get('/gerarImagem', [ImovelController::class, 'gerarImagem'])->name('imovel.gerarImagem');

// Gerenciamento das Características (Imóveis e Edifício)
Route::get('/caracteristicas/imovel', [CaracteristicasImovelController::class, 'index'])->name('imovel.caracteristica');
Route::post('/caracteristicas/imovel/novo', [CaracteristicasImovelController::class, 'store'])->name('imovel.caracteristica.novo');
Route::put('/caracteristicas/imovel/salvar/{id}', [CaracteristicasImovelController::class, 'update'])->name('imovel.caracteristica.salvar');
Route::delete('/caracteristicas/imovel/excluir/{id}', [CaracteristicasImovelController::class, 'delete'])->name('imovel.caracteristica.excluir');

Route::get('/caracteristicas/edificio', [CaracteristicasEdificioController::class, 'index'])->name('edificio.caracteristica');

// Configs
Route::get('/config/imovel-tipo', [ConfigImovelController::class, 'index'])->name('config.imovel');
Route::get('/config/negocio-tipo', [ConfigNegocioController::class, 'index'])->name('config.negocio');
Route::get('/config/enderecos', [ConfigEnderecosController::class, 'index'])->name('config.endereco');

// Testes
Route::get('/template', [TestController::class, 'index'])->name('test.index');
// CanalPro
Route::get('/canalpro', [TestController::class, 'canalpro'])->name('canalpro.index');
Route::get('/canalpro/imagens', [TestController::class, 'getImovelImagesFromZapImoveis'])->name('canalpro.images');
