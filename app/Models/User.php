<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class user extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function inventarios()
    {
        return $this->hasOne(Inventarios::class);
    }

    public function partidas() {
        return $this->hasMany('App\Models\partidas', 'idUsuario');
    }

    public function sesiones() {
        return $this->hasMany('App\Models\sesiones', 'idUsuario');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombreUsuario',
        'email',
        'nombre',
        'apellidos',
        'dni',
        'tipo',
        'saldo',
        'fecha_nac',        
        'password',
        'descripcion',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
