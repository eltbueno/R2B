
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
</script>



<table border='1'>
    <tr>
        <td>Codigo</td>
        <td>Nome</td>        
        <td>Fisico/Juridico</td>
       
    </tr>
    <tr>
    <form method="get" action="/cliente_busca">
        <input type="text" style="display: none" id="contrato" name="contrato" value="1">
        <td><input type='codigo' name='id'/></td>
        <td><input type='text' name='cli_nome'/></td>
        
        <td><select name="cli_tipo">
                <option value=''></option> 
                <option value='1'>Fisico</option> 
                <option value='2'>Juridico</option> 
            
            </select> 
        </td>
        <td><input type='submit' value='Buscar'/></td>
    </form>
    </tr>    
</table>

<table border='1'>    
    <tr>
        <td><b>Codigo</b></td>
        <td><b>Nome</b></td>
        <td><b>Endereço</b></td>
        <td><b>Estado</td>
        <td><b>Cidade</td>         
    </tr>   
    
    <?php 
   
    if(empty($clientes))
    {
       
    }
    else
    {
        echo " Clique na linha do cliente para selecionar";
        foreach ($clientes as $p):            
        ?> 
    <form>
        <tr style="cursor:pointer" onclick="SetName('{{$p->id}}','{{$p->cli_nome}}')"> 
            <td> {{$p->id}} </td>    
            <td> {{$p->cli_nome }} </td>
            <td><?= $p->cli_end ?></td>
            <td><?= $p->cli_estado ?></td>
            <td><?= $p->cli_cidade ?></td>   
        
   </form>
        <?php    endforeach ;    
        
    
        
    }
    ?>
    
</table>




