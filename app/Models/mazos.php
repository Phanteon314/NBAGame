<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class mazos extends Model
{
    use HasFactory, Notifiable;

    public function compras() {
        return $this->hasMany('App\Models\compras', 'idMazo');
    }

    public function inventarios()
    {
        return $this->belongsTo(inventarios::class);
    }

    protected $fillable = [
        'nombre',
        'usos',
        'seleccionado',
        'idInventario',
    ];
}
