@extends('cliente.cliente')
@section('clibase')
@stop

@section('mostra')

@if(empty($clientes)){
        echo "<h2>Cliente não encontrado</h2>";
@else 
<div class="well">
<table class="table table-striped table-bordered table-hover"> 
    <col width="30px">
    <col width="30px">
    <col width="200px">
    <col width="200px">
    <col width="100px">
    <col width="100px">
    <tr>
        <td></td>
        <td><b>Codigo</b></td>
        <td><b>Nome</b></td>
        <td><b>Endereço</b></td>
        <td><b>Estado</td>
        <td><b>Cidade</td>         
    </tr> 

    
     @foreach ($clientes as $p)
    <tr>
        <td>
            <form action="cliente_edita" method="get">
                <input name="id" type="hidden" value="{{$p->id}}">
                <input type="submit" value="Editar">                
            </form>            
        </td>   
        <td>{{ $p->id}} </td>    
        <td>{{ $p->cli_nome }}</td>
        <td>{{ $p->cli_end }}</td>
        <td>{{ $p->cli_estado }}</td>
        <td>{{ $p->cli_cidade }}</td>   
    </tr>
    @endforeach 
       
        
</table>
</div>

 @endif
    
@stop