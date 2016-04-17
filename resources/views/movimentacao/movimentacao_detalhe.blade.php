@extends('principal')

@section('mostra')
<script type="text/javascript">
    function busca()
    {
        // pegando o value
        var data_inicio = document.getElementById('data_inicio').value;
        var data_fim = document.getElementById('data_fim').value;
        var placa = document.getElementById('placa').value;
        //chegagem se os campos não estão em branco
        if  (placa == ""){
            alert("A Placa deve ser preenchida!");
        } else{
        document.envia.submit();
        }
    }    

</script>

<form name="envia" method="get" action='/movimentacao_detalhe'>
    <table>
    <tr>
        <td>Data Inicio </td>
        <td>Data Fim </td>
        <td>Placa </td>            
    </tr>
    <tr>
        
        <td><input type="text" id='data_inicio' name='data_inicio'</td>
        <td><input type="text" id='data_fim' name='data_fim'</td>
        <td><input type="text" id='placa' name='placa' value="{{$placa}}"</td>
        <td><input type="button" value='Buscar Novo'onclick="busca()"></input> </td>
    </tr>
    </table>
    
    
</form>
    

<table border='1'>
     
        <tr>
            <td> Placa</td>
            <td> Status</td>
            <td> Data Inicial</td>
            <td> Hora Inicial</td>
            <td> Data Final</td>
            <td> Hora Final</td>
            <td> KM  </td>
            <td> Combustivel  </td>
            <td> Módulo       </td>
        </tr>
      
        @foreach($mov as $mov)
        
       
        <tr>
            <td>{{$mov->placa}}</td>    
            <td><?php echo ($mov->status->nome);  ?></td>
            <td><?php echo date('d/m/Y', strtotime($mov->data_inicio));  ?></td>
            <td><?php echo date('H:i', strtotime($mov->data_inicio));?></td>
            <td>
                <?php if (!empty($mov->data_fim)){
                echo date('d/m/Y', strtotime($mov->data_fim));}
                ?>
            </td>
            <td>
                <?php if (!empty($mov->data_fim)){
                echo date('H:i', strtotime($mov->data_fim));}
                ?>
            
            </td>

            <td>{{$mov->km}}</td>   
            <td>{{$mov->combustivel}}</td>
            <td>{{$mov->modulo}}</td>   
            
        </tr>
        
   
        @endforeach
</table>   
@stop