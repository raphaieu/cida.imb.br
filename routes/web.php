<?php

use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\CorretorController;
use App\Http\Controllers\ImagemController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/admin', function () {
        return Inertia::render('Admin/Index');
    })->name('dashboard');
    
    Route::resource('admin/imovel', ImovelController::class, ['names' => 'imovel']);
    
    Route::resource('admin/negocio', NegocioController::class, ['names' => 'negocio']);
    Route::resource('admin/caracteristicas', CaracteristicasController::class, ['names' => 'caracteristicas']);
    Route::resource('admin/imagens', ImagemController::class, ['names' => 'imagem']);
    Route::resource('admin/corretor', CorretorController::class, ['names' => 'corretor']);
});
Route::resource('admin/test', TestController::class, ['names' => 'test']);