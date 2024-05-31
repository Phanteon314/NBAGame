<?php

namespace App\Http\Controllers;

use App\Models\inventarios;
use App\Models\compras;
use App\Models\mazos;
use App\Models\sesiones; 
use App\Models\user; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;

class sesionController extends Controller
{
    public function nuevaSesion(){
        $user = Auth::user();
        $usuarioC = user::find($user->id);
        $usuarioC->saldo = 1500;
        $usuarioC->save();

        $sesionActual = sesiones::where('idUsuario', Auth::user()->id)->where('estado', 'activa')->get();  
        $sesionActual = $sesionActual->first();
        $sesionActual->fechaFinal = date('Y-m-d');
        $sesionActual->estado = 'finalizada';
        $sesionActual->save();

        $inventario = inventarios::where('idUsuario', Auth::user()->id)->get();
        $inventario = $inventario->first();
        $compras = compras::where('idInventario', $inventario->id)->get();

        foreach($compras as $compra){
            $mazo = mazos::find($compra->idMazo);
            if ($mazo != null){
                $mazo->delete();
            }
            $compra->delete();
        }

        $sesionNueva = new sesiones();
        $sesionNueva->idUsuario = Auth::user()->id;
        $sesionNueva->estado = 'activa';
        $sesionNueva->fechaInicio = date('Y-m-d');
        $sesionNueva->save();
    
        return redirect()->route('perfil');
    }

    public function leaderboard(){

        $estadisticasSesiones = DB::table('sesiones')
        ->leftjoin('partidas', 'sesiones.id', '=', 'partidas.idSesion')
        ->join('users', 'sesiones.idUsuario', '=', 'users.id')
        ->select(
            'users.nombre as nombre',
            'sesiones.id as sesionId',
            'sesiones.fechaInicio',
            'sesiones.fechaFinal',
            DB::raw('SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) as victorias'),
            DB::raw('SUM(CASE WHEN partidas.resultado = "0" THEN 1 ELSE 0 END) as derrotas'),
            DB::raw('COUNT(partidas.id) as totalPartidas'),
            DB::raw('ROUND(SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) / COUNT(partidas.id) * 100, 0) as winRatio')
        )
        ->groupBy('sesiones.id', 'sesiones.fechaInicio', 'sesiones.fechaFinal', 'sesiones.estado', 'users.nombre')
        ->orderBy('victorias', 'desc')
        ->paginate(10);

        return view('paginas.leaderboard', ['estadisticasSesiones'=>$estadisticasSesiones]);
    }
}
