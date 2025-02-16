<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'loans';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['loan_code', 'user_name', 'book_id', 'movie_id', 'delivery_date', 'return_date'];

    // Relación: Un préstamo pertenece a un libro (opcional)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relación: Un préstamo pertenece a una película (opcional)
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}