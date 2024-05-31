<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use carbon\Carbon;
use App\Models\user;
use App\Models\inventarios;
use Illuminate\Support\Facades\Auth;
use App\Models\compras;
use App\Models\sesiones;
use App\Models\jugadores;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

class userController extends Controller
{
    public function crearUsuario(Request $request){

        $validatedData = $request->validate([
            'nombreUsuario' => 'required|string|max:255|unique:users,nombreUsuario',
            'password' => 'required|string|max:10',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nac' => 'required|date|before:today',
            'dni' => ['required', 'string', 'size:9', 'regex:/^\d{8}[A-Z]$/', 'unique:users,dni'],
            'email' => 'required|string|email|max:255|unique:users,email',
            'descripcion' => 'required|string',
        ], [
            'nombreUsuario.required' => 'El nombre de usuario es obligatorio',
            'nombreUsuario.unique' => 'El nombre de usuario ya está en uso',
            'password.required' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña no puede tener más de 10 caracteres',
            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'fecha_nac.required' => 'La fecha de nacimiento es obligatoria',
            'fecha_nac.before' => 'La fecha de nacimiento debe ser anterior a la fecha actual',
            'dni.required' => 'El DNI es obligatorio',
            'dni.size' => 'El DNI debe tener 9 caracteres',
            'dni.regex' => 'El formato del DNI no es válido',
            'dni.unique' => 'El DNI ya está registrado',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El formato del email no es válido',
            'email.unique' => 'El email ya está registrado',
            'descripcion.required' => 'La descripción es obligatoria',
        ]);

        $usuario = new user();
        $usuario->nombreUsuario = $request->nombreUsuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->dni = $request->dni;
        $usuario->password = $request->password;
        $usuario->descripcion = $request->descripcion;
        $usuario->tipo = "usuario";
        $usuario->saldo = 1500;
        $usuario->fecha_nac = $request->fecha_nac;
        $usuario->save();
        $data = "Usuario creado";

        $inventario = new inventarios();
        $inventario->idUsuario = $usuario->id;
        $inventario->save();

        $sesion = new sesiones();
        $sesion->idUsuario = $usuario->id;
        $sesion->estado = "activa";
        $sesion->fechaInicio = Carbon::now();
        $sesion->fechaFinal = null;
        $sesion->save();


        return redirect()->route('login');
    }

    public function perfil(){
        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);

        $inventario = inventarios::where('idUsuario', $usuario->id)->first();

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
        ->leftjoin('partidas', 'sesiones.id', '=', 'partidas.idSesion')
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

        return view('paginas.perfil', ['data'=>$data, 'usuario'=>$usuarioC, 'comprasAgrupadas'=>$comprasAgrupadas, 'estadisticasSesiones'=>$estadisticasSesiones]);
    }

    public function actualizarPerfil(Request $request){
        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombreUsuario' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($usuario->id)],
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($usuario->id)],
            'dni' => ['required', 'string', 'size:9', 'regex:/^\d{8}[A-Z]$/', Rule::unique('users')->ignore($usuario->id)],
            'descripcion' => 'required|string',
        ], [
            'nombreUsuario.required' => 'El nombre de usuario es obligatorio',
            'nombreUsuario.unique' => 'El nombre de usuario ya está en uso',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El formato del email no es válido',
            'email.unique' => 'El email ya está registrado',
            'dni.required' => 'El DNI es obligatorio',
            'dni.size' => 'El DNI debe tener 9 caracteres',
            'dni.regex' => 'El formato del DNI no es válido',
            'dni.unique' => 'El DNI ya está registrado',
        ]);

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

        $usuarioC->nombreUsuario = $request->nombreUsuario;
        $usuarioC->nombre = $request->nombre;
        $usuarioC->apellidos = $request->apellidos;
        $usuarioC->email = $request->email;
        $usuarioC->dni = $request->dni;
        $usuarioC->descripcion = $request->descripcion;

        $estadisticasSesiones = DB::table('sesiones')
        ->join('partidas', 'sesiones.id', '=', 'partidas.idSesion')
        ->join('users', 'sesiones.idUsuario', '=', 'users.id')
        ->select(
            DB::raw('CASE WHEN sesiones.estado = "activa" THEN "Actual" ELSE sesiones.id END as sesionId'),
            'sesiones.fechaInicio',
            'sesiones.fechaFinal',
            DB::raw('SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) as victorias'),
            DB::raw('SUM(CASE WHEN partidas.resultado = "0" THEN 1 ELSE 0 END) as derrotas'),
            DB::raw('COUNT(partidas.id) as totalpartidas'),
            DB::raw('ROUND(SUM(CASE WHEN partidas.resultado = "1" THEN 1 ELSE 0 END) / COUNT(partidas.id) * 100, 0) as winRatio')
        )
        ->where('sesiones.idUsuario', $usuario->id)
        ->groupBy('sesiones.id', 'sesiones.fechaInicio', 'sesiones.fechaFinal', 'sesiones.estado')
        ->orderBy('victorias', 'desc')
        ->paginate(5);

        $usuarioC->save();
        return view('paginas.perfil', ['usuario'=>$usuarioC, 'data'=>$data, 'comprasAgrupadas'=>$comprasAgrupadas, 'estadisticasSesiones'=>$estadisticasSesiones]);
    }

    public function cambiarFoto(Request $request){
        $usuario = Auth::user();
        $usuarioC = user::find($usuario->id);

        $usuario = Auth::user();
        $inventario = Inventarios::where('idUsuario', $usuario->id)->first();

        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtiene el archivo de la solicitud
        $archivo = $request->file('foto');

        // Define el nombre del archivo con una marca de tiempo para evitar duplicados
        $nombreArchivo = $archivo->getClientOriginalName();

        // Mueve el archivo a la carpeta 'uploads' dentro de 'public'
        $rutaArchivo = $archivo->move(public_path('uploads'), $nombreArchivo);
        $usuarioC->foto = $nombreArchivo;

    
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

        $usuarioC->save();
        return view('paginas.perfil', ['usuario'=>$usuarioC, 'data'=>$data, 'comprasAgrupadas'=>$comprasAgrupadas, 'estadisticasSesiones'=>$estadisticasSesiones]);
    }

    public function mandarContacto(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mensaje' => 'required|string',
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
            'email.required' => 'El email es obligatorio',
            'mensaje.required' => 'El mensaje es obligatorio',
        ]);

        // Al ser un servidor local, no se puede enviar correos electrónicos sin usar php mailer, dejo el codigo comentado para que se vea como se haría

        //$mail = new PHPMailer(true); 

        //$mail->isSMTP();
        //$mail->Host = 'smtp.gmail.com'; // Configura el servidor SMTP
        //$mail->SMTPAuth = true;
        //$mail->Username = 'nbagame314@gmail.com'; // Tu email
        //$mail->Password = 'NBAGame-3142002'; // Tu contraseña
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //$mail->Port = 587;

        //$mail->setFrom($request->email, $request->nombre . ' ' . $request->apellidos);
        //$mail->addAddress('nbagame314@gmail.com', 'NBAGame');

        //$mail->isHTML(true);
        //$mail->Subject = 'Contacto NBAGame';
        //$mail->Body    = '<p>' . $request->mensaje . '</p>';
        //$mail->AltBody = $request->mensaje;

        //$mail->send();

        return view('index');
    }
}
