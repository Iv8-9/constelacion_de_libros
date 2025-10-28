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
        Schema::table('users', function (Blueprint $table) {
            $table->text('nombre_lector')->nullable();
            $table->text('app_lector')->nullable();
            $table->text('apm_lector')->nullable();
            $table->integer('edad')->nullable();
            $table->text('fecha_nacimiento')->nullable();
            $table->text('suscripcion')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nombre_lector');
            $table->dropColumn('app_lector');
            $table->dropColumn('apm_lector');
            $table->dropColumn('edad');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('suscripcion');
        });
    }
};
