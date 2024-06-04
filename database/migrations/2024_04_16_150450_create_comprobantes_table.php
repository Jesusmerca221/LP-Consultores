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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_comprobante');
            $table->date('fecha_elaboracion');
            $table->string('tipo_cuenta_contable');
            $table->string('tercero');
            $table->text('descripcion');
            $table->decimal('debito', 10, 2);
            $table->decimal('credito', 10, 2);
            $table->text('observaciones')->nullable();
            $table->string('adjuntar_documento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobantes');
    }
};
