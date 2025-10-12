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
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categoria')->nullable();
            $table->integer('id_editorial')->nullable();
            $table->text('nombre_libro')->nullable();
            $table->text('autor')->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categoria');
            $table->foreign('id_editorial')->references('id')->on('editorial');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro');
    }
};
