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
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->id('idMaterialUnidad');
            $table->integer('cantidad');
            
            $table->unsignedBigInteger('codigo'); 
            $table->unsignedBigInteger('idUnidad'); 
            $table->unsignedBigInteger('codigoPresupuesto');

            $table->timestamps();

            $table->foreign('codigo')->references('codigo')->on('material')->onDelete('cascade');
            $table->foreign('idUnidad')->references('idUnidad')->on('unidad')->onDelete('cascade');
            $table->foreign('codigoPresupuesto')->references('codigoPresupuesto')->on('presupuesto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_unidad');
    }
};
