<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
		
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
		<a class="brand" href="/principal"><span>R2B System</span></a>
		</br>
				
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
                    <li><a href="/cliente"><i class="icon-group"></i><span class="hidden-tablet"> Clientes</span></a></li>	
                    <li><a href="/veiculo"><i class="icon-truck"></i><span class="hidden-tablet"> Veiculos</span></a></li>
                    <li><a href="/movimentacao"><i class="icon-refresh"></i><span class="hidden-tablet"> Movimentação</span></a></li>
                    <li><a href="/contrato"><i class="icon-folder-open-alt"></i><span class="hidden-tablet"> Contrato</span></a></li>
                    <li><a href="/configuracao"><i class="icon-cog"></i><span class="hidden-tablet"> Configuração</span></a></li>
                    <li><a href="/usuario"><i class="icon-user"></i><span class="hidden-tablet"> Usuários</span></a></li>
		</ul>
            </div>
	</div>
	<!-- end: Main Menu -->
			
	<noscript>
            <div class="alert alert-block span10">
            <h4 class="alert-heading">Warning!</h4>
            <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
	</noscript>
	<!-- start: Content -->
	<div id="content" class="span10">
            <ul class="breadcrumb">
		<li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a> 
                    <i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Clientes</a></li>
            </ul>
    <section id='menuconf'>
            
            @yield('conf')
    </section>
		
    <section id="corpo">
            
    @yield('conteudo')
            
    </section>
		
    <section id="mostra">
            @yield('mostra')
    </section>

            
    <div class="clearfix"></div>
    </div>
    </div>
    </div><!--/span-->
    
    <!-- end: Content -->
    </div><!--/#content.span10-->
    </div><!--/fluid-row-->
		
	
    <div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
            <ul class="list-inline item-details">
            <li><a href="http://themifycloud.com">Admin templates</a></li>
            <li><a href="http://themescloud.org">Bootstrap themes</a></li>
            </ul>
	</div>
    </div>
	
	<div class="clearfix"></div>
	
	<footer>
            <p>
		<span style="text-align:left;float:left">&copy; 2016 <a href="#" alt="Bootstrap_Metro_Dashboard">R2B System - Locações</a></span>
	    </p>
	</footer>	
	<!-- start: JavaScript-->

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
	
</body>
</html>
