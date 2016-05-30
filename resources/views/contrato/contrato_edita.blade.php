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
            alert ("Contrato possui veículos, impossível apagar!");
        }
        if (mensagem == 2)
        {
            alert ("Atualizado com Sucesso!");
        }
        if (mensagem == 3)
        {
            alert ("Cadastrado com Sucesso!");
        }
        if (mensagem == 4)
        {
            alert ("Veiculo apagado com Sucesso!");
        }
        if (mensagem == 5)
        {
            alert ("Veiculo retirado com Sucesso!");
        }
    }
    function edita()
    {
        document.getElementById("tipo").disabled = false;
        document.getElementById("user_id").disabled = false;
        document.getElementById("cli_nome").readOnly = false;
        document.getElementById("cliente_id").readOnly = false;
        document.getElementById("vigencia").readOnly = false;
        document.getElementById("taxaadmin").readOnly = false;
        document.getElementById("taxamulta").readOnly = false;
        document.getElementById("vencimento").readOnly = false;
        document.getElementById("mostra").style.display = "none";
        document.getElementById("edita").style.display = "block";
    }
    function noedita()
    {
        document.getElementById("tipo").disabled = true;
        document.getElementById("user_id").disabled = true;
        document.getElementById("cli_nome").readOnly = true;
        document.getElementById("cliente_id").readOnly = true;
        document.getElementById("vigencia").readOnly = true;
        document.getElementById("taxaadmin").readOnly = true;
        document.getElementById("taxamulta").readOnly = true;
        document.getElementById("vencimento").readOnly = true;
        document.getElementById("mostra").style.display = "block";
        document.getElementById("edita").style.display = "none";
    }    
    function envia()
    {
        decisao = confirm("Confirma a Exclusão do Usuário?");
        if (decisao)
        {
            location.href='usuario_apaga/'+ id;
        }
    }    
        
        
    function apaga(id)
    {
        decisao = confirm("Confirma a Exclusão do Usuário?");
        if (decisao)
        {
            location.href='usuario_apaga/'+ id;
        }
    }

            
    
    function mudav()
    {
        document.getElementById("basico").style.display = "none";
        document.getElementById("veiculos").style.display = "block";
    }
    function mudab()
    {
        document.getElementById("basico").style.display = "block";
        document.getElementById("veiculos").style.display = "none";
    }
</script>


<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <div class="well">
                @foreach ($contrato as $p)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label class="control-label" for="id">Edição do Contrato: {{$p->id}}</label>
                                
                            </div>
                        </div>                        
                    </div>                    
                    <input type="button" value="Basico" onclick="mudab()">  -------------------- <input type="button" value="Veiculos" onclick="mudav()">
                
                    <div id="basico"> 
                        <form method="post" action="/contrato_atualiza">      
                            <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
                            <input type="hidden" name="id" value="{{$p->id}}"><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="tipo">Tipo</label>
                                        <br>
                                        <select disabled class="form-control" name="tipo" id="tipo" >
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
                                        <label class="control-label" for="user_id">Vendedor</label>
                                        <select disabled  class="form-control" name="user_id" id="user_id">
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
                                        <label class="control-label" for="vigencia">Vigencia</label>
                                        <input readonly="true" required type="date" class="form-control" id="vigencia" name="vigencia" value="{{$p->vigencia}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="taxaadmin">Taxa Administrativa</label>
                                        <input readonly="true" required type="text" class="form-control" id="taxaadmin" name="taxaadmin" value="{{$p->taxaadmin}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="taxamulta">Taxa Multa (%)</label>
                                        <input readonly="true" required type="text" class="form-control" id="taxamulta" name="taxamulta" value="{{$p->taxamulta}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="vencimento">Vencimento</label>
                                        <input readonly="true" required type="text" class="form-control" id="vencimento" name="vencimento" value="{{$p->vencimento}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="mostra">
                                        @can('comercial')
                                        <input class="btn btn-warning" type='button' value='Editar'onclick="edita()"/>
                                        <input class="btn btn-danger" type='button' value='Apagar'onclick="apaga('{{$p->id}}')"/>
                                        @endcan
                                        <a href="/contrato"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                                    </div>
                                    <div id="edita" >
                                        <input type="submit" class="btn btn btn-success" value="Salvar Alterações"/>
                                        <input class="btn btn-warning" type='button' value='Cancelar Edição'onclick="noedita()"/>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <div id="veiculos">
                        <form method="get" action="contrato_veiculo">
                            <input type="hidden" name="id" id="id" value='{{$p->id}}'>
                                @can('comercial')
                                <button type="submit">Incluir novo {{$p->id}}</button>
                                @endcan
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
                            @foreach ($veiculos as $d)
                            <tr>
                                <td>{{$d->movimentacao->placa}}</td>
                                <td>{{date('d-m-Y',strtotime($d->movimentacao->data_inicio))}}</td>

                                <td>{{date('H:i',strtotime($d->movimentacao->data_inicio))}}</td>
                                <td>{{$d->movimentacao->km}}</td>
                                <td>{{$d->movimentacao->combustivel}}</td>
                                <td>{{$d->periodo}}</td>
                                <td>{{$d->valor}}</td>

                                    @if(!empty($d->movimentacao->data_fim))
                                    <td> 
                                        {{date('d-m-Y',strtotime($d->movimentacao->data_fim))}}
                                    </td>
                                    <td>
                                        {{date('H:i',strtotime($d->movimentacao->data_fim))}}
                                    </td>
                                    <td>{{$d->movimentacao->kmfim}}</td>
                                    <td>{{$d->movimentacao->combustivelfim}}</td>


                                @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                @can('comercial')
                                <td>
                                    <form action="contrato_retira" method="get">
                                        <input type="hidden" name="movimentacao" id="movimentacao" value="{{$d->movimentacao->id}}">
                                        <input type="hidden" name="contrato" id="contrato" value="{{$p->id}}">
                                        <input type='submit' value='Excluir'/>
                                    </form>
                                </td>
                                <td>
                                    <form method="get" action="contrato_sai">
                                        <input type="hidden" name="movimentacao" id="movimentacao" value="{{$d->movimentacao->id}}">
                                        <input type="hidden" name="contrato" id="contrato" value="{{$p->id}}">
                                        <input type='submit' value='Retirar Veiculo'/>
                                    </form>  
                                </td>
                                @endcan
                                @endif

                            </tr>


                            @endforeach
                            @endif
                        </table>
                        

                    </div>
                
                
                @endforeach
            </div>
        </div> 
    </div>
</div>


@stop
