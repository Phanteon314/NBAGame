<!doctype html>
<html>
<head>
    <title>Contacto</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/NBAGame.jpg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/contacto.css')}}">
    <script src="https://kit.fontawesome.com/c47bb574d3.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">

   <div id="main" style="width: 45%; height: auto; border: #AAFF00 2px solid;" class="row bg-dark d-flex justify-content-center align-items-center">
    <div class="row pt-3 pb-4 pt-4 text-white">
        <div class="col-12" style="text-align: center">
            <h1>Contactanos</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
      <form id="formularioContacto" action="{{route('mandarContacto')}}" method="post" class="col-10 d-flex flex-column pb-4">
        @csrf
        <div class="col mb-3">
            <label for="nombre" class="form-label text-white">Nombre</label>
            <input class="datosInput" required type="text" name='nombre' id="nombre" required aria-describedby="nombre">
        </div>
        <div class="col mb-3">
            <label for="apellidos" class="form-label text-white">Apellidos</label>
            <input class="datosInput" required type="text" name='apellidos' id="apellidos" required aria-describedby="apellidos">
        </div>
        <div class="col mb-3">
            <label for="email" class="form-label text-white">Email</label>
            <input class="datosInput" required type="email" name='email' id="email" required aria-describedby="email">
        </div>
        <div class="col mb-3">
            <label for="descripcion" class="form-label text-white">Descripcion</label>
            <textarea class="datosInput" required rows="6" cols="30" name='mensaje' id="mensaje" required aria-describedby="mensaje"></textarea>
        </div>
        <div class="col mb-2">
            <a href="{{url('/')}}"><button type="button" class="enviar btn btn-primary">Enviar</button></a>
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