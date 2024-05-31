@extends('layouts.master')

@section('title', 'Leaderboard')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/leaderboard.css")}}"/>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <h1>LEADERBOARD</h1>
        </div>
        <div class="col-12 mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>

    <div class="container-fluid">
        <table class="container">
            <thead>
                <tr>
                    <th><h1>Nombre</h1></th>
                    <th><h1>Numero de sesion</h1></th>
                    <th><h1>Partidas jugadas</h1></th>
                    <th><h1>Partidas ganadas</h1></th>
                    <th><h1>Partidas perdidas</h1></th>
                    <th><h1>Win ratio</h1></th>
                </tr>
            </thead>
            <tbody>
                @foreach($estadisticasSesiones as $estadisticas)
                <tr class="text-white">
                    <td>{{$estadisticas->nombre}}</td>
                    <td>{{$estadisticas->sesionId}}</td>
                    <td>{{$estadisticas->totalPartidas}}</td>
                    <td>{{$estadisticas->victorias}}</td>
                    <td>{{$estadisticas->derrotas}}</td>
                    <td>{{$estadisticas->winRatio}}%</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row d-flex justify-content-center" style="width: 93%">
            {{ $estadisticasSesiones->links() }}
        </div>
    </div>
@stop