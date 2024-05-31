<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mazos;
use App\Models\jugadores;
use App\Models\inventarios;
use App\Models\sesiones;
use App\Models\partidas;
use App\Models\user;
use App\Models\compras;
use Illuminate\Support\Facades\Auth;

class partidaController extends Controller
{
    public function partida(){
        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);
        $inventario = inventarios::where('idUsuario', $usuarioC->id)->get();

        $mazosSeleccionados = mazos::where('seleccionado', 1)
            ->where('idInventario', $inventario->first()->id)
            ->get();

        $mazoSeleccionado = $mazosSeleccionados->first();

        $data2 = '';
        if (session('data2')) {
            $data2 = session('data2');
        }

        $jugadoresIA = array();
        if (session('jugadoresIA')) {
            $jugadoresIA = session('jugadoresIA');
        }

        $resultado = '';
        if (session('resultado')) {
            $resultado = session('resultado');
        }

        $jugadores = '';
        if (count($mazosSeleccionados) == 0) {
            $jugadores = '0';
        } else {

            $compras = compras::where('idMazo', $mazoSeleccionado->id)
                ->where('idInventario', $inventario->first()->id)
                ->get();
        
            $jugadores = array();
            foreach($compras as $compra){
                $jugador = jugadores::find($compra->idJugador);
                $jugadores[] = $jugador;
            }
        }

        if (session('mazo')) {
            $mazoSeleccionado = session('mazo');
        }

        if (session('jugadores')) {
            $jugadores = session('jugadores');
        }

        $final = 0;
        if (session('final')) {
            $final = session('final');
        }

    return view('paginas.jugar', ['usuario' => $usuarioC, 'mazo' => $mazoSeleccionado, 'jugadores' => $jugadores, 'data2' => $data2, 'jugadoresIA' => $jugadoresIA, 'resultado' => $resultado, 'final' => $final]);
    }

    public function jugarPartida(){
        $data2 = 'llego';
        $user = Auth::user();

        $jugadoresIA = array();
        for ($i = 0; $i < 4; $i++) {
            $jugadorIA = jugadores::all()->random();
            $jugadoresIA[] = $jugadorIA;
        }

        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);
        $inventario = inventarios::where('idUsuario', $usuarioC->id)->get();

        $mazosSeleccionados = mazos::where('seleccionado', 1)
        ->where('idInventario', $inventario->first()->id)
        ->get();

        $mazoSeleccionado = $mazosSeleccionados->first();

        $compras = compras::where('idMazo', $mazoSeleccionado->id)
            ->where('idInventario', $inventario->first()->id)
            ->get();

        $jugadores = array();
        foreach($compras as $compra){
            $jugador = jugadores::find($compra->idJugador);
            $jugadores[] = $jugador;
        }

        $puntos = 0;

        $puntosJugador1 = $jugadores[0]->tiro + $jugadores[0]->defensa + $jugadores[0]->rebotes + $jugadores[0]->asistencias + $jugadores[0]->atletismo;
        $puntosJugador1IA = $jugadoresIA[0]->tiro + $jugadoresIA[0]->defensa + $jugadoresIA[0]->rebotes + $jugadoresIA[0]->asistencias + $jugadoresIA[0]->atletismo;

        if ($puntosJugador1 > $puntosJugador1IA) {
            $puntos++;
        }

        $puntosJugador2 = $jugadores[1]->tiro + $jugadores[1]->defensa + $jugadores[1]->rebotes + $jugadores[1]->asistencias + $jugadores[1]->atletismo;
        $puntosJugador2IA = $jugadoresIA[1]->tiro + $jugadoresIA[1]->defensa + $jugadoresIA[1]->rebotes + $jugadoresIA[1]->asistencias + $jugadoresIA[1]->atletismo;
        
        if ($puntosJugador2 > $puntosJugador2IA) {
            $puntos++;
        }

        $puntosJugador3 = $jugadores[2]->tiro + $jugadores[2]->defensa + $jugadores[2]->rebotes + $jugadores[2]->asistencias + $jugadores[2]->atletismo;
        $puntosJugador3IA = $jugadoresIA[2]->tiro + $jugadoresIA[2]->defensa + $jugadoresIA[2]->rebotes + $jugadoresIA[2]->asistencias + $jugadoresIA[2]->atletismo;

        if ($puntosJugador3 > $puntosJugador3IA) {
            $puntos++;
        }

        $puntosJugador4 = $jugadores[3]->tiro + $jugadores[3]->defensa + $jugadores[3]->rebotes + $jugadores[3]->asistencias + $jugadores[3]->atletismo;
        $puntosJugador4IA = $jugadoresIA[3]->tiro + $jugadoresIA[3]->defensa + $jugadoresIA[3]->rebotes + $jugadoresIA[3]->asistencias + $jugadoresIA[3]->atletismo;

        if ($puntosJugador4 > $puntosJugador4IA) {
            $puntos++;
        }

        $puntosGlobalesTiro = $jugadores[0]->tiro + $jugadores[1]->tiro + $jugadores[2]->tiro + $jugadores[3]->tiro;
        $puntosGlobalesTiroIA = $jugadoresIA[0]->tiro + $jugadoresIA[1]->tiro + $jugadoresIA[2]->tiro + $jugadoresIA[3]->tiro;

        if ($puntosGlobalesTiro > $puntosGlobalesTiroIA) {
            $puntos++;
        }

        $puntosGlobalesDefensa = $jugadores[0]->defensa + $jugadores[1]->defensa + $jugadores[2]->defensa + $jugadores[3]->defensa;
        $puntosGlobalesDefensaIA = $jugadoresIA[0]->defensa + $jugadoresIA[1]->defensa + $jugadoresIA[2]->defensa + $jugadoresIA[3]->defensa;

        if ($puntosGlobalesDefensa > $puntosGlobalesDefensaIA) {
            $puntos++;
        }

        $puntosGlobalesRebotes = $jugadores[0]->rebotes + $jugadores[1]->rebotes + $jugadores[2]->rebotes + $jugadores[3]->rebotes;
        $puntosGlobalesRebotesIA = $jugadoresIA[0]->rebotes + $jugadoresIA[1]->rebotes + $jugadoresIA[2]->rebotes + $jugadoresIA[3]->rebotes;

        if ($puntosGlobalesRebotes > $puntosGlobalesRebotesIA) {
            $puntos++;
        }

        $puntosGlobalesAsistencias = $jugadores[0]->asistencias + $jugadores[1]->asistencias + $jugadores[2]->asistencias + $jugadores[3]->asistencias;
        $puntosGlobalesAsistenciasIA = $jugadoresIA[0]->asistencias + $jugadoresIA[1]->asistencias + $jugadoresIA[2]->asistencias + $jugadoresIA[3]->asistencias;

        if ($puntosGlobalesAsistencias > $puntosGlobalesAsistenciasIA) {
            $puntos++;
        }

        $puntosGlobalesAtletismo = $jugadores[0]->atletismo + $jugadores[1]->atletismo + $jugadores[2]->atletismo + $jugadores[3]->atletismo;
        $puntosGlobalesAtletismoIA = $jugadoresIA[0]->atletismo + $jugadoresIA[1]->atletismo + $jugadoresIA[2]->atletismo + $jugadoresIA[3]->atletismo;

        if ($puntosGlobalesAtletismo > $puntosGlobalesAtletismoIA) {
            $puntos++;
        }

        $resultado = '';
        if ($puntos > 5) {
            $resultado = 'victoria';
        } else {
            $resultado = 'derrota';
        }
        
        $partida = new partidas();
        $partida->idUsuario = $usuario->id;

        $sesion = sesiones::where('idUsuario', $usuario->id)
            ->where('estado', 'activa')
            ->get();

        $sesion = $sesion->first();

        $partida->idSesion = $sesion->id;

        $final = 0;

        if ($resultado == 'victoria') {
            $partida->resultado = 1;
            $usuarioC->saldo = $usuario->saldo + 200;
            $usuarioC->save();
            $mazoSeleccionado->usos = $mazoSeleccionado->usos - 1;
            if ($mazoSeleccionado->usos == 0) {
                $final = 1;
                $compras = compras::where('idMazo', $mazoSeleccionado->id)
                    ->where('idInventario', $inventario->first()->id)
                    ->get();
                
                foreach($compras as $compra){
                    $compra->delete();
                }

                $mazoSeleccionado->delete();
            } else {
                $mazoSeleccionado->save();
            }
        } else {
            $partida->resultado = 0;
            $mazoSeleccionado->usos = $mazoSeleccionado->usos - 1;
            if ($mazoSeleccionado->usos == 0) {
                $final = 1;
                $compras = compras::where('idMazo', $mazoSeleccionado->id)
                    ->where('idInventario', $inventario->first()->id)
                    ->get();
                
                foreach($compras as $compra){
                    $compra->delete();
                }

                $mazoSeleccionado->delete();
            } else {
                $mazoSeleccionado->save();
            }
        }

        $partida->save();

        return redirect()->route('jugar')->with(['mazo' => $mazoSeleccionado, 'jugadores' => $jugadores, 'data2', 'data2' => $data2, 'jugadoresIA' => $jugadoresIA, 'resultado' => $resultado, 'final' => $final]);
    }
}
