<?php

use App\Http\Controllers\ImovelController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('admin/imovel', ImovelController::class, ['names' => 'imovel']);
Route::resource('admin/test', TestController::class, ['names' => 'test']);