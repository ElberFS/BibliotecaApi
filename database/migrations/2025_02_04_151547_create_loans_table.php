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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_code')->unique(); // Código único del préstamo
            $table->string('user_name'); // Nombre del usuario que realiza el préstamo
            $table->foreignId('book_id')->nullable()->constrained()->onDelete('set null'); // Clave foránea a books (opcional)
            $table->foreignId('movie_id')->nullable()->constrained()->onDelete('set null'); // Clave foránea a movies (opcional)
            $table->date('delivery_date'); // Fecha de entrega
            $table->date('return_date'); // Fecha de devolución
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
