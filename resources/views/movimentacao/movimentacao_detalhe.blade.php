@extends('principal')
@section('mostra')
@foreach ($ativo as $p)
<?php 
    $dataativa = date('Y-m-d H:i', strtotime($p->data_inicio));
    $kmativo = $p->km;
    $statusativo = $p->status->nome;
            
  ?>
@endforeach



<script type="text/javascript">
    window.onload = function()
    {
        var mensagem = "{{$message}}";
        if (mensagem == 1)
        {
            alert ("Movimentação Efetuada com Sucesso!");
        }
        
    };
    function busca()
    {
        // pegando o value
        var data_inicio = document.getElementById('datainicio').value;
        var data_fim = document.getElementById('datafim').value;
        var placa = document.getElementById('placa').value;
        //chegagem se os campos não estão em branco
        if  (placa == ""){
            alert("A Placa deve ser preenchida!");
        } else{
        document.busca1.submit();
        }
    }
    function nova_movimentacao()
    {
        //pegando os valores ativos do banco de dados
        var placa = "{{$placa}}";
        var dataativa = ("{{$dataativa}}");
        var kmativo = "{{$kmativo}}";
        
        //pegando os valores do formulario
        var data = document.getElementById('data').value;        
        var hora = document.getElementById('hora').value;        
        var km = document.getElementById('km').value;
        var combustivel = document.getElementById('combustivel').value;
        var status = document.getElementById('status').value;
        //verifica se todos os campos foram preenchidos
        if (data == "")
        {
            alert ('Data é obrigatória!');
        }
        else if (hora == "")
        {
            alert ('Hora é obrigatória!');
        }
        else if (km == "")
        {
            alert ('KM é obrigatório!');
        }
        else if (combustivel == "")
        {
            alert ('Combustivel é obrigatório!');
        }
        else if (status == "")
        {
            alert ('Status é obrigatório!');
        }
        else
        {
            //ajustando os campos para comparações
            var novadata = new Date (data+ " " +hora);
            var km = parseInt(km);
            dataativa = new Date(dataativa);
            
            // a nova data não pode ser menor que a data do sistema
            if (dataativa > novadata)
            {
                alert('A nova data não pode ser menor que a atual: ' + dataativa);
        
            }else
            {
                // o novo km não pode ser menor que o km do sistema
                if (kmativo > km)
                {
                    alert('O novo KM não pode ser menor que o atual: ' + kmativo);
                }
                else
                {
                    //se todos os testes passarem, envia o form.
                    document.novo.submit();         
                }
            }                       
        }
    }    

</script>

<div class="container">
    <form name="busca1" method="get" action="/movimentacao_detalhe">            
        <div class="row">
            <div class="col-sm-10">
                <div class="well">                    
                    <div class="row">                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="placa">Placa</label>
                                <input value="{{$placa}}" type="text" class="form-control" id="placa" name="placa"placeholder="Digite a Placa" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="datainicio">De</label>
                                <input type="date" class="form-control" id="datainicio" name="datainicio" >
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="datafim">Ate</label>
                                <input type="date" class="form-control" id="datafim" name="datafim" >
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <br>
                                
                                <input type='button'onclick="busca()" class="btn btn btn-success" value='Nova Busca'>
                            </div>                            
                        </div> 
                    </div>
                </div>		
            </div>
        </div>
    </form>
    
    <div class="row">
    <div class="col-sm-10">
    <div class="well">
        <table class="table table-striped table-bordered table-hover"> 
            <tr>
                
                <td><b>Placa</td>
                <td><b>Status</td>
                <td><b>Data Inicial</td>
                <td><b>Hora Inicial</td>
                <td><b>Data Final</td>
                <td><b>Hora Final</td>
                <td><b>KM</td>         
                <td><b>Combustivel</td>
                <td><b>Módulo</td>
            </tr> 


            @foreach ($mov as $p)
            <tr>
                <td>{{ $p->placa}} </td>    
                <td>{{$p->status->nome}}</td>
                <td><?php echo  date('d-m-Y', strtotime($p->data_inicio));  ?></td>
                <td><?php echo date('H:i', strtotime($p->data_inicio));?></td>
                <td>
                <?php if (!empty($p->data_fim)){
                echo date('d-m-Y', strtotime($p->data_fim));}
                ?>
                </td>
                <td>
                    <?php if (!empty($p->data_fim)){
                    echo date('H:i', strtotime($p->data_fim));}
                    ?>
                </td>
                <td>{{$p->km}}</td>   
                <td>{{$p->combustivel}}</td>
                <td>{{$p->modulo}}</td> 
                @foreach ($contmov as $q)
                <td>{{$q->contrato_id}}</td>
                @endforeach             
          
            </tr>
            @endforeach 
        </table>
    </div>
    </div>
    </div>
    @if ($statusativo == "Locado")
        Não pode Movimentar carro locado
    @else
    <form name="novo" method="get" action='/movimentacao_novo'>
    <input style="display: none" type="text" id='placa' name='placa' value="{{$placa}}"/>
    
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="data">Data</label>
                                <input type="date" class="form-control" id="data" name="data" >
                                
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="hora">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" >
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="km">KM</label>
                                <input type="text" class="form-control" id="km" name="km" value="">
                            </div>                            
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">        
                                <label class="control-label" for="combustivel">Combustivel</label>
                                <select class="form-control" id="combustivel" name="combustivel">
                                    <option value="">Selecione</option>
                                    <option value="0">Reserva</option>
                                    <option value="1">1/4</option>
                                    <option value="2">2/4</option>
                                    <option value="3">3/4</option>
                                    <option value="4">4/4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">        
                                <label class="control-label" for="status">Status</label>
                                <select class="form-control" id='status' name='status' >
                                    <option value="">Selecione</option>
                                    @foreach ($status as $p)
                                        @if ($p->nome != "Locado" && $p->nome != "Retorno de Locação")
                                            <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @else
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                    </div>
                    
                    <input type="button" class="btn btn btn-success" value='Incluir Movimentação'onclick="nova_movimentacao()">
                   
                </div>
            </div>
        </div>
    </form>
    @endif
</div>
    
@stop