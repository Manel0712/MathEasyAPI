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
        Schema::create('informes', function (Blueprint $table) {
            $table->id();
            $table->string("Tipus_partida");
            $table->integer("Respostes_correctes");
            $table->integer("Respostes_incorrectes");
            $table->integer("Experiencia");
            $table->unsignedBigInteger("alumne_id");
            $table->foreign('alumne_id')
                ->references('id')
                ->on('alumnes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informes');
    }
};
