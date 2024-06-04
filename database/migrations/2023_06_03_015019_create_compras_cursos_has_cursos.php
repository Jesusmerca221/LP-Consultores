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
        Schema::create('compras_cursos_has_cursos', function (Blueprint $table) {

            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('curso_id');

            $table->foreign('compra_id')->references('id')
                ->on('compras_cursos')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')
                ->on('cursos')->onDelete('cascade');

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
        Schema::dropIfExists('compras_cursos_has_cursos');
    }
};
