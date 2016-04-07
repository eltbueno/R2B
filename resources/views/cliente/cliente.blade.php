@extends('principal')
@section('conteudo')
<section id='clibase'>
<h3>Cadastro - Clientes</h3>
<script type="text/javascript">
    function novo()
    {
        location.href='/cliente_novo';
    }
</script>


<table border='0'>
    <tr>
        <td>Codigo</td>
        <td>Nome</td>        
        <td>Fisico/Juridico</td>
       
    </tr>
    <tr>
    <form method="get" action="/cliente_busca">
        
        <td><input type='codigo' name='id'/></td>
        <td><input type='text' name='cli_nome'/></td>
        
        <td><select name="cli_tipo">
                <option value=''></option> 
                <option value='1'>Fisico</option> 
                <option value='2'>Juridico</option> 
            
            </select> 
        </td>
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Novo Cliente'onclick="novo()"></input> </td>
        
        
       
        
        </form>
    </tr>
    
</table>
@yield('clibase')
</section>
@stop

