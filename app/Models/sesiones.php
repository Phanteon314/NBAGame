<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class sesiones extends Model
{
    use HasFactory, Notifiable;

    public function user() { 
        return $this->belongsTo('App\Models\user'); 
    }

    public function partidas() {
        return $this->hasMany('App\Models\partidas', 'idSesion');
    }

    protected $fillable = [
        'idUsuario',
        'fechaFinal',
        'fechaInicio',
        'estado',
    ];
}
