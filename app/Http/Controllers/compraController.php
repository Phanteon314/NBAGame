<?php

namespace App\Http\Controllers;

use App\Models\compras;
use App\Models\user;
use App\Models\inventarios;
use App\Models\jugadores;
use Illuminate\Http\Request;
use carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class compraController extends Controller
{

    public function tienda(){
        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);

        return view('paginas.tienda', ['usuario'=>$usuarioC]);
    }

    public function comprarJugador(Request $request){

        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);
        $inventario = inventarios::where('idUsuario', $usuario->id)->first();

        $jugador = jugadores::where('nombre', $request->nombreJugador)->first();

        $compra = new compras();
        $compra->idInventario = $inventario->id;
        $compra->idJugador = $jugador->id;
        $compra->precio = $request->precioJugador;

        if ($usuario->saldo < $request->precioJugador){
            return view('paginas.tienda', ['data'=>"Saldo insuficiente"]);
        } else {
            $compra->save();

            $usuarioC->saldo = $usuario->saldo - $request->precioJugador;
            $usuarioC->save();
            
            $usuarioC = user::find($usuario->id);
    
            return view('paginas.tienda', ['data'=>"Compra realizada", 'usuario'=>$usuarioC]);
        }
    }   

    public function realizarTirada(){
        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);
        $inventario = inventarios::where('idUsuario', $usuario->id)->first();

        $jugadores = jugadores::all();
        $jugador = $jugadores->random();

        $compra = new compras();
        $compra->idInventario = $inventario->id;
        $compra->idJugador = $jugador->id;
        $compra->precio = 150;

        if ($usuario->saldo < 150){
            return view('paginas.tienda', ['data'=>"Saldo insuficiente", 'usuario'=>$usuarioC , 'jugadorTirada' => $jugador]);
        } else {
            $compra->save();

            $usuarioC->saldo = $usuario->saldo - 150;
            $usuarioC->save();
    
            return view('paginas.tienda', ['data'=>"Compra realizada", 'usuario'=>$usuarioC , 'jugadorTirada' => $jugador]);
        }
    }
}
