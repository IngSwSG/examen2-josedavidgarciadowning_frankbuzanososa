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
        Schema::create('unidad', function (Blueprint $table) {
            $table->id('idUnidad');
            $table->string('nombre');
            $table->unsignedBigInteger('presupuestos'); 
            $table->foreign('presupuestos')
                ->references('codigoPresupuesto')
                ->on('presupuesto')
                ->onDelete('set null');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_unidad');
    }
};
