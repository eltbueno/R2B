@extends('principal')
@section('conteudo')

<section id='conbase'>

<h3>Contratos</h3>
<script type="text/javascript">
    function novo()
    {
        location.href='/contrato_novo';
    }
    
</script>


<table border='0'>
    <tr>
        <td>Numero do Contrato</td>
        <td>Códico Cliente</td>        
        <td>Nome Cliente</td>        
       
    </tr>
    <tr>
    <form method="get" action="/contrato_busca">
        
        <td><input type='text' name='id'/></td>
        <td><input type='text' name='cliente_id'/></td>
        <td><input type='text' name='cliente_nome'/></td>
        
        <td><input type='submit' value='Buscar'/></td>
        @can('comercial')
        <td><input type="button" value='Novo Contrato'onclick="novo()"></input> </td>
        @endcan
        </form>
    </tr>
    
</table>
@yield('conbase')
</section>
<?php 
    if(empty($contratos)) {   }
    else
    {
        
        echo " Clique na linha do Contrato para Edita </br>";
?>
<table border='1'>
    <tr>
        <td><b>Codigo do Contrato</b></td>
        <td><b>Nome do Cliente</b></td>
                
    </tr> 
<?php
        foreach ($contratos as $p):            
?> 
    <form id="editacli" name="editacli" method="get" action="contrato_edita">
        
            
            <td><input name='id'value='{{$p->id}}'readonly="true"> </td>    
            <td> {{$p->cliente->cli_nome }} </td>
            
            @can('comercial')
            <td><input type="submit" value="Editar"> </td>
            @endcan
        </tr>
   </form>
 
 <?php    endforeach ; }
 ?>
</table>
@stop

