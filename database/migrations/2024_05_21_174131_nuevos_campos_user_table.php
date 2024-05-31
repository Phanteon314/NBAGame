<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function($table) {
            $table->string('nombre',75);
            $table->string('apellidos',75);
            $table->string('nombreUsuario',75)->unique();
            $table->string('dni',75)->unique();
            $table->string('tipo',75)->nullable();
            $table->string('foto',100)->nullable();
            $table->string('descripcion',1000);
            $table->integer('saldo');            
            $table->date('fecha_nac');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
