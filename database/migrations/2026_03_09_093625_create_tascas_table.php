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
        Schema::create('tascas', function (Blueprint $table) {
            $table->id();
            $table->string("Nom");
            $table->date("Data_obertura");
            $table->date("Data_tancament");
            $table->unsignedBigInteger("tema_id");
            $table->foreign('tema_id')
                ->references('id')
                ->on('temas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tascas');
    }
};
