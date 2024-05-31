<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class inventarios extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'idUsuario',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function compras() {
        return $this->hasMany('App\Models\compras', 'idInventario');
    }

    public function mazos() {
        return $this->hasMany('App\Models\mazos', 'idInventario');
    }
    
}
