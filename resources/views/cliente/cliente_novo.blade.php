@extends('principal')
@section('conteudo')


<div class="container">
    <form  method="post" action="/cliente_adiciona">
        <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
        <h2>Novo Cliente</h2>     

        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="cli_nome">Nome</label>
                                <input required type="text" class="form-control" id="cli_nome" placeholder="Nome do Cliente" name="cli_nome">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cli_end" class="control-label">Endereço</label>
                                <input type="text" class="form-control" id="cli_end" name="cli_end">
                            </div>	
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_end_num">Nº</label>
                                <input type="text" class="form-control" id="cli_end_num" name="cli_end_num">
                            </div>
                        </div>
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label class="control-label" for="cli_end_com">Complemento</label>
                                <input type="text" class="form-control" id="cli_end_com" name="cli_end_com">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_bairro">Bairro</label>
                                <input type="text" class="form-control" id="cli_bairro" name="cli_bairro">
                            </div>
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group">
                                <label class="control-label" for="cli_cidade">Cidade</label>
                                <input type="text" class="form-control" id="cli_cidade" name="cli_cidade">
                            </div>						
                        </div>
						
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_estado">Estado</label>
                                <select class="form-control" id="cli_estado" name="cli_estado">
                                    <option value="">Selecione</option>
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
                                <input type="text" class="form-control" id="cli_cep" name="cli_cep">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_tel">Telefone</label>
                                <input type="text" class="form-control" id="cli_tel" name="cli_tel">
                            </div>
                        </div>
                    </div>      
                 
                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_obs">Observação</label>
                                <input type="text" class="form-control" id="cli_obs" name="cli_obs">
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="cli_tipo">Tipo de usuário (Fisico/Juridico)</label>
                                <select id="user_type" class="form-control" name="cli_tipo" required>
                                    <option value="">Selecione</option>
                                    <option value="1">Fisica</option>
                                    <option value="2">Juridico</option>

                                </select>
                            </div>			
                        </div>
                    </div>
                
                
                
                    <button type="submit" class="btn btn btn-success">Cadastrar</button>
                    <a href="/cliente"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                </div>
            </div>
        </div>
    </form>
</div>

@stop
