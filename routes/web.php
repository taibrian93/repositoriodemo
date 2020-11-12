<?php

use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoFormatoController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([ "middleware" => ['auth:sanctum', 'verified'] ], function() {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/user', [ UserController::class, "index_view" ])->name('user');
    Route::view('/user/new', "pages.user.user-new")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    Route::get('/tipoDocumento', [ TipoDocumentoController::class, "index_view" ])->name('tipoDocumento');
    Route::view('/tipoDocumento/new', "pages.tipoDocumento.tipoDocumento-new")->name('tipoDocumento.new');
    Route::view('/tipoDocumento/edit/{tipoDocumentoId}', "pages.tipoDocumento.tipoDocumento-edit")->name('tipoDocumento.edit');

    Route::get('/tipoFormato', [ TipoFormatoController::class, "index_view" ])->name('tipoFormato');
    Route::view('/tipoFormato/new', "pages.tipoFormato.tipoFormato-new")->name('tipoFormato.new');
    Route::view('/tipoFormato/edit/{tipoFormatoId}', "pages.tipoFormato.tipoFormato-edit")->name('tipoFormato.edit');

    Route::get('/idioma', [ IdiomaController::class, "index_view" ])->name('idioma');
    Route::view('/idioma/new', "pages.idioma.idioma-new")->name('idioma.new');
    Route::view('/idioma/edit/{idiomaId}', "pages.idioma.idioma-edit")->name('idioma.edit');
});
