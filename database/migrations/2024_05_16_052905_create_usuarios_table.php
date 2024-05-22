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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('nombreUsuario', 8);
            $table->string('password', 100);
            $table->unsignedBigInteger('idPersona');
            $table->unsignedBigInteger('idPerfil');
            $table->foreign('idPersona')->references('idPersona')->on('personas');
            $table->foreign('idPerfil')->references('idPerfil')->on('perfiles');
            $table->integer('bitEstado');
            $table->integer('usuCrea')->nullable();
            $table->integer('usuMod')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
