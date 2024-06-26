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
        Schema::create('personas', function (Blueprint $table) {
            $table->id('idPersona');
            $table->string('apPaterno', 50);
            $table->string('apMaterno', 50);
            $table->string('nombres', 50);
            $table->string('numeroDocumento', 15);
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
        Schema::dropIfExists('personas');
    }
};
