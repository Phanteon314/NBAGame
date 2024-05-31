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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',75);
            $table->string('equipo',75);
            $table->string('posicion',75);
            $table->integer('rareza');
            $table->integer('tiro');
            $table->integer('defensa');
            $table->integer('asistencias');
            $table->integer('rebotes');
            $table->integer('atletismo');
            $table->string('foto',100);
            $table->integer('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
