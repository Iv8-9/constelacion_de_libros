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
            $table->integer('id_lector')->nullable();
            $table->integer('id_tipo_libro')->nullable();
            $table->integer('id_modo_lectura')->nullable();
            $table->text('nombre_libro')->nullable();
            $table->text('autor')->nullable();
            $table->text('no_paginas')->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->text('imagen')->nullable();
            $table->text('personaje_favorito')->nullable();
            $table->text('personaje_odiado')->nullable();
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categoria');
            $table->foreign('id_editorial')->references('id')->on('editorial');
            $table->foreign('id_lector')->references('id')->on('users');
            $table->foreign('id_tipo_libro')->references('id')->on('tipo_libro');
            $table->foreign('id_modo_lectura')->references('id')->on('modo_lectura');
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