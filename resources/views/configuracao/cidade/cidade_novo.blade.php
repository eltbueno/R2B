@extends('configuracao.cidade.cidade')
@section('menuconf')
@stop
@section('conteudo')
<h1>Nova Cidade</h1>

<form method="post" action="/cidade_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    
    <label>Nome</label>
    
    <input name="nome"></input></br>
    <label>Estado</label>
    <input name="estado"></input></br>
       
    
    <button type="submit">Cadastrar</button>
    <a href="/cidade"><input type='button' value='Voltar' /></a>
    
</form>    
    
@stop