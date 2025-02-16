<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    // Obtener todas las categorías
    public function getAll()
    {
        return Category::all(); // Retorna todas las categorías
    }

    // Obtener una categoría por ID
    public function find($id)
    {
        return Category::findOrFail($id); // Busca la categoría por ID o lanza una excepción si no existe
    }

    // Crear una nueva categoría
    public function create(array $data)
    {
        return Category::create($data); // Crea una nueva categoría con los datos proporcionados
    }

    // Actualizar una categoría existente
    public function update($id, array $data)
    {
        $category = Category::findOrFail($id); // Busca la categoría por ID
        $category->update($data);             // Actualiza los datos de la categoría
        return $category;                     // Retorna la categoría actualizada
    }

    // Eliminar una categoría
    public function delete($id)
    {
        $category = Category::findOrFail($id); // Busca la categoría por ID
        $category->delete();                  // Elimina la categoría
    }
}