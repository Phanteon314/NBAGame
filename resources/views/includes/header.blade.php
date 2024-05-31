<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: #AAFF00 2px solid; background-color:#0d0d0d; position: relative;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">NBAGame</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home</a>
          </li>

          <li class="nav-item">
            @if (auth()->check())
              <a class="nav-link"  href="{{url('/jugar')}}">Enfrentamiento</a>
            @else
              <a class="nav-link"  href="{{url('/login')}}">Enfrentamiento</a>
            @endif
          </li>
          <li class="nav-item">
            @if (auth()->check()) 
              <a class="nav-link" href="{{url('/inventario')}}">Inventario</a>
            @else
              <a class="nav-link" href="{{url('/login')}}">Inventario</a>
            @endif
          </li>
          <li class="nav-item">
            @if (auth()->check())
              <a class="nav-link"  href="{{url('/leaderboard')}}">Leaderboard</a>
            @else
              <a class="nav-link"  href="{{url('/login')}}">Leaderboard</a>
            @endif
          </li>
          <li class="nav-item">
            @if (auth()->check())
              <a class="nav-link"  href="{{url('/perfil')}}">Perfil</a>
            @else
              <a class="nav-link"  href="{{url('/login')}}">Perfil</a>
            @endif
          </li>
          <li class="nav-item">
            @if (auth()->check())
              <a class="nav-link" href="{{url('/tienda')}}">Comprar jugadores</a>
            @else
              <a class="nav-link" href="{{url('/login')}}">Comprar jugadores</a>
            @endif
          </li>
          @php
          use Illuminate\Support\Facades\Auth;
          
            if(isset(Auth::user()->nombreUsuario)) {
              $usuario = Auth::user()->nombreUsuario;
            } else {
              $usuario = 'invitado';
            }
          @endphp
          @if($usuario == 'invitado') 
          <li class="nav-item" style="margin-left: 150px; border: #088596 2px solid;">
            <a class="nav-link" href="{{url('/login')}}">Iniciar sesion</a>
          </li>
          @else
          <li class="nav-item" style="margin-left: 150px; border: #965408 2px solid;">
            <a class="nav-link" href="{{url('/logout/{$usuario}')}}">Cerrar sesion</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>