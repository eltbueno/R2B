@extends('principal')
@section('conteudo')

<script lang="text/javascript">
    window.onload = function()
    {
        var mensagem = "{{$message}}";
        if (mensagem == 1)
        {
            alert ("Apagado com Sucesso!");
        }
        
    };

</script>
<div class="container">
    <h2>Cadastro - Usuários</h2>        
    
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                <form method="post" action="/usuario_busca">
                {{csrf_field()}}
                                      
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
				<label class="control-label" for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome">
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
				<label class="control-label" for="perfil">Perfil</label> <br>
                                <select class="form-control" name="perfil" id="perfil">
                                    <option value=""></option>
                                    <option value="administrador">Administrador</option>
                                    <option value="comercial">Comercial</option>
                                    <option value="operacional">Operacional</option>
                                </select>				
                            </div>
                        </div>
                        <div class="col-md-4">    
                            <div class="form-group">
                                <br>
                                <input type='submit' class="btn btn btn-success" value='Buscar'/>                               
                            </div>
                            <input type="button" class="btn btn-primary" value='Novo'onclick="location.href='usuario_novo'">
                        </div>
                    </div>
                </form>                            
                       
                </div>
                @if(empty($usuarios))
                @else
                <div class="well">                    
                    <div class="row">
                        <div class="col-md-4">
                            
                            <br>
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <td>Nome</td>
                                    <td>Perfil</td>            
                                    <td>Login</td>
                                    <td>Detalhes</td>
                                </tr>
                                
                                @foreach($usuarios as $p)
                                <tr>
                                    <td>
                                        <form action="usuario_detalhe" method="get">
                                            <input name="id" type="hidden" value="{{$p->id}}">                
                                            <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                        </form>            
                                    </td>
                                    <td>{{$p->nome}}</td>
                                    <td>{{$p->perfil}}</td>            
                                    <td>{{$p->login}}</td>
                                    
                                </tr>
                                @endforeach
                                
                            </table>   
                        </div>                        
                    </div> 
                    
                </div>
                @endif    
            </div>
        </div>
    
</div>


@stop