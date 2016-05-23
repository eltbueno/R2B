@extends('principal')
@section('conteudo')

    
<script type="text/javascript">
    function novo()
    {
        location.href='/veiculo_novo';
    }
</script>
		
    <div class="container">
        <h2>Cadastro - Veiculos</h2>
        <!--<form id="cadastro1" novalidate="novalidate"> -->
        <form method="get" action="/veiculo_busca">
            
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
				<label class="control-label" for="placa">Placa</label>
				<input type="text" class="form-control" id="placa" name="placa"placeholder="Digite a Placa" >
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="chassi">Chassi</label>
                                <input type="text" class="form-control" id="chassi" name="chassi" placeholder="Digite o Chassi">
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- essa tag quebra a linha, manda os campos para baixo, ajuda a acertar o form
                    <div class="row">                        
                        
                    </div>
                    -->
                                   
                    <input type='submit' class="btn btn btn-success" value='Buscar'/>
                    @can('operacional')
                    <input type="button" class="btn btn-primary" value='Novo Veiculo'onclick="novo()">
                    @endcan
		</div>		
            </div>
        </div>
    
        </form>
    </div>



@if(empty($veiculos))
        
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
        <td><b>Placa</b></td>
        <td><b>Chassi</b></td>
        <td><b>Ano Fabricação</b></td>
        <td><b>Ano Modelo</td>
        <td><b>Grupo</td>         
    </tr> 

    
    @foreach ($veiculos as $p)
    <tr>
        <td>
            <form action="veiculo_edita" method="get">
                <input name="placa" type="hidden" value="{{$p->placa}}">                
                <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
            </form>            
        </td>   
        <td>{{ $p->placa}} </td>    
        <td>{{ $p->chassi }}</td>
        <td>{{ $p->anofab }}</td>
        <td>{{ $p->anomod }}</td>
        <td>{{ $p->grupo }}</td>   
    </tr>
    @endforeach 
       
        
</table>
</div>

 @endif
@stop

