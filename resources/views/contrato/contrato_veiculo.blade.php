
<script type="text/javascript">
    function SetName(d1, d2) {
        if (window.opener != null && !window.opener.closed) {
                       
           var nome_cli = window.opener.document.getElementById("nome_cli");
           var cliente_id = window.opener.document.getElementById("cliente_id");
           
           nome_cli.value = d2; 
           cliente_id.value = d1; 
        }
        window.close();
    }
    function nova_movimentacao(d1,d2,d3)
    {
        var placa = d3; 
        var data = document.getElementById('data'+ placa).value;
        var hora = document.getElementById('hora'+ placa).value;
        var km = document.getElementById('km'+ placa).value;        
        var km = parseInt(km);
        
        var dataativa = d1;
        var kmativo = d2;
        
        var novadata = data+ " " +hora;        
        
        
       
        
       
        if (dataativa > novadata)
        {
            alert('A nova data não pode ser menor que a atual: ' + dataativa);
        
        }else
        {
            if (kmativo > km)
            {
                alert('O novo KM não pode ser menor que o atual: ' + kmativo);
            }
            else
            {
               
                document.novo.submit();         
            }
        }
        
    }    


</script>

 
@if(!empty($veiculos))
Inserir Veiculo no Contrato Numero: {{$id}}
<form name="novo" method="post" action="salva">
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
            @foreach ($veiculos as $p)
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
                <td><input size="10"type="text" name="valor" id="valor"></td>
                <!--
                a placa no id dos campos serve para mandar para o javascript
                e diferenciar os dados na hora de mandar gravar 
                -->
                <td><input size="10"type="text" name="data" id="data{{$p->placa}}"></td>                
                <td><input size="10"type="text" name="hora" id="hora{{$p->placa}}"></td>
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
                <td><input type="button" value="Incluir" 
                           onclick="nova_movimentacao(
                            '{{date('d-m-Y H:i', strtotime($p->data_inicio))}}',
                            '{{$p->km}}',
                            '{{$p->placa}}'
                            )">
                
                </td>
                
                
            </tr>
             
            @endforeach
        
        </table>
        
    </form>
   


@else 
 
Não existe Veiculo Disponivel

@endif
    

