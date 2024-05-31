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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('idCliente');
            $table->unsignedBigInteger('idPersona');
            $table->unsignedBigInteger('idPais');
            $table->string('nacionalidad', 20);
            $table->unsignedBigInteger('usuCrea')->nullable();
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->dateTime('fecCrea')->nullable();
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);

            // Foreign keys
            $table->foreign('idPersona')->references('id')->on('personas');
            $table->foreign('idPais')->references('id')->on('paises');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
