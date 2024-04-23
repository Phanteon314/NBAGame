<!doctype html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="https://kit.fontawesome.com/c47bb574d3.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">

   <div id="main" style="width: 80%; height: 80%; border: #AAFF00 2px solid;" class="row d-flex justify-content-center align-items-center">
    <div class="row">
      <div class="col-8 d-flex justify-content-center align-items-center">
        <h1>INICIO DE SESION</h1>
      </div>
      <div class="col-4">
        <img src="{{asset('images/NBAGame.jpg')}}" style="width:150px; height:150px" alt="Logo">
      </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
      <form class="col-6">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label text-white">Correo electronico</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label text-white">Clave</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
      </form>
    </div>
   </div>

</div>
</body>
</html>