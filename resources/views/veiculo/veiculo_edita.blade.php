@extends('veiculo.veiculo')
@section('conteudo')
<h1>Edição de Veiculo</h1>

<?php if(empty($veiculos)){
        echo "<h2>veiculo não encontrado</h2>";
    }else {?>
<form method="post" action="/veiculo_atualiza">      
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
     
   
    <?php foreach ($veiculos as $p):?>
    
    <label>Placa</label>   
    
    <input required name="placa" value="<?= $p->placa ?>" </input></br>
    <label>Chassi</label>
    
    <input required name="chassi" value="<?= $p->chassi ?>" ></input></br>   
    
    <label>Renavan</label></input>
    <input name="renavan" value="<?= $p->renavan ?>"></input></br>
    
    <label>Ano de Fabricação</label></input>
    <input name="anofab" value="<?= $p->anofab ?>"></input></br>
    
    <label>Modelo</label></input>
    <input name="anomod" value="<?= $p->anomod ?>"></input></br>
    
    <label>Grupo</label></input>
    <select name="grupo">
        <option value=''></option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
    </select>
    
    <button type="submit">Alterar</button>
    <a href="/veiculo"><input type='button' value='Voltar' /></a>
    <a href="/veiculo_apaga/<?= $p->placa ?>"><input type='button' value='Apagar'/></a>
   
        <?php    endforeach ;    }?>
        

</form>

@stop