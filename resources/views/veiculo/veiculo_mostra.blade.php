@extends('veiculo.veiculo')
@section('veibase')
@stop

@section('mostra')

<?php if(empty($veiculos)){
        echo "<h2>Veiculo não encontrado</h2>";
    }else {?>

<form method="get" action="/veiculo_edita">      
<table border='1'>    
    <tr>
        <td><b>Placa</b></td>
        <td><b>Chassi</b></td>
        <td><b>Ano Fabricação</b></td>
        <td><b>Modelo</td>
        <td><b>Grupo</td>         
    </tr>   
    <?php foreach ($veiculos as $p):            
        ?>        
        <tr>
        <td><input type="submit" name="placa" value="<?= $p->placa ?>" readonly="true">  </input> </td>    
        <td><?= $p->chassi ?></td>
        <td><?= $p->anofab ?></td>
        <td><?= $p->anomod ?></td>
        <td><?= $p->grupo ?></td>       
        
        </tr>
   
        <?php    endforeach ;    }
        
        echo"<h3>Clique na placa para editar</h3>";
        ?>
        
</table>
</form>

 
    
@stop