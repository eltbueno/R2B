<!DOCTYPE html>
<html lang="pt-br">
<!-- Pagina principal, vai ser usada de base para as demais-->
    <head>
        <!-- start: JavaScript -->
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery-migrate-1.0.0.min.js"></script>
        <script src="js/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="js/jquery.ui.touch-punch.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <script src='js/fullcalendar.min.js'></script>
        <script src='js/jquery.dataTables.min.js'></script>
        <script src="js/excanvas.js"></script>
        <script src="js/jquery.flot.js"></script>
        <script src="js/jquery.flot.pie.js"></script>
        <script src="js/jquery.flot.stack.js"></script>
        <script src="js/jquery.flot.resize.min.js"></script>
        <script src="js/jquery.chosen.min.js"></script>
        <script src="js/jquery.uniform.min.js"></script>
        <script src="js/jquery.cleditor.min.js"></script>
        <script src="js/jquery.noty.js"></script>
        <script src="js/jquery.elfinder.min.js"></script>
        <script src="js/jquery.raty.min.js"></script>
        <script src="js/jquery.iphone.toggle.js"></script>
        <script src="js/jquery.uploadify-3.1.min.js"></script>
        <script src="js/jquery.gritter.min.js"></script>
        <script src="js/jquery.imagesloaded.js"></script>
        <script src="js/jquery.masonry.min.js"></script>
        <script src="js/jquery.knob.modified.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/retina.js"></script>
        <script src="js/custom.js"></script>
        <!-- end: JavaScript-->
        <meta charset="utf-8">	
        <link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" >
	<link rel="stylesheet" href="css/style.css" >
	<link rel="stylesheet" href="css/font-awesome.min.css" >
	<link rel="stylesheet" href="css/style-responsive.css" >
        
    </head>

<body>
    <!-- start: Header -->
    <div class="navbar">
	<div class="navbar-inner">
            <div class="container-fluid">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
		</a>
                <img src="img/logo.png">
                @if (Auth::check())
                <a href="{{url()}}"> {{Auth::user()->nome}} </a>
                @else
                <a href="{{url('auth/login')}}"> Logar</a>
                @endif              
                
            </div>
            
	</div>
        
    </div>
	<!-- start: Header -->
	
    <div class="container-fluid-full">
	<div class="row-fluid">
				
            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
		<div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="/principal"><i class="icon-home"></i><span class="hidden-tablet"> Home</span></a></li>
			<li><a href="/cliente"><i class="icon-user"></i><span class="hidden-tablet"> Clientes</span></a></li>	
			<li><a href="/veiculo"><i class="icon-truck"></i><span class="hidden-tablet"> Veiculos</span></a></li>
			<li><a href="/movimentacao"><i class="icon-refresh"></i><span class="hidden-tablet"> Movimentação</span></a></li>
			<li><a href="/contrato"><i class="icon-folder-open-alt"></i><span class="hidden-tablet"> Contrato</span></a></li>
                        <!--
			<li><a href="/configuracao"><i class="icon-cog"></i><span class="hidden-tablet"> Configuração</span></a></li>
                        -->
			@can('admin')
                        <li><a href="/usuario"><i class="icon-user"></i><span class="hidden-tablet"> Usuários</span></a></li>
                        @endcan
                        @if (Auth::check())                            
                        <li><a href="{{url('auth/logout')}}"><i class="icon-backward"></i> SAIR</a></li>
                        @else
                        @endif
                        
                        
                    </ul>
		</div>
            </div>
            <!-- end: Main Menu -->
            
            <!-- start: Content -->
            <div id="content" class="span10">
			
                <section id='menuconf'>
                @yield('conf')
                </section>
		
                <section id="corpo">
                                       
                    
                @yield('conteudo')
                </section>
		
                <section id="mostra">
                @yield('mostra')
                </section>
                
							
            </div>
            <!-- end: Content -->
        </div>
    </div>
    
    <div class="navbar-inner">
        <footer>
            <span style="text-align:left;float:left">&copy; 2016 
                <a href="#" alt="Bootstrap_Metro_Dashboard">R2B System - Locações</a>
            </span>
	</footer>
    </div>
</body>
</html>
