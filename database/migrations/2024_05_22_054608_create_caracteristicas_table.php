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
        Schema::create('caracteristicas', function (Blueprint $table) {
            $table->id('idCaracteristica');
            $table->string('caracteristica', 50);
            $table->string('label', 50);
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
        Schema::dropIfExists('caracteristicas');
    }
};
