@extends('configuracao.configuracao')
@section('menuconf')
@stop

@section('conteudo')
<section id='movbase'>
<script type="text/javascript">
    function novo()
    {
        location.href='/cidade_novo';
    }
    
    function para()
    {
        endforech;
    }
    

</script>

<h2> Movimentações</h2>
<table border='1'>
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>UF/Estado</td>
    </tr>
    <tr>
    <form method="get" action="/cidade_busca">
        <td><input type="text" name='id'</td>
        <td><input type="text" name='nome'</td>
        <td><input type="text" name='estado_id'</td>
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Nova Cidade'onclick="novo()"></input> </td>
    </form>
    </tr>
    
    
</table>
@yield('movbase')
</section>
@stop