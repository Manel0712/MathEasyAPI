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
        Schema::create('operacio_tascas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("Operacio");
            $table->foreign('Operacio')
                ->references('id')
                ->on('operacios');
            $table->unsignedBigInteger("Tasca");
            $table->foreign('Tasca')
                ->references('id')
                ->on('tascas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operacio_tascas');
    }
};
