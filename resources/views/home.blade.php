<ul>
@if (Auth::check())
    <li><a href="{{url('/principal')}}"> {{Auth::user()->name}} </a> </li>
    <li><a href="{{url('auth/logout')}}"> SAIR</a></li>

@else
    <li><a href="{{url('auth/login')}}"> Logar</a></li>
@endif
</ul>
<p></p>


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

