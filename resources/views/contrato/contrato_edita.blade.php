@extends('principal')
@section('conteudo')
<script type="text/javascript">
    var novocarro;
    window.onload = function()
    {
        muda();
    };
            
    function muda()
    {
	document.getElementById("basico").style.display = "block";
        document.getElementById("veiculos").style.display = "none";
    }
    function mudav()
    {
        document.getElementById("basico").style.display = "none";
        document.getElementById("veiculos").style.display = "block";
    }
    function mudab()
    {
        document.getElementById("basico").style.display = "block";
        document.getElementById("veiculos").style.display = "none";
    }
    
    
</script>
<h4>Edição de Contrato</h4>

@foreach ($contrato as $p)
<?php
    $id = $p->id;
    $tipo = $p->tipo;
    $user = $p->user_id;
    $clienteid = $p->cliente_id;
    $clientenome = $p->cliente->cli_nome;
    
    $vigencia = date('d-m-Y' ,strtotime($p->vigencia));
    $taxaadmin = $p->taxaadmin;
    $taxamulta = $p->taxamulta;
    $vencimento = $p->vencimento;
?>
@endforeach


<div id="basico" style="border:2px #333 solid;">
<input type="button" value="Basico">  -------------------- <input type="button" value="Veiculos" onclick="mudav()">    
<form method="post" action="/contrato_atualiza">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    <label>Numero</label>
    <input readonly="true" name="id" value='{{$id}}'>
    <label>Tipo</label>
    <select required="" name="tipo" >
        <option value="{{$tipo}}"></option>
        <option value="1">Rent A Car</option>
        <option value="2">Terceirização</option>
    </select>
    </br>
    
    <label>Vendedor (código)</label></input>
    <input name="user_id" value='{{$user}}'></br>
    
    <label>Cód Cliente</label></input>
    <input required name="cliente_id" value="{{$clienteid}}"></br>
    
    <label>Nome Cliente</label></input>
    <input name="nome_cli" value="{{$clientenome}}"><input type="button" value="Buscar"></br>
    
    <label>Vigencia(Fim do Contrato)</label></input>
    <input type="date" name="vigencia" value="{{$vigencia}}"></br>
    
    <label>Taxa Administrativa</label></input>
    <input name="taxaadmin" value="{{$taxaadmin}}"></br>
    
    <label>Taxa de Multa (preencher só o valor, sem %)</label></input>
    <input name="taxamulta" value="{{$taxamulta}}"></br>
    
    <label>Dia de Vencimento (01 a 30)</label></input>
    <input required name="vencimento" value="{{$vencimento}}"></br>
    
    <button type="submit">Salvar</button>
    <a href="/contrato"><input type='button' value='Voltar' /></a>
    
</form>
</div>

<div id="veiculos" style=" border:2px #333 solid;" >
<input type="button" value="Basico" onclick="mudab()">  -------------------- <input type="button" value="Veiculos" ">    

<form method="get" action="contrato_veiculo">
    <input type="hidden" name="id" id="id" value='{{$id}}'>
        <button type="submit">Incluir novo {{$id}}</button>
</form>  

        <table border='1'>
            <tr>
                <td colspan="7">Dados Entrada</td>
                <td colspan="4">Dados Saída</td>
            </tr>
            <tr>
                <td>Placa</td>
                <td>Data</td>
                <td>Hora</td>
                <td>KM</td>
                <td>Combustivel</td>
                <td>Tipo</td>
                <td>Valor</td>
                <td>Data</td>
                <td>Hora</td>
                <td>KM</td>
                <td>Combustivel</td>
            </tr>
            @if(!empty($veiculos))
            @foreach ($veiculos as $p)
            <tr>
                <td>{{$p->movimentacao->placa}}</td>
                <td>{{date('d-m-Y',strtotime($p->movimentacao->data_inicio))}}</td>
                
                <td>{{date('H:i',strtotime($p->movimentacao->data_inicio))}}</td>
                <td>{{$p->movimentacao->km}}</td>
                <td>{{$p->movimentacao->combustivel}}</td>
                <td>{{$p->periodo}}</td>
                <td>{{$p->valor}}</td>
                   
                    @if(!empty($p->movimentacao->data_fim))
                    <td> 
                        {{date('d-m-Y',strtotime($p->movimentacao->data_fim))}}
                    </td>
                    <td>
                        {{date('H:i',strtotime($p->movimentacao->data_fim))}}
                    </td>
                    <td>{{$p->movimentacao->kmfim}}</td>
                    <td>{{$p->movimentacao->combustivelfim}}</td>
                
                    
                @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <form action="contrato_retira" method="get">
                        <input type="hidden" name="movimentacao" id="movimentacao" value="{{$p->movimentacao->id}}">
                        <input type="hidden" name="contrato" id="contrato" value="{{$id}}">
                        <input type='submit' value='Excluir'/>
                    </form>
                    </td>
                    <td>
                    <form method="get" action="contrato_sai">
                        
                        <a href="/contrato_sai/{{$p->movimentacao->id}}"><input type='button' value='Retirar Veiculo'/></a>
                    </form>  
                    </td>
                @endif
                
            </tr>
            
            
            @endforeach
            @endif
        </table>
        
        
      
</div>


@stop
