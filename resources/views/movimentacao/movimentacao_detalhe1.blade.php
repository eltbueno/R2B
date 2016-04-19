<html>
<head>
        <link href="css/teste.css" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
        <title>R2B System - Locações</title> 
</head>
<body>
    


    <div id="menu2"> 
        <ul>
            <li>Placa</li>
            <li>Status</li>
            <li>Data Inicial</li>
            <li>Hora Inicial</li>
            <li>KM</li>
            <li>Combustivel</li>
            <li>Módulo</li>
        </ul>
        </br>
        @foreach($mov as $mov)
        
        <a href='/movimentacao_detalhe'>
        <ul>
            <li>{{$mov->placa}}</li>    
            <li><?php echo ($mov->status->nome);  ?></li>
            <li><?php echo date('d/m/Y', strtotime($mov->hora));  ?></li>
            <li><?php echo date('H:i', strtotime($mov->hora));?></li>
            <li>{{$mov->km}}</li>   
            <li>{{$mov->combustivel}}</li>
            <li>{{$mov->modulo}}</li>   
            <li><a href='/movimentacao_detalhe'>Detalhar</a></li>
        </ul>
        </br>
        </a>
        @endforeach
    </div>  
</body>    
</html>