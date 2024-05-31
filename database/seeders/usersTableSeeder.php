<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombreUsuario' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'nombre' => 'admin',
            'apellidos' => 'admin',
            'dni' => '12345678A',
            'tipo' => 'admin',
            'saldo' => 30000,
            'fecha_nac' => '1990-01-01',
            'foto' => 'fotoAdmin.jpg',
            'descripcion' => 'Administrador de la web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
