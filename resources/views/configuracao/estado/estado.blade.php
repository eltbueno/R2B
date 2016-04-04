@extends('configuracao.configuracao')
@section('menuconf')
@stop

@section('conteudo')
<section id='cidbase'>
<script type="text/javascript">
    function novo()
    {
        location.href='/cid_novo';
    }
    
    function para()
    {
        endforech;
    }

</script>

<h2> Cadastro de Estados</h2>
<table border='1'>
    <tr>
        <td>Nome</td>
        
    </tr>
    <tr>
    <form method="get" action="/cid_busca">
        <td><input type="text" name='cid_id'</td>
        <td><input type="text" name='cid_uf'</td>
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Nova Cidade'onclick="novo()"></input> </td>
    </form>
    </tr>
    
    
</table>
@yield('estbase')
</section>
@stop