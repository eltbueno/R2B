@extends('principal')
@section('conteudo')
<section id='veibase'>
<h3>Cadastro - Veiculos</h3>
<script type="text/javascript">
    function novo()
    {
        location.href='/veiculo_novo';
    }
</script>


<table border='0'>
    <tr>
        <td>Placa</td>
        <td>Chassi</td>        
        
       
    </tr>
    <tr>
    <form method="get" action="/veiculo_busca">
        
        <td><input type='text' name='placa'/></td>
        <td><input type='text' name='chassi'/></td>
        
        
        <td><input type='submit' value='Buscar'/></td>
        @can('operacional')
        <td><input type="button" value='Novo Veiculo'onclick="novo()"></input> </td>
        @endcan
        
        
       
        
        </form>
    </tr>
    
</table>
@yield('veibase')
</section>
@stop