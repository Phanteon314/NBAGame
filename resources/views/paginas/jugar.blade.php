@extends('layouts.master')

@section('title', 'NBAGame')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/jugar.css")}}"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center text-white" style="margin-bottom: 30px; margin-top: 30px;">
            <h1>ENFRENTAMIENTO</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5 col-md-2 col-sm-1">
            <div class="row d-flex justify-content-center">
                <div>
                    <h1>Jugador 1</h1>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div style="width: 400px; height: 500px;">
                    <img style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/booker.jpg')}}" alt="carta1">
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-1 d-flex justify-content-center">
            <button type="button" class="btn btn-danger">JUGAR</button>
        </div>
        <div class="col-lg-5 col-md-2 col-sm-1">
            <div class="row d-flex justify-content-center">
                <div>
                    <h1>Jugador 2</h1>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div style="width: 400px; height: 500px;">
                    <img style="border: #AAFF00 2px solid;" src="{{asset('images/cartas/doncic.jpg')}}" alt="carta1">
                </div>
            </div>
        </div>
    </div>
@stop