<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class jugadores extends Model
{
    use HasFactory, Notifiable;

    public function compras() {
        return $this->hasMany('App\Models\compras', 'idjugador');
    }

    protected $fillable = [
        'nombre',
        'equipo',
        'posicion',
        'rareza',
        'tiro',
        'defensa',
        'asistencias',
        'rebotes',
        'atletismo',
        'foto',
        'precio',
    ];

    protected $casts = [
        'tiro' => 'integer',
        'defensa' => 'integer',
        'asistencias' => 'integer',
        'rebotes' => 'integer',
        'atletismo' => 'integer',
    ];
}
