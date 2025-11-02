<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('app_lector');
            $table->text('apm_lector');
            $table->integer('edad');
            $table->text('fecha_nacimiento');
            $table->boolean('suscripcion')->default(false);
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('app_lector');
            $table->dropColumn('apm_lector');
            $table->dropColumn('edad');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('suscripcion');
        });
    }
};
