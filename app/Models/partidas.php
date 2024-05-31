<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class partidas extends Model
{
    use HasFactory, Notifiable;

    public function user() { 
        return $this->belongsTo('App\Models\user'); 
    }

    public function sesiones() { 
        return $this->belongsTo('App\Models\sesiones'); 
    }

    protected $fillable = [
        'idUsuario',
        'idSesion',
        'resultado',
    ];
}
