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
    Schema::table('edita', function (Blueprint $table) {
        // 1. Eliminamos la llave foránea actual para poder modificarla
        $table->dropForeign(['idproducto']);
        
        // 2. Modificamos la columna para que acepte nulos y sea 'set null'
        $table->unsignedBigInteger('idproducto')->nullable()->change();
        $table->foreign('idproducto')
              ->references('idproducto')
              ->on('productos')
              ->onDelete('set null'); // Esto es el "seguro de vida" del reporte
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
