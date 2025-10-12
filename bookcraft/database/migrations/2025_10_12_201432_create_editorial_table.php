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
        Schema::create('editorial', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_editorial')->nullable();
            $table->text('calle')->nullable();
            $table->integer('noExt')->nullable();
            $table->text('colonia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editorial');
    }
};
