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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('idEmpleado');
            $table->unsignedBigInteger('idPersona');
            $table->dateTime('fechaIngreso');
            $table->decimal('sueldo', 8, 2);
            $table->unsignedBigInteger('idCargo');
            $table->foreign('idPersona')->references('idPersona')->on('personas');
            $table->foreign('idCargo')->references('idCargo')->on('cargos');
            $table->unsignedBigInteger('usuCrea')->nullable();
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->dateTime('fecCrea')->nullable();
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
