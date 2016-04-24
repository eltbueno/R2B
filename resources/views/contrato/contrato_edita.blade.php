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
    function novov()
    {
        //buscacarro = window.open("contrato_veiculo", "BuscaCarro", "width=800,height=600");
        //buscacarro.focus();
    }
    
</script>
<h4>Edição de Contrato</h4>

@foreach ($contrato as $p)
<?php
    $id = $p->id;
    $tipo = $p->tipo;
    $user = $p->user_id;
    $cliente = $p->cliente_id;
    //$vigencia = $p->vigencia;
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
    <input required name="cliente_id" value="{{$cliente}}"></br>
    
    <label>Nome Cliente</label></input>
    <input name="nome_cli"><input type="button" value="Buscar"></br>
    
    <label>Vigencia (data final dd-mm-aaa)</label></input>
    <input name="vigencia" value="{{$vigencia}}"></br>
    
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
        <label readonly="true" name="id" value=''>
        <a href="/contrato_veiculo/{{$id}}"><input type='button' value='Novo Veiculo2'/></a>
        <table border='1'>
            <tr>
                <td colspan="7">Dados Entrada</td>
                <td colspan="3">Dados Saída</td>
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
            </tr>
            @if(!empty($veiculos))
            @foreach ($veiculos as $p)
            <tr>
                <td>{{$p->movimentacao->placa}}</td>
                <td>{{$p->movimentacao->data_inicio}}</td>
                <td>{{$p->movimentacao->data_inicio}}</td>
                <td>{{$p->movimentacao->km}}</td>
                <td>{{$p->movimentacao->combustivel}}</td>
                <td>{{$p->periodo}}</td>
                <td>{{$p->valor}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            
            
            @endforeach
            @endif
        </table>
        
        
    </form>    
</div>


@stop
