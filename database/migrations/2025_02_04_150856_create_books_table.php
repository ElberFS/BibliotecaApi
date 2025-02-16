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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título del libro
            $table->string('author'); // Autor del libro
            $table->unsignedBigInteger('category_id'); // Definir la columna category_id
            $table->enum('status', ['available', 'borrowed'])->default('available'); // Estado del libro
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
