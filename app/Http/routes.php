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

//Route::get('/', function () {
//    return view('principal');
//});

Route::get('/', 'UserController@principal');
Route::get('/principal', 'UserController@principal');
//Route::get('/entrar', function () {
//    return view('entrar');
//});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/usuario_novo', 'UserController@user');
Route::post('/usuario_salva', 'UserController@salva');
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');


Route::post('/usuario_busca', 'UserController@busca');
Route::get('/usuario', function () {
    return view('auth.usuario');
});






Route::get('/cliente','ClienteController@cliente');
Route::get('/cliente_busca','ClienteController@busca');
Route::get('/cliente_novo', function () {
    return view('cliente.cliente_novo');
});
Route::post('/cliente_adiciona','ClienteController@adiciona');
Route::get('/cliente_edita','ClienteController@edita');

Route::post('/cliente_atualiza','ClienteController@atualiza');
Route::get('/cliente_apaga/{id}','ClienteController@apaga');
Route::get('/cliente_apagaerro','ClienteController@apagaerro');
Route::get('/cliente_apagaconfirma','ClienteController@apagaconfirma');


Route::get('/veiculo', function () {
    return view('veiculo.veiculo');
});
Route::get('/veiculo_busca','VeiculoController@busca');

Route::get('/veiculo_novo', 'VeiculoController@novo');
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

Route::get('/status', function () {
    return view('configuracao.status.status');
});
Route::get('/status_novo', function () {
    return view('configuracao.status.status_novo');
});
Route::post('/status_adiciona','StatusController@adiciona');
Route::get('/status_busca','StatusController@busca');
Route::get('/status_edita','StatusController@edita');
Route::post('/status_atualiza','StatusController@atualiza');
Route::get('/status_apaga/{id}','StatusController@apaga');

Route::get('/movimentacao', 'MovimentacaoController@buscastatus');
Route::get('/movimentacao_busca', 'MovimentacaoController@busca');
Route::get('/movimentacao_detalhe', 'MovimentacaoController@detalhe');
Route::get('/movimentacao_novo', 'MovimentacaoController@novo');

Route::get('/contrato', 'ContratoController@contrato');
Route::get('/contrato_novo', 'ContratoController@novo');
Route::post('/contrato_adiciona', 'ContratoController@adiciona');
Route::get('/contrato_busca', 'ContratoController@busca');
Route::get('/contrato_edita', 'ContratoController@edita');
Route::post('/contrato_atualiza', 'ContratoController@atualiza');


Route::get('/contrato_veiculo', 'ContratoController@veiculo');

Route::post('/contrato_veiculo/salva', 'ContratoController@salvacarro');


Route::get('/contrato_retira', 'ContratoController@retiracarro');




Route::get('/contrato_sai/{placa}', 'ContratoController@sai');
Route::post('/contrato_sai/salva', 'ContratoController@carrosai');

Route::get('/busca_cli', function () 
{
    return view('contrato.busca_cli');
});
