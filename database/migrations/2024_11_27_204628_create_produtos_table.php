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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // Chave primária autoincrementada
            $table->string('ref', 50)->unique(); // Referência única (até 50 caracteres)
            $table->string('titulo', 100); // Título do produto (até 100 caracteres)
            $table->text('descricao')->nullable(); // Descrição do produto (pode ser nula)
            $table->string('imagem', 255)->nullable(); // Caminho para a imagem (pode ser nula)
            $table->boolean('ativo')->default(true); // Produto ativo (default é true)
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

