<?php

use Illuminate\Support\Facades\Route;

//Rutas a las paginas

//Ruta de la pagina principal
Route::get('/', function () {
    return view('index');
});

//Ruta de la pagina de login
Route::get('/login', function () {
    return view('paginas.login');
}); 

//Ruta de la pagina de registro
Route::get('/register', function () {
    return view('paginas.register');
});

//Ruta de la pagina de inventario
Route::get('/inventario', function () {
    return view('paginas.inventario');
}); 

//Ruta de la pagina para jugar al juego
Route::get('/jugar', function () {
    return view('paginas.jugar');
}); 

//Ruta de la pagina para ingresar al perfil
Route::get('/perfil', function () {
    return view('paginas.perfil');
}); 

//Ruta de la pagina para comprobar la leaderboard
Route::get('/leaderboard', function () {
    return view('paginas.leaderboard');
}); 

//Ruta de la pagina para ver la tienda
Route::get('/tienda', function () {
    return view('paginas.tienda');
}); 


//LLamadas a controlador

