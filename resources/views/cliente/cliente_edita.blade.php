@extends('cliente.cliente')
@section('conteudo')
<h1>Edição de Cliente</h1>
<script type="text/javascript">
    function apaga()
    {
        location.href='/cliente_apaga';
    }
</script>


<?php if(empty($clientes)){
        echo "<h2>Cliente não encontrado</h2>";
    }else {?>
<form method="post" action="/cliente_atualiza">      
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
     
   
    <?php foreach ($clientes as $p):?>
    
    <label>Codigo</label>   
    
    <input name="id" value="<?= $p->id ?>" readonly="true"></input></br>
    <label>Nome</label>
    
    <input required name="cli_nome" value="<?= $p->cli_nome ?>" ></input></br>   
    
    <label>Endereço</label></input>
    <input name="cli_end" value="<?= $p->cli_end ?>"></input></br>
    
    <label>Numero</label></input>
    <input name="cli_end_num" value="<?= $p->cli_end_num ?>"></input></br>
    
    <label>Complemento</label></input>
    <input name="cli_end_com" value="<?= $p->cli_end_com ?>"></input></br>
    
    <label>Bairro</label></input>
    <input name="cli_bairro" value="<?= $p->cli_bairro ?>"></input></br>
    
    <label>Cidade</label></input>
    <input name="cli_cidade" value="<?= $p->cli_cidade ?>"></input></br>
    
    <label>Estado</label></input>
    <input name="cli_estado" value="<?= $p->cli_estado ?>"></input></br>
    
    <label>CEP</label></input>
    <input name="cli_cep" value="<?= $p->cli_cep ?>"></input></br>
    
    <label>Telefone</label></input>
    <input name="cli_tel" value="<?= $p->cli_tel ?>"></input></br>
    
    <label>Observação</label></input>
    <input name="cli_obs" value="<?= $p->cli_obs?>"></input></br>
    
    <label>Fisico/Juridico</label></input>
    <select name="cli_tipo" >
        <option value="<?= $p->cli_tipo ?>"></option>
        <option value='1'>Fisico</option>
        <option value='2'>Juridico</option>
    </select>
    
    
    <button type="submit">Alterar</button>
    <a href="/cliente"><input type='button' value='Voltar' /></a>
    <a href="/cliente_apaga/<?= $p->id ?>"><input type='button' value='Apagar'/></a>
   
        <?php    endforeach ;    }?>
        

</form>

@stop