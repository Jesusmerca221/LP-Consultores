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
        Schema::create('cuentas_contables', function (Blueprint $table) {
            $table->id();
            $table->string('clase');
            $table->string('grupo');
            $table->string('cuenta');
            $table->string('subcuenta');
            $table->string('auxiliar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas_contables');
    }
};
