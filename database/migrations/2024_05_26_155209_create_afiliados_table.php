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
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id('idAfiliado');
            $table->unsignedBigInteger('idPersona');
            $table->unsignedBigInteger('idBanco');
            $table->string('cta', 20);
            $table->string('cci', 20);
            $table->string('yape', 9);
            $table->string('plin', 9);
            $table->unsignedBigInteger('usuCrea')->nullable();
            $table->unsignedBigInteger('usuMod')->nullable();
            $table->timestamp('fecCrea')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecMod')->nullable();
            $table->integer('bitEstado')->default(1);

            // Foreign keys
            $table->foreign('idPersona')->references('id')->on('personas');
            $table->foreign('idBanco')->references('id')->on('bancos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afiliados');
    }
};
