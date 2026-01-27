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
            $table->string("tipus_partida");
            $table->integer("respostes_correctes");
            $table->integer("respostes_incorrectes");
            $table->integer("experiencia");
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
