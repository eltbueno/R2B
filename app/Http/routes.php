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
Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', function () {
    return view('principal');
});


Route::get('/cliente', function () {
    return view('cliente.cliente');
});
Route::get('/cliente_busca','ClienteController@busca');
Route::get('/cliente_novo', function () {
    return view('cliente.cliente_novo');
});
Route::post('/cliente_adiciona','ClienteController@adiciona');
Route::get('/cliente_edita','ClienteController@edita');
Route::post('/cliente_atualiza','ClienteController@atualiza');
Route::get('/cliente_apaga/{id}','ClienteController@apaga');

Route::get('/veiculo', function () {
    return view('veiculo.veiculo');
});
Route::get('/veiculo_busca','VeiculoController@busca');
Route::get('/veiculo_novo', function () {
    return view('veiculo.veiculo_novo');
});
Route::post('/veiculo_adiciona','VeiculoController@adiciona');
Route::get('/veiculo_edita','VeiculoController@edita');
Route::post('/veiculo_atualiza','VeiculoController@atualiza');
Route::get('/veiculo_apaga/{placa}','VeiculoController@apaga');



Route::get('/configuracao', function () {
    return view('configuracao.configuracao');
});

Route::get('/cidade', function () {
    return view('configuracao.cidade.cidade');
});
Route::get('/cidade_novo', function () {
    return view('configuracao.cidade.cidade_novo');
});
Route::post('/cidade_adiciona', 'CidadeController@adiciona');
Route::post('/cidade_atualiza','CidadeController@atualiza');
Route::get('/cidade_busca','CidadeController@busca');
Route::get('/cidade_edita','CidadeController@edita');
Route::get('/cidade_apaga','CidadeController@apaga');


Route::get('/estado', function () {
    return view('configuracao.estado.estado');
});
Route::get('/estado_novo', function () {
    return view('configuracao.estado.estado_novo');
});
Route::post('/estado_adiciona', 'EstadoController@adiciona');
Route::post('/estado_atualiza','EstadoController@atualiza');
Route::get('/estado_busca','EstadoController@busca');
Route::get('/estado_edita','EstadoController@edita');




Route::get('/montadora', function () {
    return view('configuracao.montadora.montadora');
});
Route::get('/modelo', function () {
    return view('configuracao.modelo.modelo');
});