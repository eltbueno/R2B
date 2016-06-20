@extends('principal')
@section('conteudo')


<div class="container">
    <form method="post" action="{{url('veiculo_adiciona')}}">
        {{csrf_field()}}
        <h2>Novo Veículo</h2>
     
        
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="placa">Placa</label>
                                <input value="{{Input::old('placa')}}" type="text" class="form-control" id="placa" placeholder="Digite a Placa" name="placa">
                                <div class="text-danger">{{$errors->formveiculo->first('placa')}}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chassi" class="control-label">Chassi</label>
                                <input value="{{Input::old('chassi')}}"type="text" class="form-control" placeholder="Digite o Chassi" id="chassi" name="chassi">
                                <div class="text-danger">{{$errors->formveiculo->first('chassi')}}</div>
                            </div>	
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="renavan">Renavan</label>
                                <input value="{{Input::old('renavan')}}" type="text" class="form-control" id="renavan" name="renavan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label class="control-label" for="anofab">Ano de Fabricação</label>
                                <input value="{{Input::old('anofab')}}" type="text" class="form-control" id="anofab" name="anofab">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="anomod">Ano Modelo</label>
                                <input value="{{Input::old('anomod')}}" type="text" class="form-control" id="anomod" name="anomod">
                            </div>
                        </div>
                        
						
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="grupo">Grupo</label>
                                <select class="form-control" id="grupo" name="grupo">
                                    <?php
                                        if(Input::old('grupo') == "")
                                        {    $texto = "Selecione";}
                                        else
                                        {   $texto = Input::old('grupo'); }
                                        
                                    ?>
                                    <option value="{{Input::old('grupo')}}">{{$texto}}</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                    </div>      
                 
                    <button type="submit" class="btn btn btn-success">Cadastrar</button>
                    <a href="/veiculo"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                </div>
            </div>
        </div>
    </form>
</div>

@stop
