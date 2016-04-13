@extends('configuracao.configuracao')
@section('menuconf')
@stop

@section('conteudo')

<form method="post" action="/status_atualiza">      
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" /> 
   
    <?php foreach ($status as $p):?>
    
    <label>Codigo</label>    
    <input name="id" value="<?= $p->id ?>" readonly="true"></input></br>
    <label>Nome</label>    
    <input name="nome" value="<?= $p->nome ?>" ></input></br>
 
        <button type="submit">Alterar</button>
    <a href="/status"><input type='button' value='Voltar' /></a>    
    <a href="/status_apaga/<?= $p->id ?>"><input type='button' value='Apagar'/></a>
   
    <?php endforeach;?>
</form>

@stop