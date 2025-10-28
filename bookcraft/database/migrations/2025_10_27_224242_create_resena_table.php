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
        Schema::create('resena', function (Blueprint $table) {
            $table->id();
            $table->integer('id_libro')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('frase_favorita')->nullable();
            $table->timestamps();

            $table->foreign('id_libro')->references('id')->on('libro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resena');
    }
};
