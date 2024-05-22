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
        Schema::create('modelovehiculos', function (Blueprint $table) {
            $table->id('idModeloVehiculo');
            $table->unsignedBigInteger('idMarcaVehiculo')->nullable();
            $table->string('nombreModeloVehiculo', 20);
            $table->unsignedBigInteger('usuCrea')->nullable();
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->timestamp('fecCrea')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);

            // Foreign keys
            $table->foreign('idMarcaVehiculo')->references('idMarcaVehiculo')->on('marcavehiculos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelovehiculos');
    }
};
