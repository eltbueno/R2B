@extends('principal')
@section('conteudo')
<section id='conbase'>
<h3>Cadastro - Contratos</h3>
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
        
        <td><input type='codigo' name='id'/></td>
        <td><input type='text' name='cliente_id'/></td>
        <td><input type='text' name='cliente_nome'/></td>
        
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Novo Contrato'onclick="novo()"></input> </td>
        
        </form>
    </tr>
    
</table>
@yield('conbase')
</section>
@stop

