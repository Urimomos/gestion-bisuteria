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
        Schema::create('edita', function (Blueprint $table) {
        $table->id('idedita');
        
        // Relación con el usuario que hace el cambio
        $table->unsignedBigInteger('idusuario');
        
        // Relación con el producto afectado
        $table->unsignedBigInteger('idproducto');
        
        // Descripción de lo que pasó (ej: "Aumentó stock", "Cambió precio")
        $table->string('accion', 100);
        
        // Guardamos los valores para saber qué cambió exactamente
        $table->integer('cantidad_anterior')->nullable();
        $table->integer('cantidad_nueva')->nullable();

        $table->timestamps(); // Esto nos da el "fecha" y "hora" del diagrama automáticamente

        // Llaves foráneas para que la base de datos sea sólida
        $table->foreign('idusuario')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('idproducto')->references('idproducto')->on('productos')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edita');
    }
};
