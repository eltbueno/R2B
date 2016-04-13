@extends('configuracao.status.status')
@section('menuconf')
@stop
@section('conteudo')
<h1>Novo Status</h1>

<form method="post" action="/status_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    
    <label>Nome</label>    
    <input requird name="nome"></input></br> 
   
       
    
    <button type="submit">Cadastrar</button>
    <a href="/status"><input type='button' value='Voltar' /></a>
    
</form>    
    
@stop