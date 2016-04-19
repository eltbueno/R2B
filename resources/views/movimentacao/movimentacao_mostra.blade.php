@extends('movimentacao.movimentacao')
@section('movbase')
@stop
@section('mostra')

<form method="get" action='/movimentacao_detalhe'>
    <div id="menu2"> 
        <ul>
            <li>Placa</li>
            <li>Status</li>
            <li>Data Inicial</li>
            <li>Hora Inicial</li>
            <li>KM</li>
            <li>Combustivel</li>
            <li>Módulo</li>
        </ul>
        </br>
        @foreach($mov as $p)
        
        <a href='/movimentacao_detalhe'>
        <ul>
            <li>{{$p->placa}}</li>    
            <li><?php echo ($p->status->nome);  ?></li>
            <li><?php echo date('d-m-Y', strtotime($p->data_inicio));  ?></li>
            <li><?php echo date('H:i', strtotime($p->data_inicio));?></li>
            <li>{{$p->km}}</li>   
            <li>{{$p->combustivel}}</li>
            <li>{{$p->modulo}}</li>   
            <li><input type="submit" name="placa" value="{{$p->placa}}" readonly="true">  </input></li>
        </ul>
            </br>
        </a>
        @endforeach
    </div>
</form> 
    
    <?php
   // $data1 = date('15/01/2016');
   // $hora1 = date('08:00');
           
   // $junta = $data1.$hora1;
   //     echo $junta;
   // ?>
       


<p>
    <?php 
    //  $mov2 = \r2b\Movimentacao::all();
    //  foreach ($mov2 as $mov2)
    //  {
    //    echo $mov2->id . ' / ' . $mov2->status->nome;
    //  }
          
    ?>       
</p>
@stop