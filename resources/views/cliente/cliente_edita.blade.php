@extends('cliente.cliente')
@section('conteudo')

    <script type="text/javascript">
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
                                <input required type="text" class="form-control" id="cli_nome" name="cli_nome" value="{{$p->cli_nome}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cli_end" class="control-label">Endereço</label>
                                <input type="text" class="form-control" id="cli_end" name="cli_end" value="{{$p->cli_end}}">
                            </div>	
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_end_num">Nº</label>
                                <input type="text" class="form-control" id="cli_end_num" name="cli_end_num" value="{{$p->cli_end_num}}">
                            </div>
                        </div>
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label class="control-label" for="cli_end_com">Complemento</label>
                                <input type="text" class="form-control" id="cli_end_com" name="cli_end_com" value="{{$p->cli_end_com}}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_bairro">Bairro</label>
                                <input type="text" class="form-control" id="cli_bairro" name="cli_bairro" value="{{$p->cli_bairro}}">
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label class="control-label" for="cli_cidade">Cidade</label>
                                <input type="text" class="form-control" id="cli_cidade" name="cli_cidade" value="{{$p->cli_cidade}}">
                            </div>						
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_estado">Estado</label>
                                <select class="form-control" id="cli_estado" name="cli_estado">
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
                                <input type="text" class="form-control" id="cli_cep" name="cli_cep" value="{{$p->cli_cep}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_tel">Telefone</label>
                                <input type="text" class="form-control" id="cli_tel" name="cli_tel" value="{{$p->cli_tel}}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_obs">Observação</label>
                                <input type="text" class="form-control" id="cli_obs" name="cli_obs" value="{{$p->cli_obs}}">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_tipo">Tipo de usuário (Fisico/Juridico)</label>
                                <select id="user_type" class="form-control" name="cli_tipo" required>
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
                    <button type="submit" class="btn btn btn-success">Salvar Alterações</button>
                    <a href="/cliente"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                    <a href="#"><input class="btn btn-danger" type='button' value='Apagar'onclick="apaga({{$p->id}})" /></a>
                @endforeach    
                </div>                
            </div>            
        </div> 
    </form>
</div>
@endif   
     
   
    
<!--    
    <label>Codigo</label>   
    
    <input name="id" value="<?= $p->id ?>" readonly="true"></input></br>
    <label>Nome</label>
    
    <input required name="cli_nome" value="<?= $p->cli_nome ?>" ></input></br>   
    
    <label>Endereço</label></input>
    <input name="cli_end" value="<?= $p->cli_end ?>"></input></br>
    
    <label>Numero</label></input>
    <input name="cli_end_num" value="<?= $p->cli_end_num ?>"></input></br>
    
    <label>Complemento</label></input>
    <input name="cli_end_com" value="<?= $p->cli_end_com ?>"></input></br>
    
    <label>Bairro</label></input>
    <input name="cli_bairro" value="<?= $p->cli_bairro ?>"></input></br>
    
    <label>Cidade</label></input>
    <input name="cli_cidade" value="<?= $p->cli_cidade ?>"></input></br>
    
    <label>Estado</label></input>
    <input name="cli_estado" value="<?= $p->cli_estado ?>"></input></br>
    
    <label>CEP</label></input>
    <input name="cli_cep" value="<?= $p->cli_cep ?>"></input></br>
    
    <label>Telefone</label></input>
    <input name="cli_tel" value="<?= $p->cli_tel ?>"></input></br>
    
    <label>Observação</label></input>
    <input name="cli_obs" value="<?= $p->cli_obs?>"></input></br>
    
    <label>Fisico/Juridico</label></input>
    <select name="cli_tipo" >
        <option value="<?= $p->cli_tipo ?>"></option>
        <option value='1'>Fisico</option>
        <option value='2'>Juridico</option>
    </select>
    
    
    <button type="submit">Alterar</button>
    <a href="/cliente"><input type='button' value='Voltar' /></a>
    <a href="/cliente_apaga/<?= $p->id ?>"><input type='button' value='Apagar'/></a>
   
        
        

</form>
-->
@stop