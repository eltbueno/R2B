@extends('configuracao.estado.estado')
@section('menuconf')
@stop
@section('conteudo')
<h1>Novo Estado</h1>

<form method="post" action="/estado_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    
    <label>Nome Estado</label>
    <input name="nome"></input></br>    
       
    
    <button type="submit">Cadastrar</button>
    <a href="/estado"><input type='button' value='Voltar' /></a>
    
</form>    
    
@stop