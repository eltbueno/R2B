<html>
    <head>
        <link href="css/r2b.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
        
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
            <ul></ul>              
                
                
                <li class="sidebar-brand"><a href="/principal">Home<span style="font-size:16px;" class=" glyphicon glyphicon-home"></span></a> </li>
                <li><a href="/cliente">Clientes<span style="font-size:16px;"></span><span style="font-size:16px;" class="glyphicon glyphicon-user"></span></a> </li>
                <li><a href="/veiculo">Veiculos<span style="font-size:16px;" class=" glyphicon glyphicon-road"></span></a> </li>
                <li><a href="/movimentacao">Movimentação<span style="font-size:16px;" class=" glyphicon glyphicon-retweet"></span></a> </li>
                <li><a href="/contrato">Contratos<span style="font-size:16px;" class="glyphicon glyphicon-folder-open"></span></a> </li>
                <li><a href="/configuracao">Configurações<span style="font-size:16px;" class="glyphicon glyphicon-cog"></span></a> </li>
                
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
