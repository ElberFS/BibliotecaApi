<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    // Obtener todos los libros
    public function getAll()
    {
        return Book::all(); // Retorna todos los libros
    }

    // Obtener un libro por ID
    public function find($id)
    {
        return Book::findOrFail($id); // Busca el libro por ID o lanza una excepción si no existe
    }

    // Crear un nuevo libro
    public function create(array $data)
    {
        return Book::create($data); // Crea un nuevo libro con los datos proporcionados
    }

    // Actualizar un libro existente
    public function update($id, array $data)
    {
        $book = Book::findOrFail($id); // Busca el libro por ID
        $book->update($data);         // Actualiza los datos del libro
        return $book;                 // Retorna el libro actualizado
    }

    // Eliminar un libro
    public function delete($id)
    {
        $book = Book::findOrFail($id); // Busca el libro por ID
        $book->delete();              // Elimina el libro
    }
}