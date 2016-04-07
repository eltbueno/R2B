@extends('cliente.cliente')
@section('clibase')
@stop

@section('mostra')

<?php if(empty($clientes)){
        echo "<h2>Cliente não encontrado</h2>";
    }else {?>

<form method="get" action="/cliente_edita">      
<table border='1'>    
    <tr>
        <td><b>Codigo</b></td>
        <td><b>Nome</b></td>
        <td><b>Endereço</b></td>
        <td><b>Estado</td>
        <td><b>Cidade</td>         
    </tr>   
    <?php foreach ($clientes as $p):            
        ?>        
        <tr>
        <td><input type="submit" name="cli_id" value="<?= $p->cli_id ?>" readonly="true">  </input> </td>    
        <td><?= $p->cli_nome ?></td>
        <td><?= $p->cli_end ?></td>
        <td><?= $p->cli_estado ?></td>
        <td><?= $p->cli_cidade ?></td>       
        
        </tr>
   
        <?php    endforeach ;    }
        
        echo"<h3>Clique no codigo do cliente para ediatar</h3>";
        ?>
        
</table>
</form>

 
    
@stop