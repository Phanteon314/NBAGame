<?php

namespace App\Http\Controllers;

use App\Models\compras;
use App\Models\inventarios;
use App\Models\jugadores;
use Illuminate\Http\Request;
use carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class inventarioController extends Controller
{
    public function inventario(){
        $usuario = Auth::user();
        $inventario = inventarios::where('idUsuario', $usuario->id)->first();

        $compras = compras::where('idInventario', $inventario->id)->get();

        $data = array();

        foreach ($compras as $compra){
            $jugadoresCompras = jugadores::where('id', $compra->idJugador)->get();
            $data = array_merge($data, $jugadoresCompras->toArray());
        }

        return view('paginas.inventario', ['data'=>$data]);
    }

    public function ordenarInventario($busqueda){
        $usuario = Auth::user();
        $inventario = inventarios::where('idUsuario', $usuario->id)->first();

        $compras = compras::where('idInventario', $inventario->id)->get();

        $data = array();

        foreach ($compras as $compra){
            $jugadoresCompras = jugadores::where('id', $compra->idJugador)->get();
            $data = array_merge($data, $jugadoresCompras->toArray());
        }

        if ($busqueda == "nombre"){
            usort($data, function($a, $b) {
                return $a['nombre'] <=> $b['nombre'];
            });
        } elseif ($busqueda == "equipo"){
            usort($data, function($a, $b) {
                return $a['equipo'] <=> $b['equipo'];
            });
        } elseif ($busqueda == "rareza"){
            usort($data, function($a, $b) {
                return $b['rareza'] <=> $a['rareza'];
            });
        }  elseif ($busqueda == "tiro") {
            usort($data, function($a, $b) {
                return $b['tiro'] <=> $a['tiro'];
            });
        } elseif ($busqueda == "defensa") {
            usort($data, function($a, $b) {
                return $b['defensa'] <=> $a['defensa'];
            });
        } elseif ($busqueda == "rebotes") {
            usort($data, function($a, $b) {
                return $b['rebotes'] <=> $a['rebotes'];
            });
        } elseif ($busqueda == "asistencias") {
            usort($data, function($a, $b) {
                return $b['asistencias'] <=> $a['asistencias'];
            });
        } elseif ($busqueda == "atletismo") {
            usort($data, function($a, $b) {
                return $b['atletismo'] <=> $a['atletismo'];
            });
        }
        return view('paginas.inventario', ['data'=>$data]);
    }

}
