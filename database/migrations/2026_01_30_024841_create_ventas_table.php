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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('idventa');
            $table->date('Fecha');
            $table->enum('mpago', ['Efectivo', 'Tarjeta']); // Medio de pago
            $table->unsignedBigInteger('idproducto');
            $table->unsignedBigInteger('idcliente');
            $table->integer('Cantidad');
            $table->timestamps();
        
            $table->foreign('idproducto')->references('idproducto')->on('productos');
            $table->foreign('idcliente')->references('idcliente')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
