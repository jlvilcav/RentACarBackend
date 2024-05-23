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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('idEmpresa');
            $table->string('razonSocial', 20);
            $table->string('ruc', 11);
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 50);
            $table->unsignedBigInteger('usuCrea');
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->dateTime('fecCrea')->default(now());
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
