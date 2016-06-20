@extends('principal')
@section('conteudo')

<script type="text/javascript">
    function novo()
    {
        location.href='/contrato_novo';
    }
    
</script>
<div class="container">
    <h2>Contratos</h2>    
    <form name="envia" method="get" action="/contrato_busca">            
        <div class="row">
            <div class="col-sm-10">
                <div class="well">                    
                    <div class="row">                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="id">Nº Contrato</label>
                                <input type="text" class="form-control" id="id" name="id"placeholder="Numero do Contrato" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cliente_id">Cod. Cliente</label>
                                <input type="text" class="form-control" id="cliente_id" name="cliente_id"placeholder="Código do Cliente" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cliente_nome">Nome do Cliente</label>
                                <input type="text" class="form-control" id="cliente_nome" name="cliente_nome"placeholder="Nome do Cliente" >
                            </div>
                        </div>
                        <input type='submit' class="btn btn btn-success" value='Buscar'/>
                        @can('comercial')
                            <input type="button" class="btn btn-primary" value='Novo Contrato'onclick="novo()">
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if(empty($contratos))        
    @else
    <div class="row">
    <div class="col-sm-10">
    <div class="well">
    <table class="table table-striped table-bordered table-hover">     
        <tr>
            <td>Detalhes</td>
            <td><b>Codigo do Contrato</b></td>
            <td><b>Nome do Cliente</b></td>        
            <td><b>Fim do Contrato</b></td>
        </tr>
        @foreach ($contratos as $p)
        <tr>
            <td>
                <form action="contrato_edita" method="get">
                    <input name="id" type="hidden" value="{{$p->id}}">                
                    <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </form>            
            </td>   
            <td>{{ $p->id}} </td>    
            <td>{{$p->cliente->cli_nome }}</td> 
            
            <td>{{date('d-m-Y', strtotime($p->vigencia))}}</td>
        </tr>
        @endforeach 
    </table>
    </div>
    </div>
    </div>
        
    @endif      
</div>

@stop

