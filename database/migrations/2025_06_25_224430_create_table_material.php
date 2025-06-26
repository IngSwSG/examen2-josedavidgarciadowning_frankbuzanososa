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
        Schema::create('material', function (Blueprint $table) {
            $table->id('codigo');
            $table->unsignedBigInteger('categoria');
            $table->foreign('categoria')
            ->references('idCategoria')
            ->on('categoria')
            ->onDelete('set null');

            $table->string('unidadMedida');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_material');
    }
};
