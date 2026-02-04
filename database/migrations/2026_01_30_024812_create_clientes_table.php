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
       Schema::create('clientes', function (Blueprint $table) {
            $table->id('idcliente'); // Según diagrama
            $table->string('nombre', 35);
            $table->string('AP', 35)->nullable(); // Apellido Paterno
            $table->string('AM', 35)->nullable(); // Apellido Materno
            $table->string('telefono', 15)->nullable();
            $table->string('email', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
