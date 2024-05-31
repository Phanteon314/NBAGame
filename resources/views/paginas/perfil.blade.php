@extends('layouts.master')

@section('title', 'Perfil')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/perfil.css")}}"/>
@endsection

@section('content')
<script src="{{asset('js/perfil.js')}}"></script>
<div class="row text-white d-flex justify-content-center" style="margin-top:40px;">

    <div class="row">
        <div class="col-12">
            <h1>PERFIL</h1>
        </div>
        <div class="col-12 mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>
    
    <div class="row mt-4" style="width: 100%">
        <div class="col-2">
            <object data="{{asset('uploads/' . $usuario['foto'])}}" class="img-fluid" type="image/jpg">
                <img class="img-fluid" src="{{asset('images/placeholder.jpg')}}" />
            </object>
        </div>
        <div class="col-3 d-flex flex-column p-4" style="background-color:#29303f; border:#AAFF00 2px solid;">
            <div class="col mt-1 d-flex justify-content-between">
                <div>
                    <strong>Nombre de usuario: </strong> {{$usuario['nombreUsuario']}}
                </div>
                <div>
                    <a href="{{url('/editarPerfil')}}" class="link-info"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            <div class="col mt-4">
                <strong>Nombre: </strong> {{$usuario['nombre']}} {{$usuario['apellidos']}}
            </div>
            <div class="col mt-4">
                <Strong>Email: </Strong> {{$usuario['email']}}
            </div>
            <div class="col mt-4">
                <strong>Saldo: </strong> {{$usuario['saldo']}}
            </div>
            <div class="col mt-4">
                <strong>DNI: </strong> {{$usuario['dni']}}
            </div>
            <div class="col mt-4">
                <strong>Descripcion: </strong> {{$usuario['descripcion']}}
            </div>
        </div>
        <div class="col-7">
            <div class="row d-flex justify-content-center" style="text-align: center">
                <a href="{{route('nuevaSesion')}}" style="width: 100%"><button type="button" class="enviar btn btn-primary">Nueva sesion</button></a>
            </div>
            <div class="row">
                <table class="container">
                    <thead>
                        <tr>
                            <th><h1>Numero de sesion</h1></th>
                            <th><h1>Partidas jugadas</h1></th>
                            <th><h1>Partidas ganadas</h1></th>
                            <th><h1>Partidas perdidas</h1></th>
                            <th><h1>Win ratio</h1></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estadisticasSesiones as $estadisticas)
                        <tr>
                            <td>{{$estadisticas->sesionId}}</td>
                            <td>{{$estadisticas->totalPartidas}}</td>
                            <td>{{$estadisticas->victorias}}</td>
                            <td>{{$estadisticas->derrotas}}</td>
                            <td>{{$estadisticas->winRatio}}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row d-flex justify-content-center" style="width: 93%">
                {{ $estadisticasSesiones->links() }}
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-12">
            <h1>MAZOS</h1>
        </div>
        <div class="col-12 mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>
    
    <div class="row">
        <div class="row">
            <p class="col-2">
                <a class="crearMazo" data-bs-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1"><button type="button">Crear Mazo</button></a>
            </p>
        </div>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body p-3" style="background-color:#29303f;">
                    <div class="container-fluid d-flex justify-content-center">
                        <div class="row" id="seleccionado">
                            <div class="col-lg-3 d-flex justify-content-center">
                                <div id="caja1" ondragover="event.preventDefault()" ondrop="dropWord(event)">
                                    <img data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="placeholder" id="cajaA" style="border: #AAFF00 2px solid;" src="{{asset('images/placeholderMazo.jpg')}}" class="img-fluid" draggable="true" ondragstart="dragWord(event)" alt="carta1">
                                </div>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center">
                                <div id="caja2" ondragover="event.preventDefault()" ondrop="dropWord(event)">
                                    <img data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="placeholder" id="cajaB" style="border: #AAFF00 2px solid;" src="{{asset('images/placeholderMazo.jpg')}}" class="img-fluid" draggable="true" ondragstart="dragWord(event)" alt="carta2">
                                </div>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center">
                                <div id="caja3" ondragover="event.preventDefault()" ondrop="dropWord(event)">
                                    <img data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="placeholder" id="cajaC" style="border: #AAFF00 2px solid;" src="{{asset('images/placeholderMazo.jpg')}}" class="img-fluid" draggable="true" ondragstart="dragWord(event)" alt="carta3">
                                </div>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center">
                                <div id="caja4" ondragover="event.preventDefault()" ondrop="dropWord(event)">
                                    <img data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-nombre="placeholder" id="cajaD" style="border: #AAFF00 2px solid;" src="{{asset('images/placeholderMazo.jpg')}}" class="img-fluid" draggable="true" ondragstart="dragWord(event)" alt="carta4">
                                </div>
                        </div>
                        <div class="row mt-4 d-flex-justify-content-center">
                            <form id="crearMazoForm" action="{{route('crearMazoForm')}}" method="post">
                                @csrf
                                <div class="col">
                                    <label for="nombreMazo">Nombre del mazo:</label>
                                    <Input class="datosInput" type="text" name="nombreMazo" required id="nombreMazo"></Input>
                                </div>
                                <input type="hidden" name="compra1" required id="compra1">
                                <input type="hidden" name="compra2" required id="compra2">
                                <input type="hidden" name="compra3" required id="compra3">
                                <input type="hidden" name="compra4" required id="compra4">
                                <div class="col-12">
                                    <button id="guardarMazo" style="width: 100%" type="submit" disabled class="guardarMazo btn btn-primary">Guardar mazo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div id="noDisponibles1" style="display:none;"></div>
    <div id="noDisponibles2" style="display:none;"></div>
    <div id="noDisponibles3" style="display:none;"></div>
    <div id="noDisponibles4" style="display:none;"></div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #000000; border-top: #AAFF00 2px solid;border-right: #AAFF00 2px solid;border-left: #AAFF00 2px solid;" >
              <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir jugador</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #000000; border: #AAFF00 2px solid;" id="contenidoModal">
                <div class="row">
                    @foreach($data as $jugador)
                        <div id="col-{{$jugador['id']}}" class="col-3 mt-2 mb-2 d-flex justify-content-center">
                            <div id="imagelist">
                                <a id="{{$jugador['idCompra']}}" onclick="nuevoJugador(this)" data-bs-dismiss="modal">
                                    <img style="border: #AAFF00 2px solid;" src="{{ asset('images/cartas/' . $jugador['foto']) }}" class="img-fluid" alt="carta" />
                                    <p class="imgtext">
                                        <span>
                                            <span><strong>{{$jugador['nombre']}} <br> TIRO - {{$jugador['tiro']}} <br> DEFENSA - {{$jugador['defensa']}} <br> REBOTE - {{$jugador['rebotes']}} <br> ASISTENCIA - {{$jugador['asistencias']}}
                                            <br> ATLETISMO - {{$jugador['atletismo']}} </strong></span>
                                        </span>
                                    </p>
                                    <div id="idCompra" style="display:none;">{{$jugador['idCompra']}}</div>
                                    <div id="idJugador" style="display:none;">{{$jugador['id']}}</div>
                                    <div id="fotoJugador" style="display:none;">{{$jugador['foto']}}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
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

    @php
        if(isset($comprasAgrupadas)) {
            $comprasAgrupadas = $comprasAgrupadas;
        } else {
            $comprasAgrupadas = null;
        }
    @endphp

    @if($comprasAgrupadas != null)
        @foreach($comprasAgrupadas as $idMazo => $compras)
            <div class="row">
                <p class="col-2">
                    <a class="verMazo" data-bs-toggle="collapse" href="#verMazo{{$idMazo}}" aria-expanded="false" aria-controls="verMazo{{$idMazo}}"><button type="button">{{ $compras->first()->mazo_nombre }}</button></a>
                </p>
                    <div class="collapse multi-collapse pb-4" id="verMazo{{$idMazo}}" class="verMazo">
                        <div class="card card-body p-3" style="background-color:#29303f;">
                            <div class="container-fluid d-flex justify-content-center">
                                <div class="row">
                                    @foreach($compras as $compra)
                                    <div class="col-lg-3 d-flex justify-content-center">
                                        <div id="cajaVer">
                                            <img data-bs-nombre="placeholder" id="cajaVer2" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/' . $compra->foto)}}" class="img-fluid" alt="carta1">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <form action="{{route('borrarMazoForm')}}" method="post" id="Mazo">
                                            @csrf
                                            <input type="hidden" name="idMazo" value="{{ $idMazo }}">
                                            <button id="borrarMazo" name="borrarMazo" style="width: 100%" type="submit" class="guardarMazo btn btn-primary">Borrar mazo</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{route('seleccionarMazoForm')}}" method="post" id="darSeleccionMazo">
                                            @csrf
                                            <input type="hidden" name="idMazo" value="{{ $idMazo }}">
                                            <button id="seleccionarMazo" name="seleccionarMazo" style="width: 100%" type="submit" class="guardarMazo btn btn-primary">Seleccionar mazo</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    @endif

 </div>
@stop