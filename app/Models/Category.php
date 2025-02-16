<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'categories';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['name', 'genre'];

    // Relación: Una categoría tiene muchos libros
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Relación: Una categoría tiene muchas películas
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}