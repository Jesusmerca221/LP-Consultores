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
        Schema::create('compras_capacitaciones_has_capacitaciones', function (Blueprint $table) {

            $table->unsignedBigInteger('id_compra');
            $table->foreign('id_compra')->references('id')
                ->on('compras_capacitaciones')->onDelete('cascade');

            $table->unsignedBigInteger('id_curso');
            $table->foreign('id_curso')->references('id')
                ->on('cursos')->onDelete('cascade');

            $table->primary(['id_compra','id_curso']);

            $table->string('fecha');
            $table->string('metodo_pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras_capacitaciones_has_capacitaciones');
    }
};
