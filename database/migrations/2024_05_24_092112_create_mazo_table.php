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
        Schema::create('mazos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',75);
            $table->string('usos',75);
            $table->integer('seleccionado')->nullable();
            $table->integer('idInventario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mazos');
    }
};
