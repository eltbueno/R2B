@extends('principal')
@section('conteudo')

    <script type="text/javascript">
        window.onload = function()
        {
            var mensagem = "{{$message}}";
            if (mensagem == 1)
            {
                alert ("Usuario está em um Contrato!");
            }
            if (mensagem == 2)
            {
                alert ("Atualizado com Sucesso!");
            }
            if (mensagem == 3)
            {
                alert ("Cadastrado com Sucesso!");
            }

        };
        function edita()
        {
            document.getElementById("mostra").style.display = "none";
            document.getElementById("edita").style.display = "block";
            document.getElementById("nome").readOnly = false;
            document.getElementById("email").readOnly = false;
            document.getElementById("password").readOnly = false;
            document.getElementById("password_confirmation").readOnly = false;
            //document.getElementById("").readOnly = false;
            document.getElementById("perfil").disabled = false;
        }
        function apaga(id)
        {
            decisao = confirm("Confirma a Exclusão do Usuário?");
            if (decisao)
            {
                location.href='usuario_apaga/'+ id;
            }
        }
        function envia()
        {
            var senha = document.getElementById("password").value;
            var tamsenha = senha.length;
            
            var confirmasenha = document.getElementById("password_confirmation").value;
            var senha = parseInt(senha);
            var confirmasenha = parseInt(confirmasenha);
            
            if (tamsenha == 0 )
            {
                document.atualiza.submit();
            }
            else if (tamsenha < 6)
            {
                alert("A senha deve ter 6 caracteres");
            }
            else
            {
                if (senha === confirmasenha)
                {
                    
                    document.atualiza.submit();
                }
                else
                {
                    alert ("As senhas devem ser iguais");
                    
                }
            }
        }
        
    </script>
    
@if(empty($usuario))
    <h2>Usuário não encontrado</h2>
@else
<div class="container">
    <form method="post" action="/usuario_atualiza" name="atualiza">      
        {{csrf_field()}} 
        <h2>Edição de Usuário</h2>
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                @foreach ($usuario as $p)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <label class="control-label" for="id">ID: {{$p->id}}</label>
                                <input type="hidden" name="id" value="{{$p->id}}">
                            </div>
                        </div>
                        
                        @if(!empty($message1))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="label-success" >{{$message1}}</span>
                                </div>
                            </div>
                        @else                             
                        @endif   
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                
                                <label class="control-label" for="login">Login</label>
                                <input readonly="true" required type="text" class="form-control" id="login" name="login" value="{{$p->login}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome" class="control-label">Nome</label>
                                <input readonly="true" type="text" class="form-control" id="nome" name="nome" value="{{$p->nome}}">
                            </div>	
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="email">E-mail</label>
                                <input readonly="true" type="text" class="form-control" id="email" name="email" value="{{$p->email}}">
                            </div>
                        </div>
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label class="control-label" for="password">Senha</label>
                                <input readonly="true" type="text" class="form-control" id="password" name="password" value="">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="password_confirmation">Confirme a Senha</label>
                                <input readonly="true" type="text" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                            </div>
                                                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="perfil">Perfil</label>
                                <select disabled class="form-control" id="perfil" name="perfil">
                                    <option value="{{$p->perfil}}">{{$p->perfil}}</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="comercial">Comercial</option>
                                    <option value="operacional">Operacional</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                         
                    
                    
                    
                 
                    <div class="row">
                        <div class="col-md-4">
                            <div id="mostra">
                                
                                <input class="btn btn-warning" type='button' value='Editar'onclick="edita()"/>
                                <input class="btn btn-danger" type='button' value='Apagar'onclick="apaga('{{$p->id}}')"/>
                                
                                <a href="/usuario"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                            </div>

                            <div id="edita" >
                                <input type="button" class="btn btn btn-success" onclick="envia()" value="Salvar Alterações"/>
                                <a href="/usuario"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                            </div>

                        </div>
                    </div>
                @endforeach        
                </div>
                
            </div>            
        </div> 
    </form>
</div>
@endif   

@stop