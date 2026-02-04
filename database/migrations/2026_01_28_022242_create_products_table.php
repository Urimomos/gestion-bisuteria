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
       Schema::create('productos', function (Blueprint $table) {
    $table->id('idproducto'); // Usamos el nombre del diagrama
    $table->string('nombre', 40);
    $table->decimal('precompra', 8, 2); // Costo
    $table->decimal('preventa', 8, 2);  // Precio de venta
    $table->integer('inventario')->default(0); 
    $table->string('imagen')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
