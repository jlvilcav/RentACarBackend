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
        Schema::create('tablamaestra', function (Blueprint $table) {
            $table->id('idTablaMaestra');
            $table->string('tabla', 20)->nullable(false);
            $table->string('descripcion', 50)->nullable(false);
            $table->string('tipocampo', 15)->nullable(false);
            $table->string('valor', 50)->nullable(false);
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
        Schema::dropIfExists('tablamaestra');
    }
};
