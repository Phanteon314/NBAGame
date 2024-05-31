<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sesionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sesiones')->insert([
            'estado' => 'activa',
            'idUsuario' => 1,
            'fechaInicio' => now(),
            'fechaFinal' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);   
    }
}
