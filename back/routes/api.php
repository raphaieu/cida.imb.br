<?php

use App\Http\Controllers\ImovelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('{routeName}/{params?}', [ImovelController::class, 'index'])->where('params', '(.*)');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

