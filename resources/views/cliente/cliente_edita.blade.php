@extends('cliente.cliente')
@section('conteudo')

    <script type="text/javascript">
         
        function edita()
        {
            document.getElementById("mostra").style.display = "none";
            document.getElementById("edita").style.display = "block";
            document.getElementById("cli_nome").readOnly = false;
            document.getElementById("cli_end").readOnly = false;
            document.getElementById("cli_end_num").readOnly = false;
            document.getElementById("cli_end_com").readOnly = false;
            document.getElementById("cli_bairro").readOnly = false;
            document.getElementById("cli_cidade").readOnly = false;
            //altera o estado do select modo 1
            document.getElementById("cli_estado").disabled = false;
            document.getElementById("cli_cep").readOnly = false;
            document.getElementById("cli_tel").readOnly = false;
            document.getElementById("cli_obs").readOnly = false;
            // altera o estado do select modo 2
            document.getElementById("cli_tipo").removeAttribute("disabled");
        }
        function apaga(id)
        {
                  
            decisao = confirm("Confirma a Exclusão do Cliente?");
            if (decisao)
            {
                location.href='/cliente_apaga/'+ id;
            }
        }
    </script>
    
@if(empty($cliente)){
    <h2>Cliente não encontrado</h2>
@else
<div class="container">
    <form method="post" action="/cliente_atualiza">      
        <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />  
        <h2>Edição de Cliente</h2>
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                @foreach ($cliente as $p)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="id">Edição do Cliente {{$p->id}}</label>
                                <input type="hidden" name="id" value="{{$p->id}}">
                            </div>
                        </div>
                        @if(!empty($message))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <span class="label-danger" >{{$message}}</span>
                                </div>
                            </div>
                        @elseif(!empty($message1))
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
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="cli_nome">Nome</label>
                                <input readonly="true" required type="text" class="form-control" id="cli_nome" name="cli_nome" value="{{$p->cli_nome}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cli_end" class="control-label">Endereço</label>
                                <input readonly="true" type="text" class="form-control" id="cli_end" name="cli_end" value="{{$p->cli_end}}">
                            </div>	
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_end_num">Nº</label>
                                <input readonly="true" type="text" class="form-control" id="cli_end_num" name="cli_end_num" value="{{$p->cli_end_num}}">
                            </div>
                        </div>
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label class="control-label" for="cli_end_com">Complemento</label>
                                <input readonly="true" type="text" class="form-control" id="cli_end_com" name="cli_end_com" value="{{$p->cli_end_com}}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_bairro">Bairro</label>
                                <input readonly="true" type="text" class="form-control" id="cli_bairro" name="cli_bairro" value="{{$p->cli_bairro}}">
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label class="control-label" for="cli_cidade">Cidade</label>
                                <input readonly="true" type="text" class="form-control" id="cli_cidade" name="cli_cidade" value="{{$p->cli_cidade}}">
                            </div>						
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_estado">Estado</label>
                                <select disabled class="form-control" id="cli_estado" name="cli_estado">
                                    <option value="">{{$p->cli_estado}}</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Alagoas">Alagoas</option>
                                    <option value="Amapá">Amapá</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Bahia">Bahia</option>
                                    <option value="Ceará">Ceará</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Espírito Santo">Espírito Santo</option>
                                    <option value="Goiás">Goiás</option>
                                    <option value="Maranhão">Maranhão</option>
                                    <option value="Mato Grosso">Mato Grosso</option>
                                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                    <option value="Minas Gerais">Minas Gerais</option>
                                    <option value="Pará">Pará</option>
                                    <option value="Paraíba">Paraíba</option>
                                    <option value="Paraná">Paraná</option>
                                    <option value="Pernambuc">Pernambuco</option>
                                    <option value="Piauí">Piauí</option>
                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                    <option value="Rondônia">Rondônia</option>
                                    <option value="Roraima">Roraima</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="São Paulo">São Paulo</option>
                                    <option value="Sergipe">Sergipe</option>
                                    <option value="Tocantins">Tocantins</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_cep">CEP</label>
                                <input readonly="true" type="text" class="form-control" id="cli_cep" name="cli_cep" value="{{$p->cli_cep}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_tel">Telefone</label>
                                <input readonly="true" type="text" class="form-control" id="cli_tel" name="cli_tel" value="{{$p->cli_tel}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_obs">Observação</label>
                                <input readonly="true" type="text" class="form-control" id="cli_obs" name="cli_obs" value="{{$p->cli_obs}}">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_tipo">Tipo de usuário (Fisico/Juridico)</label>
                                <select disabled id="cli_tipo" class="form-control" name="cli_tipo" required>
                                    <?php
                                    if ($p->cli_tipo == 1)
                                    {
                                        $cli_tipo = "Fisico";
                                    }
                                    else
                                    {
                                        $cli_tipo = "Juridico";                                    
                                    }
                                    ?>
                                    <option value="{{$p->cli_tipo}}">{{$cli_tipo}}</option>
                                    <option value="1">Fisico</option>
                                    <option value="2">Juridico</option>                                   
                                </select>
                            </div>			
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div id="mostra">
                                @can('comercial')
                                <input class="btn btn-warning" type='button' value='Editar'onclick="edita()"/>
                                <input class="btn btn-danger" type='button' value='Apagar'onclick="apaga({{$p->id}})"/>
                                @endcan
                                <a href="/cliente"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                            </div>

                            <div id="edita" >
                                <button type="submit" class="btn btn btn-success">Salvar Alterações</button>
                                <a href="/cliente"><input class="btn btn-primary" type='button' value='Voltar' /></a>
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