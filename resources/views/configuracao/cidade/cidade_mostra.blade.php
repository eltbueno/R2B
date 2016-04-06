@extends('configuracao.cidade.cidade')
@section('menuconf')
@stop

@section('cidbase')

@stop

@section('mostra')

<?php if(empty($cidades)){
        echo "<h2>Cidade não encontrada</h2>";
    }else { echo "<h3>Clique no codigo para editar</h3>";?>

<form method="get" action="/cidade_edita">      
<table border='1'>    
    <tr>
        <td><b>Código</b></td>
        <td><b>Nome</b></td>
        <td><b>Estado</b></td>         
    </tr>   
    <?php foreach ($cidades as $p): ?>        
        <tr>
        <td><input type="submit" name="id" value="<?= $p->id ?>" readonly="true">  </input> </td>    
        <td><?= $p->nome ?></td>
        <td><?= $p->estado_id ?></td>
        </tr>   
        <?php    endforeach ; }    ?>        
</table>
</form>

@stop
