<!doctype html>
<html>
<head>
    <title>Nuevo usuario</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/NBAGame.jpg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="https://kit.fontawesome.com/c47bb574d3.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">

   <div id="main" style="width: 80%; height: auto; border: #AAFF00 2px solid;" class="row bg-dark d-flex justify-content-center align-items-center">
    <div class="row pt-4">
      <div class="col-12 d-flex justify-content-center align-items-center text-white">
        <h1>CREAR USUARIO</h1>
      </div>
      <div class="col mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
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
      @if($data == 'Usuario ya existente' && $data != null) 
      <div class="container-fluid mt-4" style="width: 95%">
        <div class="alert alert-danger" role="alert">
            <div class="row d-flex justify-content-between">
                <strong class="col-11">El usuario ya existe</strong>
                <button type="col-1 button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
      </div>
      @endif
      <form id="formularioNuevo" action="{{route('crearUsuario')}}" method="post" class="col-12">
        @csrf
        <div class="row d-flex justify-content-center">
          <div class="col-6">
            <div class="col mb-3">
              <label for="nombreUsuario" class="form-label text-white">Nombre de usuario</label>
              <input class="datosInput" required type="text" name="nombreUsuario" id="nombreUsuario" required aria-describedby="usuario">
            </div>
            <div class="col mb-3">
              <label for="password" class="form-label text-white">Contraseña</label>
              <input class="datosInput" required type="text" name='password' id="password" required aria-describedby="password">
            </div>
            <div class="col mb-3">
              <label for="nombre" class="form-label text-white">Nombre</label>
              <input class="datosInput" required type="text" name='nombre' id="nombre" required aria-describedby="nombre">
            </div>
            <div class="col mb-3">
              <label for="apellidos" class="form-label text-white">Apellidos</label>
              <input class="datosInput" required type="text" name='apellidos' id="apellidos" required aria-describedby="apellidos">
            </div>
            <div class="col mb-3">
              <label for="fecha_nac" class="form-label text-white">Fecha de nacimiento</label>
              <input class="datosInput" required type="date" name='fecha_nac' id="fecha_nac" required aria-describedby="fecha_nac">
            </div>
          </div>
          <div class="col-6">
            <div class="col mb-3">
              <label for="dni" class="form-label text-white">DNI</label>
              <input class="datosInput" required type="text" name='dni' id="dni" required aria-describedby="dni">
            </div>
            <div class="col mb-3">
              <label for="email" class="form-label text-white">Email</label>
              <input class="datosInput" required type="email" name='email' id="email" required aria-describedby="email">
            </div>
            <div class="col mb-3">
              <label for="descripcion" class="form-label text-white">Descripcion</label>
              <textarea class="datosInput" required rows="11" cols="50" name='descripcion' id="descripcion" required aria-describedby="descripcion"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-2">
            <hr style="border-top: 1px solid #AAFF00;">
          </div>
          <div class="col-3">
            <a id='irLogin' href="{{url('/login')}}"><button type="button">Login</button></a>
          </div>
          <div class="col-9 d-flex justify-content-center pb-4">
            <button style="width: 100%" type="submit" class="btn btn-primary">Crear Usuario</button>
          </div>
        </div>
      </form>
    </div>
   </div>

</div>
</body>
</html>