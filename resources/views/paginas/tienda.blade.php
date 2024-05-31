@extends('layouts.master')

@section('title', 'Tienda')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/tienda.css")}}"/>
@endsection

@section('content')
<script src="{{asset('js/tienda.js')}}"></script>
    @php
    if(isset($data)) {
        $data = $data;
    } else {
        $data = null;
    }
    if (isset($jugadorTirada)) {
        $jugadorTirada = $jugadorTirada;
    } else {
        $jugadorTirada = null;
    }
    @endphp
    
    @if($data == 'Saldo insuficiente' && $data != null)
    <div class="container-fluid mt-4" style="width: 80%">
        <div class="alert alert-danger" role="alert">
            <div class="row d-flex justify-content-between">
                <strong class="col-11">No hay saldo suficiente para comprar al jugador. Obten mas creditos jugando o reinicie la sesion</strong>
                <button type="col-1 button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    @if($data == 'Compra realizada' && $data != null)
    <div class="container-fluid mt-4" style="width: 80%">
        <div class="alert alert-success" role="alert">
            <div class="row d-flex justify-content-between">
                <strong class="col-11">Compra realizada con exito</strong>
                <button type="col-1 button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="row d-flex justify-content-end" style="width:100%;">
        <div class="col-1 d-flex justify-content-center p-3 mt-3 text-white" style="border:#ff1867 2px solid">
            Saldo: {{ $usuario->saldo }}
        </div>
    </div>

    <div class="row">
        <div class="col-12 d-flex justify-content-center text-white mb-2">
            <h1>TIENDA</h1>
        </div>
        <div class="col-12 mb-2">
            <hr style="border-top: 1px solid #AAFF00;">
            </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-2 col-sm-1">
            <div class="row d-flex justify-content-center">
                <div>
                    <h1>COSTE: 110</h1>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div>
                    <img class="img-fluid" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="Devin Booker" data-bs-precio="110" data-bs-img="{{asset('images/cartas/devin_booker.jpg')}}" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/devin_booker.jpg')}}" alt="carta1">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1">
            <div class="row d-flex justify-content-center">
                <div>
                    <h1>COSTE: 160</h1>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div>
                    <img class="img-fluid" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="luka doncic" data-bs-precio="160" data-bs-img="{{asset('images/cartas/luka_doncic.jpg')}}" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/luka_doncic.jpg')}}" alt="carta1">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1">
            <div class="row d-flex justify-content-center">
                <div>
                    <h1>COSTE: 170</h1>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div>
                    <img class="img-fluid" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="Kevin Durant" data-bs-precio="170" data-bs-img="{{asset('images/cartas/kevin_durant.jpg')}}" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/kevin_durant.jpg')}}" alt="carta1">
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1">
            <div class="row d-flex justify-content-center">
                <div>
                    <h1>COSTE: 200</h1>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div>
                    <img class="img-fluid" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="Lebron James" data-bs-precio="200" data-bs-img="{{asset('images/cartas/lebron_james.jpg')}}" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/lebron_james.jpg')}}" alt="carta1">
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header" style="background-color: #000000; border-top: #AAFF00 2px solid;border-right: #AAFF00 2px solid;border-left: #AAFF00 2px solid;" >
                  <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #000000; border: #AAFF00 2px solid;" id="contenidoModal">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-fluid" id="imagenCompra" alt="imagenCompra">
                        </div>
                        <div class="col-1">

                        </div>
                        <form id="formularioCompra" action="{{route('comprarJugador')}}" method="post" class="col-4">
                            @csrf
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label text-white">Jugador:</label>
                                <input type="text" class="form-control" name="nombreJugador" readonly id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label text-white">Precio</label>
                                <input type="text" class="form-control" name="precioJugador" readonly id="recipient-precio">
                            </div>
                            <a id="enlaceComprar" type="submit" class="botonEstilos col-12" style="--color: #6eff3e;">
                                Comprar
                              </a>
                        </form>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #000000;  border-bottom: #AAFF00 2px solid;border-right: #AAFF00 2px solid;border-left: #AAFF00 2px solid;">
                    <div class="row d-flex justify-content-end" style="width: 100%">
                        <a class="botonEstilos col-3" data-bs-dismiss="modal" style="--color: #ff1867;">
                            Cerrar
                          </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center text-white mb-2">
            <h1>TIRAR</h1>
        </div>
        <div class="col-12 mb-2">
            <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="row d-flex justify-content-center mb-5">
                    <div>
                        <h1>COSTE TIRADA: 150</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <p class="text-white">Por un precio de 150 podras realizar una tirada en la que conseguiras un jugador aleatorio entre todos los jugadores disponibles, esta opcion es irreversible, una vez le des al boton de abajo se usaran tus creditos y se te otorgara un jugador, ya sea de una rareza mayor o menor</p>
                        @if($jugadorTirada != null)
                        <h2 class="text-success mt-5">ENHORABUENA</h2>
                        <p class="text-white">Se ha obtenido un {{$jugadorTirada['nombre']}} de rareza {{$jugadorTirada['rareza']}}</p>
                        @endif
                    </div>  
                    <div class="col-1"></div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-4">

                    </div>
                    <a class="col-3 mt-5" style="text-decoration: none" href="{{route('tirarJugador')}}" id="btnTirar"><div class="d-flex justify-content-center align-items-center">
                        <div class="cajaBorde d-flex justify-content-center align-items-center">
                            <div class="d-flex align-items-center">
                                TIRAR
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="row d-flex justify-content-center">
                    <div>
                        @if($jugadorTirada != null)
                        <img class="img-fluid" id="cartaTirada" style="border: #AAFF00 2px solid; max-width:500px; height:auto;" src="{{ asset('images/cartas/' . $jugadorTirada['foto']) }}" alt="carta1">
                        @else
                        <img class="img-fluid" id="cartaTirada" style="border: #AAFF00 2px solid; max-width:500px; height:auto;" src="{{asset('images/placeholderMazo.jpg')}}" alt="carta1">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop