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
        $table->dropForeign(['idproducto']);
        $table->unsignedBigInteger('idproducto')->nullable()->change();
        $table->foreign('idproducto')
              ->references('idproducto')
              ->on('productos')
              ->onDelete('set null'); 
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
