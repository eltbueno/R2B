<html>
    <head>
        <link href="css/teste.css" rel="stylesheet">
        <link href="css/app.css" rel="stylesheet">
        <title>R2B System - Locações</title> 
    </head>
    
    <body >
        
        <div id="topo">
            Topo da pagina
        </div>
        
        <nav id="menu">
            <ul>
                <li><h1>Menu</h1></li>
                <li><a href="/">Home</a> </li>
                <li><a href="/cliente">Clientes</a> </li>
                <li><a href="/veiculo">Veiculos</a> </li>
                <li><a href="/movimentacao">Movimentação</a> </li>
                <li><a href="/contrato">Contratos</a> </li>
                <li><a href="/configuracao">Configurações</a> </li>
                
                
            </ul>              
        </nav>
        <section id='menuconf'>
            
            @yield('conf')
        </section>
       
        <section id="corpo">
            
            @yield('conteudo')
            
        </section>
     
        <section id="mostra">
            @yield('mostra')
        </section>
        
                
        <footer id="rodape">
            rodape da pagina
        </footer>
    </body>
    
    
</html>
