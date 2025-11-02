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
            $table->integer('id_editorial');
            $table->integer('id_lector');
            $table->integer('id_tipo_libro');
            $table->integer('id_modo_lectura');
            $table->text('nombre_libro');
            $table->text('autor');
            $table->text('categoria');
            $table->text('no_paginas');
            $table->date('fecha_publicacion');
            $table->text('imagen');
            $table->text('personaje_favorito');
            $table->text('personaje_odiado');
            $table->timestamps();
            
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
