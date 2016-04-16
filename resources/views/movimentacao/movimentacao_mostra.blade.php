@extends('movimentacao.movimentacao')
@section('movbase')
@stop
@section('mostra')

<form method="get" action="/movimentacao_novo">   
    
    
<table border='1'>    
    <tr>
        <td><b>Placa</b></td>
        <td><b>Status</b></td>
        <td><b>Data Inicial</b></td>
        <td><b>Hora Inicial</td>
        <td><b>KM</td>
        <td><b>Combustivel</td>
        <td><b>Módulo</td>
    </tr>   
    
        @foreach($mov as $mov)
        <tr>
        <td><input type="submit" name="id" value="{{$mov->placa}}" readonly="true">  </input> </td>    
        <td>{{$mov->status_id}}</td>
        <td><?php echo date('d/m/Y', strtotime($mov->hora));  ?></td>
        <td><?php echo date('H:i', strtotime($mov->hora));?></td>
        <td>{{$mov->km}}</td>   
        <td>{{$mov->combustivel}}</td>
        <td>{{$mov->modulo}}</td>   
        </tr>
        @endforeach
        
    
    
    <?php
    $data1 = date('15/01/2016');
    $hora1 = date('08:00');
           
    $junta = $data1.$hora1;
        echo $junta;
    ?>
       
</table>
</form>
@stop