<nav class="navbar navbar-expand-lg navbar-light" style="border-bottom: #AAFF00 2px solid; background-color:#0d0d0d;">
    <div class="container-fluid">
      <a href="{{url('/')}}"><img src="{{asset('images/NBAGame.jpg')}}" alt="Logo" style="width: 130px; height: 110px; margin-left: 5px; margin-right: 10px;"></a>
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
            <a class="nav-link"  href="{{url('/jugar')}}">Jugar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/inventario')}}">Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{url('/leaderboard')}}">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{url('/perfil')}}">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/tienda')}}">Tienda</a>
          </li>
          <li class="nav-item" style="margin-left: 30px; border: #088596 2px solid;">
            <a class="nav-link" href="#">Iniciar sesion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>