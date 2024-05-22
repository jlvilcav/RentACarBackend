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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('idVehiculo');
            $table->unsignedBigInteger('idMarcaVehiculo');
            $table->unsignedBigInteger('idModeloVehiculo');
            $table->string('placa', 6);
            $table->integer('motor');
            $table->string('anio', 4);
            $table->integer('kilometraje');
            $table->integer('gps')->default(0);
            $table->date('fechaSoat')->nullable();
            $table->date('fechaInspeccionVehicular')->nullable();
            $table->unsignedBigInteger('idAfilado')->nullable();
            $table->unsignedBigInteger('idTipoVehiculo');
            $table->unsignedBigInteger('idTipoCombustible');
            $table->unsignedBigInteger('idTrasmision');
            $table->unsignedBigInteger('idTraccion');
            $table->unsignedBigInteger('idCategoriaVehiculo');
            $table->decimal('precioAlquiler', 7, 2);
            $table->string('observacion', 1000)->nullable();
            $table->unsignedBigInteger('usuCrea');
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->dateTime('fecCrea');
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);

            // Define las claves foráneas
            $table->foreign('idMarcaVehiculo')->references('idMarcaVehiculo')->on('marcavehiculos');
            $table->foreign('idModeloVehiculo')->references('idModeloVehiculo')->on('modelovehiculos');
            $table->foreign('idTipoVehiculo')->references('idTipoVehiculo')->on('tipos_vehiculos');
            $table->foreign('idTipoCombustible')->references('idTipoCombustible')->on('tipos_combustibles');
            $table->foreign('idTrasmision')->references('idTrasmision')->on('trasmisiones');
            $table->foreign('idTraccion')->references('idTraccion')->on('tracciones');
            $table->foreign('idCategoriaVehiculo')->references('idCategoriaVehiculo')->on('categorias_vehiculos');
            // Asegúrate de que las tablas referenciadas existen y que los nombres de las tablas y columnas sean correctos.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
