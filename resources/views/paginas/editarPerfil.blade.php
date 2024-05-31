@extends('layouts.master')

@section('title', 'Editar Perfil')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/editarPerfil.css")}}"/>
@endsection

@section('content')
<script src="{{asset('js/editarPerfil.js')}}"></script>
<div class="row text-white d-flex justify-content-center" style="margin-top:40px;">

    <div class="row">
        <div class="col-12">
            <h1>Editar Perfil</h1>
        </div>
        <div class="col-12 mb-2">
        <hr style="border-top: 1px solid #AAFF00;">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-5">
            <div class="row">
                <div class="col-3"></div>
                <object data="{{ asset('uploads/' . Auth::user()->foto) }}" style="width:400px; height:400px;" type="image/jpg">
                    <img style="width:300px; height: 300px;" src="{{asset('images/placeholder.jpg')}}" />
                </object>
            </div>
            <div class="row">
                <div class="col-3"></div>
                <form class="col-6" action="{{route('cambiarFoto')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <label for="foto" class="form-label">Cambiar foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Subir foto</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6 d-flex flex-column p-4" style="background-color:#29303f; border:#AAFF00 2px solid;">
            @php
                if(isset($data)) {
                    $data = $data;
                } else {
                    $data = null;
                }
            @endphp
            @if($data == 'Usuario ya existente' && $data != null) 
            <div class="container-fluid mt-4" style="width: 95%">
                <div class="alert alert-danger" role="alert">
                    <div class="row d-flex justify-content-between">
                        <strong class="col-11">El usuario ya existe o se ha introducido un dato incorrecto</strong>
                        <button type="col-1 button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            @endif
            <form id="editarUsuario" action="{{route('editarUsuario')}}" method="post">
                @csrf
                <div class="mt-1">
                    <label for="nombreUsuario" class="form-label">Nombre de usuario:</label>
                    <input type="text" value="{{ Auth::user()->nombreUsuario }}" class="datosInput" name="nombreUsuario" id="nombreUsuario" aria-describedby="nombreUsuario">
                </div>
                <div class="mt-4">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" value="{{ Auth::user()->nombre }}" class="datosInput" name="nombre" id="nombre" aria-describedby="nombre">
                </div>
                <div class="mt-4">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="apellidos" value="{{ Auth::user()->apellidos }}" class="datosInput" name="apellidos" id="apellidos" aria-describedby="apellidos">
                </div>
                <div class="mt-4">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" value="{{ Auth::user()->email }}" class="datosInput" name="email" id="email" aria-describedby="email">
                </div>
                <div class="mt-4">
                    <label for="dni" class="form-label">DNI:</label>
                    <input type="dni" value="{{ Auth::user()->dni }}" class="datosInput" name="dni" id="dni" aria-describedby="email">
                </div>
                <div class="mt-4">
                    <label for="descripcion" class="form-label">Descripcion:</label>
                    <textarea type="descripcion" rows="11" cols="50" class="datosInput" name="descripcion" id="descripcion" aria-describedby="descripcion">
{{ Auth::user()->descripcion }}
                    </textarea>
                </div>
                <div class="row">
                    <div class="col-12 mb-2">
                      <hr style="border-top: 1px solid #AAFF00;">
                    </div>
                    <div class="col-3">
                      <a id='irPerfil' href="{{url('/perfil')}}"><button type="button">Cancelar</button></a>
                    </div>
                    <div class="col-9 d-flex justify-content-center pb-2">
                      <button style="width: 100%" type="submit" class="btn btn-primary">Actualizar datos</button>
                    </div>
                  </div>
            </form>
        </div>
    </div>

 </div>
@stop