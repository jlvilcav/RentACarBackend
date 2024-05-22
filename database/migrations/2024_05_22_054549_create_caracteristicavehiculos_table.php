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
        Schema::create('caracteristicavehiculos', function (Blueprint $table) {
            $table->id('idCaracteristicaVehiculo');
            $table->unsignedBigInteger('idVehiculo');
            $table->unsignedBigInteger('idCaracteristica');
            $table->unsignedBigInteger('usuCrea');
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->dateTime('fecCrea');
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);

            $table->foreign('idVehiculo')->references('idVehiculo')->on('vehiculos');
            $table->foreign('idCaracteristica')->references('idCaracteristica')->on('caracteristicas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristicavehiculos');
    }
};
