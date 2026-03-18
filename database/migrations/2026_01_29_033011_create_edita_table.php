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
        $table->unsignedBigInteger('idusuario');
        $table->unsignedBigInteger('idproducto');
        $table->string('accion', 100);
        $table->integer('cantidad_anterior')->nullable();
        $table->integer('cantidad_nueva')->nullable();
        $table->timestamps(); 
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
