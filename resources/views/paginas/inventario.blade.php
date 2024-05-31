@extends('layouts.master')

@section('title', 'Inventario')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/inventario.css")}}"/>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h1>INVENTARIO</h1>
        </div>
        <div class="col-12 mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/nombre')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">Nombre</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/equipo')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">equipo</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/rareza')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">rareza</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/tiro')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">tiro</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/defensa')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">defensa</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/rebotes')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">rebote</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/asistencias')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">asistencias</button></a>
        </div>
        <div class="col d-flex justify-content-center align-middle">
            <a href="{{url('/inventario/atletismo')}}"><button type="button" class="btn btn-dark" style="width:150px; margin-bottom:5px">atletismo</button></a>
        </div>
    </div>

    <div class="row">
        @foreach($data as $jugador)
            <div class="col-lg-3 col-md-2 col-sm-1 mt-5 d-flex justify-content-center">
                <div id="imagelist">
                    <a href="">
                        <img style="border: #AAFF00 2px solid;" src="{{ asset('images/cartas/' . $jugador['foto']) }}" style="width: 200px; height: 300px;" alt="carta" />
                        <p class="imgtext">
                        <span>
                            <span><strong>{{$jugador['nombre']}} - {{$jugador['equipo']}} <br> TIRO - {{$jugador['tiro']}} | DEFENSA - {{$jugador['defensa']}} <br> REBOTE - {{$jugador['rebotes']}} | ASISTENCIA - {{$jugador['asistencias']}}
                            <br> ATLETISMO - {{$jugador['atletismo']}} </strong></span>
                        </span>
                        </p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@stop