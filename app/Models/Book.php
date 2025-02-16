<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'books';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['title', 'author', 'category_id', 'status'];

    // Relación: Un libro pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación: Un libro puede tener muchos préstamos
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}