@extends('principal')
@section('conteudo')

<div class="container">
    <div class="text-info">
        @if(Session::has('message'))
            {{Session::get('message')}}
        @endif
    </div>
    <form method="post" action="{{url('usuario_edita')}}">
        {{csrf_field()}}
        <h2>Novo Usuário</h2>
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="nome">Nome</label>
                                <input value="{{Input::old('nome')}}" type="text" class="form-control" id="nome" name="nome">
                                <div class="text-danger">{{$errors->formuser->first('nome')}}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="login">Login</label>
                                <input value="{{Input::old('login')}}" type="text" class="form-control" id="login" name="login">
                                <div class="text-danger">{{$errors->formuser->first('login')}}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="email">E-Mail</label>
                                <input value="{{Input::old('email')}}" type="email" class="form-control" id="email" name="email">
                                <div class="text-danger">{{$errors->formuser->first('email')}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="password">Senha</label>
                                <input value="{{Input::old('password')}}" type="password" class="form-control" id="password" name="password">
                                <div class="text-danger">{{$errors->formuser->first('password')}}</div>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="password_confirmation">Repita a Senha</label>
                                <input value="{{Input::old('password_confirmation')}}" type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                <div class="text-danger">{{$errors->formuser->first('password_confirmation')}}</div>
                                
                            </div>
                        </div>
                    </div>
                
                   <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="perfil">Perfil</label>
                                <select class="form-control" name="perfil" >
                                    <option value=""> Selecione </option>
                                    <option value="administrador"> Administrador</option>
                                    <option value="comercial"> Comercial</option>
                                    <option value="operacional"> Operacional</option>
                                </select>
                                <div class="text-danger">{{$errors->formuser->first('perfil')}}</div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn btn-success">Cadastrar</button>
                    <a href="/usuario"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                </div>
            </div>
        </div>
    </form>       
</div>



<!--

<header>
    <h1>Novo Usuário</span></h1>
</header>
<div class="text-info">
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
</div>

<form method="POST" action="/usuario_salva">
    {!! csrf_field() !!}
    <p>
    <div class="col-md-6">
        Nome
        <input required type="text" name="nome" value="{{ old('nome') }}">
    </div>
    </p>
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
            <option value="comercial"> Comercial</option>
            <option value="operacional"> Operacional</option>
            
        </select>
    </div>
    
    <div>
        <button type="submit">Cadastrar</button>
        <button type="button">Voltar</button>
    </div>
-->
@stop