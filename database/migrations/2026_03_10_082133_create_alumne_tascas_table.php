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
        Schema::create('alumne_tasca', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("Alumne");
            $table->foreign('Alumne')
                ->references('id')
                ->on('alumnes');
            $table->unsignedBigInteger("Tasca");
            $table->foreign('Tasca')
                ->references('id')
                ->on('tascas');
            $table->integer("Qualificacio")->nullable();
            $table->string("Estat_tramesa");
            $table->integer("Resultat1")->nullable();
            $table->integer("Resultat2")->nullable();
            $table->integer("Resultat3")->nullable();
            $table->integer("Resultat4")->nullable();
            $table->integer("Resultat5")->nullable();
            $table->integer("Resultat6")->nullable();
            $table->integer("Resultat7")->nullable();
            $table->integer("Resultat8")->nullable();
            $table->integer("Resultat9")->nullable();
            $table->integer("Resultat10")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumne_tascas');
    }
};
