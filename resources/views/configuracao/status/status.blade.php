@extends('configuracao.configuracao')
@section('menuconf')
@stop

@section('conteudo')
<section id='stabase'>
<script type="text/javascript">
    function novo()
    {
        location.href='/status_novo';
    }
</script>
<div class="container">
<h2> Cadastro de Status</h2>
<table border='1'>
    <tr>
        <td>Código</td>
        <td>Nome</td>
        
    </tr>
    <tr>
    <form method="get" action="/status_busca">
        <td><input type="text" name='id'</td>
        <td><input type="text" name='nome'</td>
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Novo Status'onclick="novo()"></input> </td>
    </form>
    </tr>    
</table>
</div>
@yield('stabase')

</section>
@stop