<!doctype html>
<html>
<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/NBAGame.jpg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="https://kit.fontawesome.com/c47bb574d3.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">

   <div id="main" style="width: 45%; height: auto; border: #AAFF00 2px solid;" class="row bg-dark d-flex justify-content-center align-items-center">
    <div class="row pt-3 pb-4 pt-4">
      <div class="col-12 d-flex justify-content-center">
        <img src="{{asset('images/NBAGame.jpg')}}" style="width:300px; height:300px" alt="Logo">
      </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
      @php
        if(isset($data)) {
          $data = $data;
        } else {
          $data = null;
        }
      @endphp
      @if($data == 'Usuario no encontrado' && $data != null) 
      <div class="container-fluid mt-3" style="width: 95%">
        <div class="alert alert-danger" role="alert">
            <div class="row d-flex justify-content-between">
                <strong class="col-11">El usuario no ha sido encontrado, revise los datos introducidos</strong>
                <button type="col-1 button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
      </div>
      @endif
      @if($data == 'Usuario o contraseña incorrectos' && $data != null) 
      <div class="container-fluid mt-4" style="width: 95%">
        <div class="alert alert-danger" role="alert">
            <div class="row d-flex justify-content-between">
                <strong class="col-11">Datos incorrectos</strong>
                <button type="col-1 button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
      </div>
      @endif
      <form id="formularioLogin" action="{{route('crearLogin')}}" method="post" class="col-10 d-flex flex-column pb-4">
        @csrf
        <div class="col mb-2">
          <input type="text" placeholder="Nombre de usuario" required name='nombreUsuario' class="datosInput" id="nombreUsuario" aria-describedby="usuario">
        </div>
        <div class="col mb-2">
          <input type="password" placeholder="Contraseña" required name='pwd' class="datosInput" id="pwd">
        </div>
        <div class="col mb-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="col mb-2">
          <hr style="border-top: 1px solid #AAFF00;">
        </div>
        <div class="col mb-2">
          <a id='crearUsuario' href="{{url('/crear')}}"><button type="button">Crear una cuenta</button></a>
        </div>
      </form>
    </div>
   </div>
</div>
</body>

<script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>