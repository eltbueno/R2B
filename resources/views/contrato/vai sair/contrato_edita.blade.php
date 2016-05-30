@extends('principal')
@section('conteudo')
<script type="text/javascript">
    var novocarro;
    var popup;
    function SelectName()
    {
        popup = window.open("busca_cli", "Popup", "width=800,height=600");
        popup.focus();
    }
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
        function edita()
        {
            //document.getElementById("mostra").style.display = "none";
            //document.getElementById("edita").style.display = "block";
            document.getElementById("cli_nome").readOnly = false;
            document.getElementById("usuario").readOnly = false;
            //document.getElementById("tipo").readOnly = false;
            //document.getElementById("password_confirmation").readOnly = false;
            //document.getElementById("").readOnly = false;
            document.getElementById("tipo").disabled = false;
        }
        function apaga(id)
        {
            decisao = confirm("Confirma a Exclusão do Usuário?");
            if (decisao)
            {
                location.href='usuario_apaga/'+ id;
            }
        }
    };
            
    
    function mudav()
    {
        document.getElementById("mostra").style.display = "none";
        document.getElementById("edita").style.display = "block";
    }
    function mudab()
    {
        document.getElementById("mostra").style.display = "block";
        document.getElementById("edita").style.display = "none";
    }
</script>
<div class="container">
    <form method="post" action="/cliente_atualiza">      
        <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />  
        
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                @foreach ($contrato as $p)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="id">Edição do Contrato: {{$p->id}}</label>
                                <input type="hidden" name="id" value="{{$p->id}}">
                            </div>
                        </div>                        
                    </div>
                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="tipo">Tipo</label>
                                <br>
                                <select class="form-control" name="tipo" >
                                    <?php 
                                    if($p->tipo == 1)
                                    {
                                        $nometipo = "Rent A Car";
                                    }
                                    else
                                    {
                                        $nometipo = "Terceirização";
                                    }
                                    ?>
                                    <option value="{{$p->tipo}}">{{$nometipo}}</option>
                                    <option value="1">Rent A Car</option>
                                    <option value="2">Terceirização</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="usuario">Vendedor</label>
                                <select  class="form-control" name="usuario" id="usuario">
                                    <option value="{{$p->user->id}}">{{$p->user->nome}}</option>
                                    @foreach ($usuarios as $b)
                                    
                                    <option value="{{$b->id}}">{{$b->nome}}</option>
                                    
                                    @endforeach
                                </select>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-4">
                            
                            <div class="form-group">                                
                                <label class="control-label" for="cliente_id">Código Cliente</label>
                                <input readonly="true" required type="text" class="form-control" id="cliente_id" name="cliente_id" value="{{$p->cliente_id}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">                               
                                <label class="control-label" for="cli_nome">Cliente</label>
                                <input readonly="true" required type="text" class="form-control" id="cli_nome" name="cli_nome" value="{{$p->cliente->cli_nome}}" >
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <br>
                                <input type="button" value="Buscar" onclick="SelectName()"/>
                            </div>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="vigencia">Vigencia</label>
                                <input readonly="true" required type="text" class="form-control" id="vigencia" name="vigencia" value="{{date('d-m-Y' ,strtotime($p->vigencia))}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="taxaadmin">Taxa Administrativa</label>
                                <input readonly="true" required type="text" class="form-control" id="taxaadmin" name="taxaadmin" value="{{$p->taxaadmin}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="taxamulta">Taxa Multa (%)</label>
                                <input readonly="true" required type="text" class="form-control" id="taxamulta" name="taxamulta" value="{{$p->taxamulta}}" >
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="row">
                        <div class="col-md-4">
                            <div id="mostra">
                                
                                <input class="btn btn-warning" type='button' value='Editar'onclick="edita()"/>
                                <input class="btn btn-danger" type='button' value='Apagar'onclick="apaga('{{$p->id}}')"/>
                                
                                <a href="/contrato"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                            </div>

                            <div id="edita" >
                                <input type="button" class="btn btn btn-success" onclick="envia()" value="Salvar Alterações"/>
                                <a href="/contrato"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<h4>Edição de Contrato</h4>

@foreach ($contrato as $p)
<?php
    $id = $p->id;
    $tipo = $p->tipo;
    $user = $p->user_id;
    $clienteid = $p->cliente_id;
    $clientenome = $p->cliente->cli_nome;
    
    $vigencia = date('d-m-Y' ,strtotime($p->vigencia));
    $taxaadmin = $p->taxaadmin;
    $taxamulta = $p->taxamulta;
    $vencimento = $p->vencimento;
?>
@endforeach


<div id="mostra" style="border:2px #333 solid;">
<input type="button" value="Basico">  -------------------- <input type="button" value="Veiculos" onclick="mudav()">    
<form method="post" action="/contrato_atualiza">
    <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    <label>Numero</label>
    <input readonly="true" name="id" value='{{$id}}'>
    <label>Tipo</label>
    <select required="" name="tipo" >
        <option value="{{$tipo}}"></option>
        <option value="1">Rent A Car</option>
        <option value="2">Terceirização</option>
    </select>
    </br>
    
    <label>Vendedor (código)</label></input>
    <input name="user_id" value='{{$user}}'></br>
    
    <label>Cód Cliente</label></input>
    <input required name="cliente_id" value="{{$clienteid}}"></br>
    
    <label>Nome Cliente</label></input>
    <input name="nome_cli" value="{{$clientenome}}"><input type="button" value="Buscar"></br>
    
    <label>Vigencia(Fim do Contrato)</label></input>
    <input type="date" name="vigencia" value="{{$vigencia}}"></br>
    
    <label>Taxa Administrativa</label></input>
    <input name="taxaadmin" value="{{$taxaadmin}}"></br>
    
    <label>Taxa de Multa (preencher só o valor, sem %)</label></input>
    <input name="taxamulta" value="{{$taxamulta}}"></br>
    
    <label>Dia de Vencimento (01 a 30)</label></input>
    <input required name="vencimento" value="{{$vencimento}}"></br>
    
    <button type="submit">Salvar</button>
    <a href="/contrato"><input type='button' value='Voltar' /></a>
    
</form>
</div>

<div id="edita" style=" border:2px #333 solid;" >
<input type="button" value="Basico" onclick="mudab()">  -------------------- <input type="button" value="Veiculos" ">    

<form method="get" action="contrato_veiculo">
    <input type="hidden" name="id" id="id" value='{{$id}}'>
        <button type="submit">Incluir novo {{$id}}</button>
</form>  

        <table border='1'>
            <tr>
                <td colspan="7">Dados Entrada</td>
                <td colspan="4">Dados Saída</td>
            </tr>
            <tr>
                <td>Placa</td>
                <td>Data</td>
                <td>Hora</td>
                <td>KM</td>
                <td>Combustivel</td>
                <td>Tipo</td>
                <td>Valor</td>
                <td>Data</td>
                <td>Hora</td>
                <td>KM</td>
                <td>Combustivel</td>
            </tr>
            @if(!empty($veiculos))
            @foreach ($veiculos as $p)
            <tr>
                <td>{{$p->movimentacao->placa}}</td>
                <td>{{date('d-m-Y',strtotime($p->movimentacao->data_inicio))}}</td>
                
                <td>{{date('H:i',strtotime($p->movimentacao->data_inicio))}}</td>
                <td>{{$p->movimentacao->km}}</td>
                <td>{{$p->movimentacao->combustivel}}</td>
                <td>{{$p->periodo}}</td>
                <td>{{$p->valor}}</td>
                   
                    @if(!empty($p->movimentacao->data_fim))
                    <td> 
                        {{date('d-m-Y',strtotime($p->movimentacao->data_fim))}}
                    </td>
                    <td>
                        {{date('H:i',strtotime($p->movimentacao->data_fim))}}
                    </td>
                    <td>{{$p->movimentacao->kmfim}}</td>
                    <td>{{$p->movimentacao->combustivelfim}}</td>
                
                    
                @else
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <form action="contrato_retira" method="get">
                        <input type="hidden" name="movimentacao" id="movimentacao" value="{{$p->movimentacao->id}}">
                        <input type="hidden" name="contrato" id="contrato" value="{{$id}}">
                        <input type='submit' value='Excluir'/>
                    </form>
                    </td>
                    <td>
                    <form method="get" action="contrato_sai">
                        
                        <a href="/contrato_sai/{{$p->movimentacao->id}}"><input type='button' value='Retirar Veiculo'/></a>
                    </form>  
                    </td>
                @endif
                
            </tr>
            
            
            @endforeach
            @endif
        </table>
        
        
      
</div>


@stop
