@extends('principal')
@section('conteudo')
<h1>Novo Contrato</h1>
<form method="post" action="/contrato_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    <label>Numero</label>
    <input name="id"></input></br>
    
    <label>Cód Cliente</label></input>
    <input name="cliente_id"></input></br>
    
    <label>Nome Cliente</label></input>
    <input name="cli_end_num"></input></br>
    
    
</form>

$stop