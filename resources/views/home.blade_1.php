<ul>
@if (Auth::check())
    <li><a href="{{url()}}"> {{Auth::user()->name}} </a> </li>
    <li><a href="{{url('auth/logout')}}"> SAIR</a></li>

@else
    <li><a href="{{url('auth/login')}}"> Logar</a></li>
@endif
</ul>