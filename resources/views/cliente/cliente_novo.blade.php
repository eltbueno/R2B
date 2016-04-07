@extends('principal')
@section('conteudo')
<h1>Novo Cliente</h1>

<form method="post" action="/cliente_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    
    <label>Nome</label>
    <input name="cli_nome" required></input></br>
    
    <label>Endereço</label></input>
    <input name="cli_end"></input></br>
    
    <label>Numero</label></input>
    <input name="cli_end_num"></input></br>
    
    <label>Complemento</label></input>
    <input name="cli_end_com"></input></br>
    
    <label>Bairro</label></input>
    <input name="cli_bairro"></input></br>
    
    <label>Cidade</label></input>
    <input name="cli_cidade"></input></br>
    
    <label>Estado</label></input>
    <input name="cli_estado"></input></br>
    
    <label>CEP</label></input>
    <input name="cli_cep"></input></br>
    
    <label>Telefone</label></input>
    <input name="cli_tel"></input></br>
    
    <label>Observação</label></input>
    <input name="cli_obs"></input></br>
    
    <label>Fisico/Juridico</label></input>
    <select name="cli_tipo" required>
        <option value=''></option>
        <option value='1'>Fisico</option>
        <option value='2'>Juridico</option>
    </select>
    
    <button type="submit">Cadastrar</button>
    <a href="/cliente"><input type='button' value='Voltar' /></a>
</form>

@stop
