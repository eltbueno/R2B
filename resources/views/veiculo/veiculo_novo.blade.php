@extends('principal')
@section('conteudo')
<h1>Novo Veiculo</h1>

<form method="post" action="/veiculo_adiciona">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    
    <label>Placa</label>
    <input  name="placa" required ></input></br>
    
    <label>Chassi</label></input>
    <input name="chassi" required></input></br>
    
    <label>Renavan</label></input>
    <input name="renavan"></input></br>
    
    <label>Ando de fabricação</label></input>
    <input name="anofab"></input></br>
    
    <label>Ano Modelo</label></input>
    <input name="anomod"></input></br>
    
    <label>Grupo</label></input>
    <select name="grupo">
        <option value=''></option>
        <option value='A'>A</option>
        <option value='B'>B</option>
        <option value='C'>C</option>
        <option value='D'>D</option>
    </select>
    <br>
    <button type="submit">Cadastrar</button>
    <a href="/veiculo"><input type='button' value='Voltar' /></a>
</form>

@stop