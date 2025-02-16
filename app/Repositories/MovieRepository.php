<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository
{
    // Obtener todas las películas
    public function getAll()
    {
        return Movie::all(); // Retorna todas las películas
    }

    // Obtener una película por ID
    public function find($id)
    {
        return Movie::findOrFail($id); // Busca la película por ID o lanza una excepción si no existe
    }

    // Crear una nueva película
    public function create(array $data)
    {
        return Movie::create($data); // Crea una nueva película con los datos proporcionados
    }

    // Actualizar una película existente
    public function update($id, array $data)
    {
        $movie = Movie::findOrFail($id); // Busca la película por ID
        $movie->update($data);          // Actualiza los datos de la película
        return $movie;                  // Retorna la película actualizada
    }

    // Eliminar una película
    public function delete($id)
    {
        $movie = Movie::findOrFail($id); // Busca la película por ID
        $movie->delete();               // Elimina la película
    }
}