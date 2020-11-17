<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\RegistroArchivoController;
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

    Route::get('/nodo', [ NodoController::class, "index_view" ])->name('nodo');
    Route::view('/nodo/new', "pages.nodo.nodo-new")->name('nodo.new');
    Route::view('/nodo/edit/{nodoId}', "pages.nodo.nodo-edit")->name('nodo.edit');

    Route::get('/departamento', [ DepartamentoController::class, "index_view" ])->name('departamento');
    Route::view('/departamento/new', "pages.departamento.departamento-new")->name('departamento.new');
    Route::view('/departamento/edit/{departamentoId}', "pages.departamento.departamento-edit")->name('departamento.edit');

    Route::get('/provincia', [ ProvinciaController::class, "index_view" ])->name('provincia');
    Route::view('/provincia/new', "pages.provincia.provincia-new")->name('provincia.new');
    Route::view('/provincia/edit/{provinciaId}', "pages.provincia.provincia-edit")->name('provincia.edit');

    Route::get('/distrito', [ DistritoController::class, "index_view" ])->name('distrito');
    Route::view('/distrito/new', "pages.distrito.distrito-new")->name('distrito.new');
    Route::view('/distrito/edit/{distritoId}', "pages.distrito.distrito-edit")->name('distrito.edit');

    Route::get('/registroArchivo', [ RegistroArchivoController::class, "index_view" ])->name('registroArchivo');
    Route::view('/registroArchivo/new', "pages.registroArchivo.registroArchivo-new")->name('registroArchivo.new');
    Route::view('/registroArchivo/edit/{registroArchivoId}', "pages.registroArchivo.registroArchivo-edit")->name('registroArchivo.edit');
});
