<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'movies';

    // Atributos que pueden ser asignados masivamente
    protected $fillable = ['title', 'director', 'category_id', 'status'];

    // Relación: Una película pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación: Una película puede tener muchos préstamos
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}