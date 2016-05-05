<html>
    <head>
        <link href="css/r2b.css" rel="stylesheet">
        
        
        <title>R2B System - Locações</title> 
    </head>
    
    <body >
        
        <div id="topo">
            <ul>
                @if (Auth::check())
                    <li><a href="{{url()}}"> {{Auth::user()->nome}} </a> </li>
                    <li><a href="{{url('auth/logout')}}"> SAIR</a></li>

                @else
                    <li><a href="{{url('auth/login')}}"> Logar</a></li>
                @endif
            </ul>
        </div>
        
        <nav id="menu">
            <ul>
                <li><h1>Menu</h1></li>
                <li><a href="/principal">Home</a> </li>
                <li><a href="/cliente">Clientes</a> </li>
                <li><a href="/veiculo">Veiculos</a> </li>
                <li><a href="/movimentacao">Movimentação</a> </li>
                <li><a href="/contrato">Contratos</a> </li>
                <li><a href="/configuracao">Configurações</a> </li>
                
                @can('admin')
                <li><a href="/usuario">Usuários</a> </li>
                
                @endcan
                
                
                
            </ul>              
        </nav>
        <section id='menuconf'>
            
            @yield('conf')
        </section>
       
        <section id="corpo">
            
            @yield('conteudo')
            
        </section>
        <section id="user" class="container">
            @yield('user')
        </section>
     
        <section id="mostra">
            @yield('mostra')
        </section>
        
                
        <footer class="footer" id="rodape">
            rodape da pagina
        </footer>
    </body>
    
    
</html>
