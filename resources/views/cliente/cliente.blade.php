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
<tr>
<form class="form-inline">
<!-- <table border='0'>
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
		
<form class="form-inline">
  <div class="form-group">
    <label for="name3">Name</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Seu Nome">
  </div>
  </br>
  <div class="form-group">
    <label for="email2">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Seu Email">
  </div>
  </br>
  <form method="get" action="/cliente_busca">
  <div class="form-group">
  <label for="fj">Fisico/Juridico</label>
  <select class="form-control">
  <option value=''></option>
  <option value='1'>Fisico</option>
  <option value='2'>Juridico</option>
</select>
</div>
</form>
  <button type="submit" class="btn btn-primary">Buscar</button>
  <button type="button" onclick="novo()" class="btn btn-default">Novo Cliente</button>
</form>
    </tr>
    


@yield('clibase')
</section>
@stop

