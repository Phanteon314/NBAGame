<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mazos;
use Illuminate\Support\Facades\Auth;
use App\Models\inventarios;
use App\Models\compras;
use App\Models\jugadores;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class mazoController extends Controller
{
    public function crearMazo(Request $request){
        $usuario = Auth::user();
        $inventario = Inventarios::where('idUsuario', $usuario->id)->first();

        $mazo = new mazos();
        $mazo->nombre = $request->nombreMazo;
        $mazo->usos = 3;
        $mazo->seleccionado = 0;
        $mazo->idInventario = $inventario->id;
        $mazo->save();

        $compra1 = $request->compra1;
        $compra2 = $request->compra2;
        $compra3 = $request->compra3;
        $compra4 = $request->compra4;
        
        $primera = compras::where('id', $compra1)->first();
        $primera->orden = 1;
        $primera->idMazo = $mazo->id;
        $primera->save();

        $segunda = compras::where('id', $compra2)->first();
        $segunda->orden = 2;
        $segunda->idMazo = $mazo->id;
        $segunda->save();

        $tercera = compras::where('id', $compra3)->first();
        $tercera->orden = 3;
        $tercera->idMazo = $mazo->id;
        $tercera->save();

        $cuarta = compras::where('id', $compra4)->first();
        $cuarta->orden = 4;
        $cuarta->idMazo = $mazo->id;
        $cuarta->save();
    
        $compras = DB::table('compras')
                    ->join('jugadores', 'compras.idJugador', '=', 'jugadores.id')
                    ->join('mazos', 'compras.idMazo', '=', 'mazos.id')
                    ->where('compras.idInventario', $inventario->id)
                    ->select('compras.*', 'jugadores.nombre as jugador_nombre', 'jugadores.equipo', 
                             'jugadores.posicion', 'jugadores.defensa', 'jugadores.rebotes', 
                             'jugadores.asistencias', 'jugadores.atletismo', 'jugadores.tiro', 
                             'jugadores.rareza', 'jugadores.foto', 'mazos.nombre as mazo_nombre')
                    ->orderBy('mazos.id')
                    ->orderBy('compras.orden')
                    ->get();
    
        // Agrupar las compras por idMazo
        $comprasAgrupadas = $compras->groupBy('idMazo');

        $compras = compras::where('idInventario', $inventario->id)
        ->whereNull('idMazo')
        ->get();

        $data = array();

        foreach ($compras as $compra){
            $jugadoresCompras = jugadores::where('id', $compra->idJugador)->get();
            foreach ($jugadoresCompras as $jugador) {
                $jugadorArray = $jugador->toArray();
                $jugadorArray['idCompra'] = $compra->id;
                $data[] = $jugadorArray;
            }
        }

        $estadisticasSesiones = DB::table('sesiones')
        ->join('partidas', 'sesiones.id', '=', 'partidas.idSesion')
        ->join('users', 'sesiones.idUsuario', '=', 'users.id')
        ->select(
            DB::raw('CASE WHEN sesiones.estado = "activa" THEN "Actual" ELSE sesiones.id END as sesionId'),
            'sesiones.fechaInicio',
            'sesiones.fechaFinal',
            DB::raw('SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) as victorias'),
            DB::raw('SUM(CASE WHEN partidas.resultado = "0" THEN 1 ELSE 0 END) as derrotas'),
            DB::raw('COUNT(partidas.id) as totalPartidas'),
            DB::raw('ROUND(SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) / COUNT(partidas.id) * 100, 0) as winRatio')
        )
        ->where('sesiones.idUsuario', $usuario->id)
        ->groupBy('sesiones.id', 'sesiones.fechaInicio', 'sesiones.fechaFinal', 'sesiones.estado')
        ->orderBy('victorias', 'desc')
        ->paginate(5);

        $usuarioC = user::find($usuario->id);
    
        return view('paginas.perfil', ['comprasAgrupadas' => $comprasAgrupadas, 'data' => $data, 'usuario' => $usuarioC, 'estadisticasSesiones' => $estadisticasSesiones]);
    }

    public function borrarMazo(Request $request){
        $mazo = mazos::where('id', $request->idMazo)->first();
        $mazo->delete();

        $comprasMazo = compras::where('idMazo', $request->idMazo)->get();
        foreach ($comprasMazo as $compraBorrar){
            $compraBorrar->orden = null;
            $compraBorrar->save();
        }

        $usuario = Auth::user();
        $inventario = Inventarios::where('idUsuario', $usuario->id)->first();
    
        $compras = DB::table('compras')
                    ->join('jugadores', 'compras.idJugador', '=', 'jugadores.id')
                    ->join('mazos', 'compras.idMazo', '=', 'mazos.id')
                    ->where('compras.idInventario', $inventario->id)
                    ->select('compras.*', 'jugadores.nombre as jugador_nombre', 'jugadores.equipo', 
                             'jugadores.posicion', 'jugadores.defensa', 'jugadores.rebotes', 
                             'jugadores.asistencias', 'jugadores.atletismo', 'jugadores.tiro', 
                             'jugadores.rareza', 'jugadores.foto', 'mazos.nombre as mazo_nombre')
                    ->orderBy('mazos.id')
                    ->orderBy('compras.orden')
                    ->get();
    
        // Agrupar las compras por idMazo
        $comprasAgrupadas = $compras->groupBy('idMazo');

        $compras = compras::where('idInventario', $inventario->id)
        ->whereNull('idMazo')
        ->get();

        $data = array();

        foreach ($compras as $compra){
            $jugadoresCompras = jugadores::where('id', $compra->idJugador)->get();
            foreach ($jugadoresCompras as $jugador) {
                $jugadorArray = $jugador->toArray();
                $jugadorArray['idCompra'] = $compra->id;
                $data[] = $jugadorArray;
            }
        }

        $estadisticasSesiones = DB::table('sesiones')
        ->join('partidas', 'sesiones.id', '=', 'partidas.idSesion')
        ->join('users', 'sesiones.idUsuario', '=', 'users.id')
        ->select(
            DB::raw('CASE WHEN sesiones.estado = "activa" THEN "Actual" ELSE sesiones.id END as sesionId'),
            'sesiones.fechaInicio',
            'sesiones.fechaFinal',
            DB::raw('SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) as victorias'),
            DB::raw('SUM(CASE WHEN partidas.resultado = "0" THEN 1 ELSE 0 END) as derrotas'),
            DB::raw('COUNT(partidas.id) as totalPartidas'),
            DB::raw('ROUND(SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) / COUNT(partidas.id) * 100, 0) as winRatio')
        )
        ->where('sesiones.idUsuario', $usuario->id)
        ->groupBy('sesiones.id', 'sesiones.fechaInicio', 'sesiones.fechaFinal', 'sesiones.estado')
        ->orderBy('victorias', 'desc')
        ->paginate(5);

        $usuarioC = user::find($usuario->id);
    
        return view('paginas.perfil', ['comprasAgrupadas' => $comprasAgrupadas, 'data' => $data, 'usuario' => $usuarioC, 'estadisticasSesiones' => $estadisticasSesiones]);
    }

    public function seleccionarMazo(Request $request){
        $mazo = mazos::where('id', $request->idMazo)->first();

        $mazosSeleccionados = mazos::where('seleccionado', 1)->get();
        if ($mazosSeleccionados->count() > 0){
            foreach ($mazosSeleccionados as $mazoSeleccionado){
                $mazoSeleccionado->seleccionado = 0;
                $mazoSeleccionado->save();
            }
        }

        $mazo->seleccionado = 1;
        $mazo->save();

        $usuario = Auth::user();
        $inventario = Inventarios::where('idUsuario', $usuario->id)->first();
    
        $compras = DB::table('compras')
                    ->join('jugadores', 'compras.idJugador', '=', 'jugadores.id')
                    ->join('mazos', 'compras.idMazo', '=', 'mazos.id')
                    ->where('compras.idInventario', $inventario->id)
                    ->select('compras.*', 'jugadores.nombre as jugador_nombre', 'jugadores.equipo', 
                             'jugadores.posicion', 'jugadores.defensa', 'jugadores.rebotes', 
                             'jugadores.asistencias', 'jugadores.atletismo', 'jugadores.tiro', 
                             'jugadores.rareza', 'jugadores.foto', 'mazos.nombre as mazo_nombre')
                    ->orderBy('mazos.id')
                    ->orderBy('compras.orden')
                    ->get();
    
        // Agrupar las compras por idMazo
        $comprasAgrupadas = $compras->groupBy('idMazo');

        $compras = compras::where('idInventario', $inventario->id)
        ->whereNull('idMazo')
        ->get();

        $data = array();

        foreach ($compras as $compra){
            $jugadoresCompras = jugadores::where('id', $compra->idJugador)->get();
            foreach ($jugadoresCompras as $jugador) {
                $jugadorArray = $jugador->toArray();
                $jugadorArray['idCompra'] = $compra->id;
                $data[] = $jugadorArray;
            }
        }

        $estadisticasSesiones = DB::table('sesiones')
        ->join('partidas', 'sesiones.id', '=', 'partidas.idSesion')
        ->join('users', 'sesiones.idUsuario', '=', 'users.id')
        ->select(
            DB::raw('CASE WHEN sesiones.estado = "activa" THEN "Actual" ELSE sesiones.id END as sesionId'),
            'sesiones.fechaInicio',
            'sesiones.fechaFinal',
            DB::raw('SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) as victorias'),
            DB::raw('SUM(CASE WHEN partidas.resultado = "0" THEN 1 ELSE 0 END) as derrotas'),
            DB::raw('COUNT(partidas.id) as totalPartidas'),
            DB::raw('ROUND(SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) / COUNT(partidas.id) * 100, 0) as winRatio')
        )
        ->where('sesiones.idUsuario', $usuario->id)
        ->groupBy('sesiones.id', 'sesiones.fechaInicio', 'sesiones.fechaFinal', 'sesiones.estado')
        ->orderBy('victorias', 'desc')
        ->paginate(5);

        $usuarioC = user::find($usuario->id);
    
        return view('paginas.perfil', ['comprasAgrupadas' => $comprasAgrupadas, 'data' => $data, 'usuario' => $usuarioC, 'estadisticasSesiones' => $estadisticasSesiones]);
    }
}
