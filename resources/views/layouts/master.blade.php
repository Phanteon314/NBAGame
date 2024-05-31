<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/NBAGame.jpg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://kit.fontawesome.com/c47bb574d3.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet"> 

    @section('stylesheets')
        <link type="text/css" rel="stylesheet" href="{{asset("css/styles.css")}}"/>
    @show

</head>
<body>
<div class="container-fluid" id="principal">

    <header class="row g-0">
        @include('includes.header')
    </header>
   <div id="main" class="row g-0">
           @yield('content')
   </div>
   <footer>
    @include('includes.footer')
   </footer>
</div>
</body>

</html>

<script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

