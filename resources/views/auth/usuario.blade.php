@extends('principal')
@section('user')


<form method="POST" action="usuario_busca">
    {!! csrf_field() !!}

    <div>
        Nome
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">
    </div>

    <div>
        Perfil
        <select name="perfil" id="perfil">
            <option value=""></option>
            <option value="administrador">Administrador</option>
            <option value="comercial">Comercial</option>
            <option value="operacional">Operacional</option>
            
        </select>
    </div>

    
    <div>
        <button type="submit">Buscar</button>
    </div>
    <a href="/usuario_novo"> Novo</a>
    
</form>
@if(Session::has('message'))
    {{Session::get('message')}}
    <br>
    <table border='1'>
    <tr>
        <td>Nome</td>
        <td>Perfil</td>            
        <td>Login</td>
    </tr>
    @foreach(Session::get('usuarios') as $p)
    <tr>
        <td>{{$p->nome}}</td>
        <td>{{$p->perfil}}</td>            
        <td>{{$p->login}}</td> 
    </tr>
    @endforeach
    </table>
    
    
    
@endif

@stop