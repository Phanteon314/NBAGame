@extends('layouts.master')

@section('title', 'Home')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/index.css")}}"/>
@endsection

@section('content')
   <div id="carouselExampleIndicators" class="carousel slide g-0" data-bs-ride="carousel">
      <div class="carousel-inner">
      <div class="carousel-item active">
         <img class="d-block w-100" src="https://i.postimg.cc/bNQp0RDW/1.jpg" alt="First slide">
         <div class="carousel-caption d-none d-md-block">
            <h5>NBAGame</h5>
            <p>La evoluciond de los juegos de cartas</p>
         </div>
      </div>
      <div class="carousel-item">
         <img class="d-block w-100" src="https://i.postimg.cc/pVzg3LWn/2.jpg" alt="Second slide">
         <div class="carousel-caption d-none d-md-block">
            <h5>Aprende a perder</h5>
            <p>El juego donde la mayoria pierde y pocos ganan</p>
         </div>
      </div>
      <div class="carousel-item">
         <img class="d-block w-100" src="https://i.postimg.cc/0y2F6Gpp/3.jpg" alt="Third slide">
         <div class="carousel-caption d-none d-md-block">
            <h5>Desafia a todo el mundo</h5>
            <p>Muchos jugadores pero solo un ganador entre todos ellos</p>
         </div>
      </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
      </a>
   </div>

   <div class="row mt-5">
      <div class="col-12">
          <h1>QUE ES NBAGAME</h1>
      </div>
      <div class="col-12 mb-2">
      <hr style="border-top: 1px solid #AAFF00;">
      </div>
  </div>
   <div class="row text-white d-flex justify-content-center" style="margin-top:40px;">
      <div class="col-10">
         NBAGame es un juego de cartas basado en la aleatoridad y la rejugabilidad el cual tiene un principio base de que cada partida sea diferente a la anterior, esta hecho para ser jugado offline actualmente pero se espera que para un futuro se puede desarrollar mas y poder ser jugado de forma multijugador
         <br><br>
         El desarrollador principal de la aplicacion es un experimentado desarrollador de aplicaciones web, el cual lleva en desarrollo de la pagina no mucho tiempo, ya que estamos hablando de una version 1.0 la cual no ha tenido mucho tiempo de desarrollo, pero se espera que en el futuro se puedan implementar mejoras que aumenten la calidad del producto.
      </div>
   </div>

   <div class="row mt-5">
      <div class="col-12">
          <h1>COMO JUGAR</h1>
      </div>
      <div class="col-12 mb-2">
      <hr style="border-top: 1px solid #AAFF00;">
      </div>
  </div>

  <div class="row text-white d-flex justify-content-center" style="margin-top:40px;">
      <div class="col-10">
         El juego usa un sistema de manejo de cartas para poder jugar al mismo, estas cartas pueden ser obtenidas por un usuario usando sus fondos para conseguirlas, ya puede ser comprandolas directamente por un precio mayor o jugarsela a obtenerlas por tiradas.
Las cartas de un usuario se pueden ver en el inventario y su manejo se realiza en el perfil para crear mazos. Estos mazos consisten en cuatro cartas del usuario que se juntan para crear un mazo, el cual usaremos posteriormente para jugar si lo seleccionamos en nuestro apartado de perfil. Cabe destacar que estas cartas una vez se crean en un mazo ya no podran ser usadas en otros mazos y cada mazo tiene un numero de usos limitado para su uso en juego
A su vez cada carta esta constituida por unas estadisticas: tiro, defense, rebote, asistencia, atletismo. Tambien tienen como es obvio al tratarse de un juego de baloncesto el nombre del jugador, el equipo y la posicion en el mismo.
         <br><br>
         El modo principal de la aplicacion es el modo enfrentamiento, en el cual cada usuario con sus ya creados mazos decidira cual usar para jugar contra la maquina en un modo de juego que mezcla una Buena construccion de mazos con un gran factor de aleatoriedad que hace que nunca sepas como va a terminar la session. Se require como minimo un mazo para poder jugar una partida
En este modo un jugador selecciona un mazo el cual tiene un orden establecido previamente. Una vez seleccionado el mazo se genera un mazo con jugadores generados aleatoriamente el cual sera el mazo de la maquina, este mazo sera igual al mazo del jugador. Una vez creados los mazos empezara la partida, en la cual se enfrentaran las cartas en orden una a una sumando todas las estadisticas de la misma, la carta que tenga mayores estadisticas sera la ganadora del duelo aportando un punto al bando ganador. 
Una vez se realizan los duelos se suman las estadisticas individuales de las cuatro cartas una a una para sacar un sumatorio de la estadistica. De esta forma cada jugador tendra un resultado de tiro, defensa…, despues estas se compararan con el equivalente del otro jugador, dando un punto por resultado ganador.
Una vez finalizado el juego se suman todos los puntos y el jugador con mas puntos sera el ganador. En caso de ganar, el usuario obtiene 200 de saldo para su cuenta y el mazo que ha usado pierde un uso del mismo.
         <br><br>
         El objetivo del juego es conseguir el mayor número de victorias posibles hasta que el usuario se quede sin saldo. Cada jugador comienza una sesion con un determinado saldo de 1500, el cual según se juegue ira disminuyendo segun el usuario vaya usando sus cartas. Al quedarse sin cartas, mazos y saldo, el usuario se declarara en bancarrota y se acabara la sesion, la cual guardara el numero de partidas ganadas (asi como mas estadísticas) y se añadira la partida a una leaderboard, una table que recogera que usuarios han conseguido más victorias en una misma sesion.
      </div>
   </div>
  

@stop