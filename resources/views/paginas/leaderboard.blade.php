@extends('layouts.master')

@section('title', 'Leaderboard')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/leaderboard.css")}}"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center text-white" style="margin-bottom: 20px; margin-top: 30px;">
            <h1>LEADERBOARD</h1>
        </div>
    </div>

    <div class="container-fluid">
        <table class="container">
            <thead>
                <tr>
                    <th><h1>Jugador</h1></th>
                    <th><h1>Cartas</h1></th>
                    <th><h1>Intentos</h1></th>
                    <th><h1>Tipo</h1></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>000000</td>
                    <td>000000</td>
                    <td>000000</td>
                </tr>
            </tbody>
        </table>

    </div>
@stop