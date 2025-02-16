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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título de la película
            $table->string('director'); // Director de la película
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Clave foránea a categories
            $table->enum('status', ['available', 'borrowed'])->default('available'); // Estado de la película
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
