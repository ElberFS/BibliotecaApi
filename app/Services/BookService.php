<?php

namespace App\Services;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Validator;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    // Obtener todos los libros
    public function getAll()
    {
        return $this->bookRepository->getAll();
    }

    // Obtener un libro por ID
    public function find($id)
    {
        return $this->bookRepository->find($id);
    }

    // Crear un nuevo libro
    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'author' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:available,borrowed',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->bookRepository->create($data);
    }

    // Actualizar un libro existente
    public function update($id, array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'sometimes|required|string',
            'author' => 'sometimes|required|string',
            'category_id' => 'sometimes|required|exists:categories,id',
            'status' => 'sometimes|required|in:available,borrowed',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->bookRepository->update($id, $data);
    }

    // Eliminar un libro
    public function delete($id)
    {
        return $this->bookRepository->delete($id);
    }
}