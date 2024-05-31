@extends('layouts.master')

@section('title', 'NBAGame')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/jugar.css")}}"/>
@endsection

@section('content')
<script src="{{asset('js/jugar.js')}}"></script>
    <div class="row mt-5">
        <div class="col-12">
            <h1>ENFRENTAMIENTO</h1>
        </div>
        <div class="col-12 mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>

    @php
    if(isset($jugadores)) {
        $jugadores = $jugadores;
    } else {
        $jugadores = null;
    }

    if(isset($data2)) {
        $data2 = $data2;
    } else {
        $data2 = null;
    }

    if(isset($jugadoresIA)) {
        $jugadoresIA = $jugadoresIA;
    } else {
        $jugadoresIA = null;
    }

    if(isset($resultado)) {
        $resultado = $resultado;
    } else {
        $resultado = null;
    }

    if(isset($final)) {
        $final = $final;
    } else {
        $final = null;
    }
    @endphp

    <div class="row mt-5">
        @if($jugadores == 0 || $jugadores == null || $final == 1)
        <div class="col-12">
            <div class="row d-flex justify-content-center">
                <div class="col-5 p-4" style="text-align: center;background-color:rgb(0, 0, 0);">
                    <h2 class="text-white">NO SE HA SELECCIONADO NINGUN MAZO</h2>
                    <a class="irPerfil" href="{{url('/perfil')}}"><button class="btn btn-primary">Ir al perfil</button></a>
                </div>
            </div>
        </div>
    </div>
    @endif

        @if($jugadores != 0 && $jugadores != null && $final == 0)
        <div class="col-5">
            <div class="row">
                <h1>{{$usuario->nombre}}</h1>
            </div>
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-4 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <object style="border: #AAFF00 2px solid;" data="{{asset('uploads/' . $usuario['foto'])}}" class="img-fluid" type="image/jpg">
                                <img style="border: #AAFF00 2px solid;" class="img-fluid" src="{{asset('images/placeholder.jpg')}}" />
                            </object>
                        </div>
                        <div class="col-12">
                            <h2 class="text-white mt-3">Mazo en uso: {{$mazo->nombre}}</h2>
                            <h2 class="text-white mt-3">Usos restantes: {{$mazo->usos}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <div class="row">
                        @foreach($jugadores as $jugador)
                        <div class="col-6 mb-4">
                            <img class="img-fluid" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/' . $jugador['foto'] .'')}}" alt="fotoJugador">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center"><a class="d-flex align-items-center" style="text-decoration: none" href="{{route('jugarPartida')}}" id="btnJugar">
            <div class="cajaBorde d-flex justify-content-center align-items-center">
                <div class="d-flex align-items-center">
                    JUGAR
                </div>
            </div>
        </a>
        </div>

        <div class="col-5">
            <div class="row">
                <h1>Inteligencia artificial</h1>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <img style="width: 70%; height:auto; border: #AAFF00 2px solid;" class="img-fluid mt-3" src="{{asset('images/ia.jpeg')}}" alt="ia">
                </div>
            </div>
        </div>
        @endif
    </div>

    @if($data2 != null)
    <div class="container-fluid" id="contenedorResultado" style="margin-top: 100px">
        <div class="row mt-5">
            <div class="col-12">
                @if($resultado == 'victoria')
                <h1>VICTORIA</h1>
                @elseif($resultado == 'derrota')
                <h1 class="text-danger">DERROTA</h1>
                @endif
            </div>
            <div class="col-12 mb-2">
            <hr style="border-top: 1px solid #AAFF00;">
            </div>
        </div>
        
        <div class="row">
            @if($jugadores != 0 && $jugadores != null)
            <div class="col-5">
                <div class="row">
                    <h1>{{$usuario->nombre}}</h1>
                </div>
                <div class="row">
                    <div class="col-1">
    
                    </div>
                    <div class="col-4 mt-3">
                        <div class="row">
                            <div class="col-12">
                                <object style="border: #AAFF00 2px solid;" data="{{asset('uploads/' . $usuario['foto'])}}" class="img-fluid" type="image/jpg">
                                    <img style="border: #AAFF00 2px solid;" class="img-fluid" src="{{asset('images/placeholder.jpg')}}" />
                                </object>
                            </div>
                            <div class="col-12">
                                <h2 class="text-white mt-3">Mazo en uso: {{$mazo->nombre}}</h2>
                                <h2 class="text-white mt-3">Usos restantes: {{$mazo->usos}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="row">
                            @foreach($jugadores as $jugador)
                            <div class="col-6 mb-4">
                                <img class="img-fluid" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/' . $jugador['foto'] .'')}}" alt="fotoJugador">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-2">

            </div>

            @if($jugadoresIA != 0 && $jugadoresIA != null)
            <div class="col-5">
                <div class="row">
                    <h1>Inteligencia artificial</h1>
                </div>
                <div class="row">
                    <div class="col-1">
    
                    </div>
                    <div class="col-4 mt-3">
                        <div class="row">
                            <div class="col-12">
                                <img style="border: #AAFF00 2px solid;" class="img-fluid mt-3" src="{{asset('images/ia.jpeg')}}" alt="ia">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="row">
                            @foreach($jugadoresIA as $jugador)
                            <div class="col-6 mb-4">
                                <img class="img-fluid" style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/' . $jugador['foto'] .'')}}" alt="fotoJugador">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif

@stop