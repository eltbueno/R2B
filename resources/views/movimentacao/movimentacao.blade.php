@extends('principal')
@section('conteudo')

<script type="text/javascript">
    function busca()
    {
        // pegando o value
        var id = document.getElementById('status_id').value;
        //pegado o texto da opção
        var nome = document.getElementById('status_id').options[document.getElementById('status_id').selectedIndex].text;
        var placa = document.getElementById('placa').value;
        //chegagem se os campos não estão em branco
        if (id == "" && placa == ""){
            alert("Preencha o Status ou a placa");
        } else{
        document.envia.submit();
        }
    }    

</script>

<div class="container">
    <h2>Movimentações</h2>    
    <form name="envia" method="get" action="/movimentacao_busca">            
        <div class="row">
            <div class="col-sm-10">
                <div class="well">                    
                    <div class="row">                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="placa">Placa</label>
                                <input type="text" class="form-control" id="placa" name="placa"placeholder="Digite a Placa" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="status_id">Status</label>
                                <select class="form-control" id="status_id" name="status_id">
                                    <option value="">Selecione</option>
                                    @foreach ($status as $p)
                                    <option value="{{$p->id}}"> {{$p->nome}} </option>
                                    @endforeach   
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type='button'onclick="busca()" class="btn btn btn-success" value='Buscar'/>
                </div>		
            </div>
        </div>
    </form>
    @if(empty($mov))
        
    @else 
    <div class="well">
        <table class="table table-striped table-bordered table-hover"> 
            <tr>
                <td><b>Placa</b></td>
                <td><b>Status</b></td>
                <td><b>Data Inicial</b></td>
                <td><b>Hora Inicial</td>
                <td><b>KM</td>
                <td><b>Combustivel</td>
                <td><b>Módulo</td>
                <td>Detalhes</td>
            </tr> 


            @foreach ($mov as $p)
            <tr>
                   
                <td>{{$p->placa}}</td>    
                <td>{{$p->status->nome}}</td>
                <td><?php echo date('d-m-Y', strtotime($p->data_inicio));  ?></td>
                <td><?php echo date('H:i', strtotime($p->data_inicio));?></td>
                <td>{{$p->km}}</td>   
                <td>{{$p->combustivel}}</td>
                <td>{{$p->modulo}}</td>
                <td>
                    <form action="/movimentacao_detalhe" method="get">
                        <input name="placa" type="hidden" value="{{$p->placa}}">                
                        <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </form>            
                </td>
            </tr>
            @endforeach 
        </table>
    </div>  
    @endif    
        
</div>


@stop