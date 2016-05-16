@extends('principal')
@section('conteudo')
<section id='clibase'>
<h2>Cadastro - Clientes</h2>
<script type="text/javascript">
    function novo()
    {
        location.href='/cliente_novo';
    }
</script>
<!--<tr>
<form class="form-inline">
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
        
        </table> 
       
        
        </form>-->
		
<form class="form-inline" method="get" action="/cliente_busca">
    <div class="form-group">
        <label for="id">Código</label>
        <input type="text" name="id"class="form-control" id="exampleInputName2" placeholder="Digite o Código do cliente">
    </div>
    </br>
    <div class="form-group">
        <label for="cli_nome">Nome</label>
        <input type="text" name="cli_nome"class="form-control" id="exampleInputEmail2" placeholder="Nome do Cliente">
    </div>
    </br>
  
    <div class="form-group">
        <label for="cli_tipo">Fisico/Juridico</label>
        <select class="form-control" name="cli_tipo">
            <option value=''></option>
            <option value='1'>Fisico</option>
            <option value='2'>Juridico</option>
        </select> 
    </div>

  <button type="submit" class="btn btn-primary">Buscar</button>
  <button type="button" onclick="novo()" class="btn btn-default">Novo Cliente</button>
</form>

    


@yield('clibase')
</section>
@stop

