
<script type="text/javascript">
    
    function movimenta1(d1)
    {
        var placa = d1; 
        var data = document.getElementById('data'+ placa).value;
        var hora = document.getElementById('hora'+ placa).value;
        var km = document.getElementById('km'+ placa).value;        
        var km = parseInt(km);       
              
        alert ('placa: ' + placa + ' </br>'+
               'data: ' + data + ' </br>'+
               'hora: ' + hora + ' </br>'+
               'km: ' + km + ' </br>'+
               'placa: ' + placa + ' </br>'
                );
        
        
        
        document.novo.submit();         
         
    }    


</script>

 
@if(!empty($veiculos))
Inserir Veiculo no Contrato Numero: {{$id}}

        <table border='1'>
            <tr>
                <td>Placa</td>
                <td>Periodo</td>
                <td>Valor</td>
                <td>Data</td>
                <td>hora</td>
                <td>km</td>
                <td>Combustivel</td>
            </tr>
            @foreach ($veiculos as $p)
            <form name="novo" method="post" action="/contrato_veiculo/salva">
            <input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
            <input type="hidden" name="contratoid" value="{{$id}}" />
            
            
            
            <div class="form-group">
            <input type="hidden" name="placa" value="{{$p->placa}}"
            <tr>
                <td>{{$p->placa}}</td>
                 <td>
                     <select id="periodo" name="periodo">
                         <option value=""></option>
                         <option value="1">Diario</option>
                         <option value="2">Semanal</option>
                         <option value="3">Mensal</option>                    
                    </select>
                
                </td>
                <td>
                <input type="text" name="valor" class="form-control" value="{{Input::old('valor')}}">
                <div class="text-danger">{{$errors->formulario->first('elton')}}</div>
                
               
                </td>
                <!--
                a placa no id dos campos serve para mandar para o javascript
                e diferenciar os dados na hora de mandar gravar 
                -->
                <td><input size="10"type="date" name="data" id="data{{$p->placa}}"></td>                
                <td><input size="10"type="time" name="hora" id="hora{{$p->placa}}"></td>
                <td><input size="10"type="text" name="km" id="km{{$p->placa}}"></td>                
                <td>
                    <select name="combustivel" id="combustivel">
                        <option value=""></option>
                        <option value="0">Reserva</option>
                        <option value="1">1/4</option>
                        <option value="2">2/4</option>
                        <option value="3">3/4</option>
                        <option value="4">4/4</option>                    
                    </select>
                </td>
              
                <td><button type="submit" class="btn btn-primary">Incluir no Contrato</button></td>
                
                
                                
            </tr>
            </div>
            
            </form>
            @endforeach
        
        </table>
        
    



@else 

Inserir Veiculo no Contrato Numero: {{$id}}

<div class="text-danger">{{$message1}}</div>
<div class="text-danger">{{$message2}}</div>

<form name="novo" method="post" action="/contrato_veiculo/salva">
<input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
<input type="hidden" name="contratoid" value="{{$id}}" />
        <table border='1'>
            <tr>
                <td>Placa</td>
                <td>Periodo</td>
                <td>Valor</td>
                <td>Data</td>
                <td>hora</td>
                <td>km</td>
                <td>Combustivel</td>
            </tr>
            
            <div class="form-group">
            <input type="hidden" name="placa" value="{{$placa}}"
            <tr>
                <td>{{$placa}}</td>
                 <td>
                     <select id="periodo" name="periodo">
                         <option value=""></option>
                         <option value="1">Diario</option>
                         <option value="2">Semanal</option>
                         <option value="3">Mensal</option>                    
                    </select>
                
                </td>
                <td>
                <input type="text" name="valor" class="form-control" value="{{Input::old('valor')}}">
                <div class="text-danger">{{$errors->formulario->first('elton')}}</div>
                
               
                </td>
                <!--
                a placa no id dos campos serve para mandar para o javascript
                e diferenciar os dados na hora de mandar gravar 
                -->
                <td><input size="10"type="date" name="data" id="data{{$placa}}"></td>                
                <td><input size="10"type="time" name="hora" id="hora{{$placa}}"></td>
                <td><input size="10"type="text" name="km" id="km{{$placa}}"></td>                
                <td>
                    <select name="combustivel" id="combustivel">
                        <option value=""></option>
                        <option value="0">Reserva</option>
                        <option value="1">1/4</option>
                        <option value="2">2/4</option>
                        <option value="3">3/4</option>
                        <option value="4">4/4</option>                    
                    </select>
                </td>
              
                <td><button type="submit" class="btn btn-primary">Enviar Novo</button></td>
                
                
                                
            </tr>
            </div>
            
        
        </table>
        
    </form>
@endif
    

