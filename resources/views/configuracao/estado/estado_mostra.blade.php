@extends('configuracao.estado.estado')
@section('menuconf')
@stop

@section('estbase')

@stop

@section('mostra')

<?php if(empty($estados)){
        echo "<h2>Estado não encontrado</h2>";
    }else { echo "<h3>Clique no codigo para editar</h3>";?>

<form method="get" action="/estado_edita">      
<table border='1'>    
    <tr>
        <td><b>Codigo</b></td>
        <td><b>Nome</b></td>         
    </tr>   
    <?php foreach ($estados as $p): ?>        
        <tr>
        <td><input type="submit" name="id" value="<?= $p->id ?>" readonly="true">  </input> </td>    
        <td><?= $p->nome ?></td>
        </tr>   
        <?php    endforeach ; }    ?>        
</table>
</form>

@stop