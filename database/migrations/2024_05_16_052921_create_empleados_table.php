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
        Schema::dropIfExists('empleados');
    }
};
