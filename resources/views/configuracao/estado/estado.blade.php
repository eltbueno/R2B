@extends('configuracao.configuracao')
@section('menuconf')
@stop

@section('conteudo')
<section id='estbase'>
<script type="text/javascript">
    function novo()
    {
        location.href='/estado_novo';
    }
    
    function para()
    {
        endforech;
    }

</script>

<h2> Cadastro de Estados</h2>
<table border='0'>
    <tr>
        <td>Codigo</td>
        <td>Nome</td>        
    </tr>
    <tr>
    <form method="get" action="/estado_busca">
        <td><input type="text" name='id'</td>        
        <td><input type="text" name='nome'</td>
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Novo Estado'onclick="novo()"></input> </td>
    </form>
    </tr>   
</table>
@yield('estbase')
</section>
@stop