@extends('configuracao.estado.estado')
@section('menuconf')
@stop

@section('conteudo')
<form method="post" action="/estado_atualiza">      
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" /> 
   
    <?php foreach ($estados as $p):?>
    
    <label>Codigo</label>    
    <input name="id" value="<?= $p->id ?>" readonly="true"></input></br>
    <label>Nome</label>    
    <input name="nome" value="<?= $p->nome ?>" ></input></br>
    <button type="submit">Alterar</button>
    <a href="/estado"><input type='button' value='Voltar' /></a>
    <?php endforeach;?>
</form>

@stop