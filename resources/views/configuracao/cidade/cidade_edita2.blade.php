@extends('configuracao.cidade.cidade')
@section('menuconf')
@stop

@section('conteudo')
<script type="text/javascript">
    function apaga()
    {
        location.href='/cidade_apaga';
    }
</script>
<form method="post" action="/cidade_atualiza">      
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" /> 
   
    <?php foreach ($cidades as $p):?>
    
    <label>Codigo</label>    
    <input name="id" value="<?= $p->id ?>" readonly="true"></input></br>
    <label>Nome</label>    
    <input name="nome" value="<?= $p->nome ?>" ></input></br>
    <label>Estado</label>    
    <input name="estado_id" value="<?= $p->estado_id ?>" ></input></br>
    <button type="submit">Alterar</button>
    <a href="/cidade"><input type='button' value='Voltar' /></a>
    <td><input type="button" value='Excluir'onclick="apaga()"></input> </td>
    <?php endforeach;?>
</form>

@stop