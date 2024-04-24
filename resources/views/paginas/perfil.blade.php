@extends('layouts.master')

@section('title', 'Perfil')

@section('stylesheets')
    @parent
    <link type="text/css" rel="stylesheet" href="{{asset("css/perfil.css")}}"/>
@endsection

@section('content')
<div class="row text-white d-flex justify-content-center" style="margin-top:40px;">
    <div class="col-2">
        <img src="{{asset('images/NBAGame.jpg')}}" style="width:300px; height: 300px;" alt="fotoPerfil">
    </div>
    <div class="col-10">
       Lorem ipsum dolor sit amet, consectetur adipiscing elit
       <br><br>
       Vestibulum lorem sed risus ultricies tristique. 
       <br><br>
       Velit sed ullamcorper morbi tincidunt. 
       <br><br>
       Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. 
       <br><br>
       Tempor nec feugiat nisl pretium fusce id velit ut. Phasellus egestas tellus rutrum tellus. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec. Placerat vestibulum lectus mauris ultrices eros in cursus turpis massa. A lacus vestibulum sed arcu non odio euismod lacinia. Molestie at elementum eu facilisis sed odio morbi. Facilisis volutpat est velit egestas dui. Praesent tristique magna sit amet purus gravida quis blandit turpis. In est ante in nibh mauris cursus mattis. Ut consequat semper viverra nam libero justo laoreet. A cras semper auctor neque vitae tempus quam pellentesque nec. Tincidunt arcu non sodales neque sodales ut etiam. At auctor urna nunc id. Auctor neque vitae tempus quam pellentesque nec nam. In nibh mauris cursus mattis molestie a iaculis at erat. Ac turpis egestas maecenas pharetra convallis posuere. Lobortis elementum nibh tellus molestie nunc non blandit massa. Dolor sed viverra ipsum nunc aliquet bibendum.
    </div>
 </div>
@stop