@extends('principal')
@section('conteudo')
<script type="text/javascript">
    var popup;
    function SelectName()
    {
        popup = window.open("busca_cli", "Popup", "width=800,height=600");
        popup.focus();
    }

</script>
<h1>Novo Contrato</h1>
<form method="post" action="/contrato_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    <label>Numero</label>
    <input readonly="true" name="id">
    <label>Tipo</label>
    <select required="" name="tipo">
        <option value=""></option>
        <option value="1">Rent A Car</option>
        <option value="2">Terceirização</option>
    </select>
    </br>
    
    <label>Vendedor (código)</label></input>
    <input name="user_id"><label>Digite 1 aqui</label></br>
    
    <label>Cód Cliente</label></input>
    <input required id="cliente_id" name="cliente_id"></br>
    
    
    //busca pelo nome aqui
    <label>Nome Cliente</label></input>
    <input id="nome_cli" name="nome_cli"><input type="button" value="Buscar" onclick="SelectName()"></br>
    
    <label>Vigencia (data final dd-mm-aaa)</label></input>
    <input name="vigencia"></br>
    
    <label>Taxa Administrativa</label></input>
    <input name="taxaadmin"></br>
    
    <label>Taxa de Multa (preencher só o valor, sem %)</label></input>
    <input name="taxamulta"></br>
    
    <label>Dia de Vencimento (01 a 30)</label></input>
    <input required name="vencimento"></br>
    <button type="submit">Salvar</button>
    <a href="/contrato"><input type='button' value='Voltar' /></a>
    
</form>

@stop