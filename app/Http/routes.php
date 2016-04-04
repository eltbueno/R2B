<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/principal', function () {
    return view('principal');
});

Route::get('/configuracao', function () {
    return view('configuracao.configuracao');
});

Route::get('/cidade', function () {
    return view('configuracao.cidade.cidade');
});

Route::get('/estado', function () {
    return view('configuracao.estado.estado');
});
Route::get('/montadora', function () {
    return view('configuracao.montadora.montadora');
});
Route::get('/modelo', function () {
    return view('configuracao.modelo.modelo');
});