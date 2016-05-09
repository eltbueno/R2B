<html lang="pt" class="">
    <head>
        <meta charset="UTF-8" />
        <title>R2B System - Locações</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="login/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="login/css/style.css" />
	<link rel="stylesheet" type="text/css" href="login/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <a href=""></a>
                
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Faca seu Login</span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        
                        <div id="login" class="animate form">
                            <form  action="/auth/login" autocomplete="on" method="post"> 
                                {!! csrf_field() !!}
                                <h1>Login</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Usuario </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Digite seu Usuario"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Senha </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="" /> 
                                </p>
                                <p class="keeplogin"> 
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                    <label for="loginkeeping">Manter Conectado</label>
				</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
				</p>
                                
                            </form>
                        </div>                       
                       						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>