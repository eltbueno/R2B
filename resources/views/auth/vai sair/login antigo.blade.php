<html>
    <head>
        <link rel="stylesheet" type="text/css" href="login/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="login/css/style.css" />
        <link rel="stylesheet" type="text/css" href="login/css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Faca seu Login</span></h1>
				
            </header>
            <form method="POST" action="/auth/login">
                {!! csrf_field() !!}

                <div>
                login
                <input type="text" name="login" value="{{ old('login') }}">
                </div>

                <div>
                Password
                <input type="password" name="password" id="password">
                </div>

                <div>
                <input type="checkbox" name="remember"> Remember Me
                </div>

                <div>
                 <button type="submit">Login</button>
                </div>
            </form>
            
            
        </div>
        
        
    </body>

</html>