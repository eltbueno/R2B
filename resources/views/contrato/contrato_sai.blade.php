@foreach($movatual as $movatual)
{{$placa = $movatual->placa}}
{{$data = date('d-m-Y H:i' ,strtotime($movatual->data_inicio))}}
{{$km = $movatual->km}}
{{$combustivel = $movatual->combustivel}}
{{$contid}}
@endforeach

<script type="text/javascript">
    
    function nova_movimentacao(d1,d2,d3)
    {
        var placa = d3; 
        var data = document.getElementById('data').value;
        var hora = document.getElementById('hora').value;
        var km = document.getElementById('km').value;        
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


<form name="novo" method="post" action="contrato_salva">
<input type="hidden" name="_token" value="{{{ csrf_token()}}}" />
    <table border='1'>
        <tr>
            <td>Data</td>
            <td>hora</td>
            <td>km</td>
            <td>Combustivel</td>
        </tr>
        <tr>
            <input type="hidden" name="placa" id="placa" value="{{$placa}}">
            <input type="hidden" name="contid" id="contid" value="{{$contid}}">
            <td><input size="10"type="date" name="data" id="data"></td>                
            <td><input size="10"type="time" name="hora" id="hora"></td>
            <td><input size="10"type="text" name="km" id="km"></td>                
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
                        '{{$data}}',
                        '{{$km}}',
                        '{{$placa}}'
                        )">
            </td>
        </tr>
    </table>
</form>
   