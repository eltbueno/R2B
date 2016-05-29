@extends('veiculo.veiculo')
@section('conteudo')

    <script type="text/javascript">
         
        function edita()
        {
            document.getElementById("mostra").style.display = "none";
            document.getElementById("edita").style.display = "block";
            document.getElementById("placa").readOnly = false;
            document.getElementById("chassi").readOnly = false;
            document.getElementById("renavan").readOnly = false;
            document.getElementById("anomod").readOnly = false;
            document.getElementById("anofab").readOnly = false;
            document.getElementById("grupo").disabled = false;
        }
        function apaga(placa)
        {
            decisao = confirm("Confirma a Exclusão do Veiculo?");
            if (decisao)
            {
                location.href='/veiculo_apaga/'+ placa;
            }
        }
    </script>
    
@if(empty($veiculo))
    <h2>Veiculo não encontrado</h2>
@else
<div class="container">
    <form method="post" action="/veiculo_atualiza">      
        <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />  
        <h2>Edição de Veiculo</h2>
        <div class="row">
            <div class="col-sm-10">
                <div class="well">
                @foreach ($veiculo as $p)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- Arrumar o tamanho dos campos -->
                                <label class="control-label" for="id">Edição do Veiculo {{$p->placa}}</label>
                                <input type="hidden" name="placa" value="{{$p->placa}}">
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
                                <label class="control-label" for="placa">Placa</label>
                                <input readonly="true" required type="text" class="form-control" id="placa" name="placa" value="{{$p->placa}}" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="chassi" class="control-label">Chassi</label>
                                <input readonly="true" type="text" class="form-control" id="chassi" name="chassi" value="{{$p->chassi}}">
                            </div>	
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="renavan">Renavam</label>
                                <input readonly="true" type="text" class="form-control" id="renavan" name="renavan" value="{{$p->renavan}}">
                            </div>
                        </div>
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label class="control-label" for="anofab">Ano de Fabricação</label>
                                <input readonly="true" type="text" class="form-control" id="anofab" name="anofab" value="{{$p->anofab}}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="anomod">Ano Modelo</label>
                                <input readonly="true" type="text" class="form-control" id="anomod" name="anomod" value="{{$p->anomod}}">
                            </div>
                                                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="grupo">Grupo</label>
                                <select disabled class="form-control" id="grupo" name="grupo">
                                    <option value="{{$p->grupo}}">{{$p->grupo}}</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                         
                    
                    
                    
                 
                    <div class="row">
                        <div class="col-md-4">
                            <div id="mostra">
                                @can('operacional')
                                <input class="btn btn-warning" type='button' value='Editar'onclick="edita()"/>
                                <input class="btn btn-danger" type='button' value='Apagar'onclick="apaga('{{$p->placa}}')"/>
                                @endcan
                                <a href="/veiculo"><input class="btn btn-primary" type='button' value='Voltar' /></a>
                            </div>

                            <div id="edita" >
                                <button type="submit" class="btn btn btn-success">Salvar Alterações</button>
                                <a href="/veiculo"><input class="btn btn-primary" type='button' value='Voltar' /></a>
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