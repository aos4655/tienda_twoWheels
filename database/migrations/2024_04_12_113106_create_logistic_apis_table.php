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
        Schema::create('logistic_apis', function (Blueprint $table) {
            $table->id();
            $table->string('num_seguimiento')->unique();
            $table->enum('ult_estado', ["PENDIENTE DE ENVIO", "ENVIADO", "EN REPARTO", "ENTREGADO"])->default("PENDIENTE DE ENVIO");
            $table->dateTime('pendiente_fecha');
            $table->dateTime('enviado_fecha')->nullable();
            $table->dateTime('en_reparto_fecha')->nullable();
            $table->dateTime('entregado_fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistic_apis');
    }
};
