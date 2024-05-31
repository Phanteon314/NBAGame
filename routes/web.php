<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\partidaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\compraController;
use App\Http\Controllers\userController;
use App\Http\Controllers\sesionController;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

//Rutas a las paginas

//Ruta de la pagina principal
Route::get('/', function () {
    return view('index');
});

//Ruta de la pagina de inventario
Route::get('/login', [loginController::class, 'login'])->name('login');

//Ruta de la pagina de crear usuario
Route::get('/crear', function () {
    return view('paginas.crearUsuario');
}); 

//Ruta de la pagina de registro
Route::get('/register', function () {
    return view('paginas.register');
});

//Ruta de la pagina de inventario
Route::get('/inventario', [InventarioController::class, 'inventario']);

//Ruta de la pagina de jugar
Route::get('/jugar', [partidaController::class, 'partida'])->name('jugar');

//Ruta de la pagina de perfil
Route::get('/perfil', [userController::class, 'perfil'])->name('perfil');

//Ruta de la pagina para ingresar al perfil
Route::get('/editarPerfil', function () {
    return view('paginas.editarPerfil');
}); 

//Ruta de la pagina de leaderboard
Route::get('/leaderboard', [sesionController::class, 'leaderboard'])->name('leaderboard');

//Ruta de la pagina de perfil
Route::get('/tienda', [compraController::class, 'tienda'])->name('tienda');

//Ruta de la pagina para ver la pagina de contacto
Route::get('/contacto', function () {
    return view('paginas.contacto');
}); 


//LLamadas a controlador


//                          //            
//                          //
//      LLAMADAS LOGIN      //
//                          //
//                          //


//Llamada para comprobar si el usuario esta logueado
Route::get('/comprobar/{id}', 'App\Http\Controllers\loginController@comprobar')->name('comprobar');

//Llamada para loguear al usuario
Route::post('/login', 'App\Http\Controllers\loginController@doLogin')->name('crearLogin');

//Llamada para desloguear al usuario
Route::get('/logout/{id}', 'App\Http\Controllers\loginController@logout')->name('logout');


//                           //            
//                           //
//      LLAMADAS USUARIO     //
//                           //
//                           //


//Llamada para crear el usuario
Route::post('/crear', 'App\Http\Controllers\userController@crearUsuario')->name('crearUsuario');

//Llamada para editar el perfil del usuario
Route::post('/editarPerfil', 'App\Http\Controllers\userController@actualizarPerfil')->name('editarUsuario');

//Llamada para editar el perfil del usuario
Route::post('/fotoPerfil', 'App\Http\Controllers\userController@cambiarFoto')->name('cambiarFoto');

//Llamada crear un formulario de contacto
Route::post('/contacto', 'App\Http\Controllers\userController@mandarContacto')->name('mandarContacto');


//                         //
//                         //
//      LLAMADAS TIENDA    //
//                         //
//                         //

//Llamada para comprar un jugador
Route::get('/tirarJugador', 'App\Http\Controllers\compraController@realizarTirada')->name('tirarJugador');

//Llamada para comprar un jugador
Route::post('/comprar', 'App\Http\Controllers\compraController@comprarJugador')->name('comprarJugador');


//                             //
//                             //
//      LLAMADAS INVENTARIO    //
//                             //
//                             //

//Llamada para ordenar el inventario
Route::get('/inventario/{nombre}', 'App\Http\Controllers\inventarioController@ordenarInventario')->name('ordenarInventario');


//                          //
//                          //
//      LLAMADAS MAZO       //
//                          //
//                          //

//Llamada para crear un mazo
Route::post('/mazo', 'App\Http\Controllers\mazoController@crearMazo')->name('crearMazoForm');

//Llamada para seleccionar un mazo
Route::post('/selecMazo', 'App\Http\Controllers\mazoController@seleccionarMazo')->name('seleccionarMazoForm');

//Llamada para borrar un mazo
Route::post('/borrarMazo', 'App\Http\Controllers\mazoController@borrarMazo')->name('borrarMazoForm');


//                           //
//                           //
//      LLAMADAS JUGAR       //
//                           //
//                           //

//Llamada para jugar una partida
Route::get('/partida', 'App\Http\Controllers\partidaController@jugarPartida')->name('jugarPartida');


//                           //
//                           //
//      LLAMADAS SESION      //
//                           //
//                           //

//Llamada para jugar una partida
Route::get('/sesion', 'App\Http\Controllers\sesionController@nuevaSesion')->name('nuevaSesion');


