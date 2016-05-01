@extends('principal')
@section('user')
<header>
    <h1>Novo Usuário</span></h1>
</header>
<div class="text-info">
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
</div>

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div class="col-md-6">
        Nome
        <input required type="text" name="nome" value="{{ old('nome') }}">
    </div>
    <div class="col-md-6">
        Login
        <input required type="text" name="login" value="{{ old('login') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Senha
        <input required type="password" name="password">
    </div>

    <div class="col-md-6">
        Confirme a Senha
        <input required type="password" name="password_confirmation">
    </div>
    <div class="col-md-6" required >
        Perfil
        <select  name="perfil" >
            <option value=""> </option>
            <option value="administrador"> Administrador</option>
            <option value="comercila"> Comercial</option>
            <option value="operacional"> Operacional</option>
            
        </select>
    </div>
    
    <div>
        <button type="submit">Cadastrar</button>
        <button type="button">Voltar</button>
    </div>
@stop