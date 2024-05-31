<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class compras extends Model
{
    use HasFactory, Notifiable;

    public function inventarios() { 
        return $this->belongsTo('App\Models\inventarios'); 
    }

    public function jugadores() { 
        return $this->belongsTo('App\Models\jugadores'); 
    }

    public function mazos() { 
        return $this->belongsTo('App\Models\mazos'); 
    }

    protected $fillable = [
        'precio',
        'orden',
        'idInventario',
        'idJugador',
        'idMazo',
    ];
    
}
