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
        Schema::create('temas_capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('video');

            $table->unsignedBigInteger('id_capacitacion');
            $table->foreign('id_capacitacion')->references('id')
                ->on('capacitaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas_capacitaciones');
    }
};
