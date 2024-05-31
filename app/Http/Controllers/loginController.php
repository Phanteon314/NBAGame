<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function dologin(Request $request) {
        if (Auth::attempt(['nombreUsuario' => $request->nombreUsuario, 'password' => $request->pwd], true)) {
            return view('index');
        } else {
            $data = "Usuario o contraseña incorrectos";
            return view('paginas.login', ['data'=>$data]);
        }
    }
   
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return view('paginas.login');
    }

    public function login() {
        return view('paginas.login');
    }

}
