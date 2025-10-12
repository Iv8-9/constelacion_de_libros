<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
       Schema::table('users', function (Blueprint $table) {
            $table->text('nombre_lector')->nullable();
            $table->text('app_lector')->nullable();
            $table->text('apm_lector')->nullable();
            $table->integer('edad')->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nombre_lector');
            $table->dropColumn('app_lector');
            $table->dropColumn('apm_lector');
            $table->dropColumn('edad');
        });
    }
        
};
