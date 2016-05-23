@extends('principal')
@section('conteudo')

    
<script type="text/javascript">
    function novo()
    {
        location.href='/cliente_novo';
    }
</script>
		
    <div class="container">
        <h2>Cadastro - Clientes</h2>
        <!--<form id="cadastro1" novalidate="novalidate"> -->
        <form method="get" action="/cliente_busca">
            
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                @if(!empty($message))
                                    <span class="label-success" >{{$message}}</span>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         
                        <div class="col-md-4">
                            <div class="form-group">
				<label class="control-label" for="id">Código</label>
				<input type="text" class="form-control" id="id" placeholder="Código Cliente" name="id">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_nome">Nome</label>
                                <input type="text" class="form-control" id="cli_nome" name="cli_nome" placeholder="Nome do Cliente">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="fj1">Tipo de usuário (Fisico/Juridico)</label>
                                    <select id="cli_tipo" class="form-control" name="cli_tipo">
                                        <option value="">Selecione</option>
                                        <option value="1">Fisico</option>
                                        <option value="2">Juridico</option>
                                    </select>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- essa tag quebra a linha, manda os campos para baixo, ajuda a acertar o form
                    <div class="row">                        
                        
                    </div>
                    -->
                                   
                    <input type='submit' class="btn btn btn-success" value='Buscar'/>
                    @can('comercial')
                    <input type="button" class="btn btn-primary" value='Novo Cliente'onclick="novo()">
                    @endcan
		</div>		
            </div>
        </div>
    
        </form>
    </div>



@if(empty($clientes))
        
@else 
<div class="well">
<table class="table table-striped table-bordered table-hover"> 
    <col width="30px">
    <col width="30px">
    <col width="200px">
    <col width="200px">
    <col width="100px">
    <col width="100px">
    <tr>
        <td></td>
        <td><b>Codigo</b></td>
        <td><b>Nome</b></td>
        <td><b>Endereço</b></td>
        <td><b>Estado</td>
        <td><b>Cidade</td>         
    </tr> 

    
    @foreach ($clientes as $p)
    <tr>
        <td>
            <form action="cliente_edita" method="get">
                <input name="id" type="hidden" value="{{$p->id}}">                
                <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </form>            
        </td>   
        <td>{{ $p->id}} </td>    
        <td>{{ $p->cli_nome }}</td>
        <td>{{ $p->cli_end }}</td>
        <td>{{ $p->cli_estado }}</td>
        <td>{{ $p->cli_cidade }}</td>   
    </tr>
    @endforeach 
       
        
</table>
</div>

 @endif
@stop

