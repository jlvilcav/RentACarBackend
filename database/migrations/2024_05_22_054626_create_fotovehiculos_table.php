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
        Schema::create('fotovehiculos', function (Blueprint $table) {
            $table->id('idFotoVehiculo');
            $table->unsignedBigInteger('idVehiculo');
            $table->string('rutaFoto', 100);
            $table->string('extension', 4);
            $table->unsignedBigInteger('usuCrea');
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->dateTime('fecCrea');
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotovehiculos');
    }
};
