@extends('movimentacao.movimentacao')
@section('movbase')
@stop
@section('mostra')

<form method="get" action='/movimentacao_detalhe'>
    <table border="1">
        <tr>
            <td>Placa</td>
            <td>Status</td>
            <td>Data Inicial</td>
            <td>Hora Inicial</td>
            <td>KM</td>
            <td>Combustivel</td>
            <td>Módulo</td>
        </tr>
      
        @foreach($mov as $p)
        
       
        <tr>
        <input style="display: none" type="text" id='placa' name='placa' value="{{$p->placa}}" ></input>
            <td>{{$p->placa}}</td>    
            <td>{{$p->status->nome}}</td>
            <td><?php echo date('d-m-Y', strtotime($p->data_inicio));  ?></td>
            <td><?php echo date('H:i', strtotime($p->data_inicio));?></td>
            <td>{{$p->km}}</td>   
            <td>{{$p->combustivel}}</td>
            <td>{{$p->modulo}}</td>   
            <td><input type="submit" value="Detalhado" readonly="true">  </input></td>
        </tr>
                
        @endforeach
    </table>
</form>      

@stop