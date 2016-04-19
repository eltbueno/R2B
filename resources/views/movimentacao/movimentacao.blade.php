@extends('principal')
@section('conteudo')
<section id='movbase'>
<script type="text/javascript">
    function busca()
    {
        // pegando o value
        var id = document.getElementById('status_id').value;
        //pegado o texto da opção
        var nome = document.getElementById('status_id').options[document.getElementById('status_id').selectedIndex].text;
        var placa = document.getElementById('placa').value;
        //chegagem se os campos não estão em branco
        if (id == "" && placa == ""){
            alert("Preencha o Status ou a placa");
        } else{
        document.envia.submit();
        }
    }    

</script>

<h2> Movimentações</h2>
<table border='1'>
    <tr>
        <td>Status</td>
        <td>Placa</td>
        
    </tr>
    <tr>
    <form name='envia' method="get" action="/movimentacao_busca">
        <td>
            <select id='status_id' name='status_id'>
                
                <option value=""></option>
                @foreach ($status as $p)
                <option value="{{$p->id}}">{{$p->nome}}</option>
                @endforeach
            </select>
        
        </td>
        <td><input type="text" id='placa' name='placa'</td>
       
        <td><input type='submit' value='Buscar'/></td>
        <td><input type="button" value='Buscar Novo'onclick="busca()"></input> </td>
    </form>
    </tr>
    
    
</table>
@yield('movbase')
</section>
@stop