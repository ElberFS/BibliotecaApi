<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;         // Request para validar datos
use App\Http\Resources\BookResource;       // Resource para transformar datos
use App\Services\BookService;              // Service para encapsular la lógica

class BookController extends Controller
{
    protected $bookService;

    // Constructor para inyectar el service
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService; // Inyección del service <button class="citation-flag" data-index="3">
    }

    // Obtener todos los libros
    public function index()
    {
        $books = $this->bookService->getAll(); // Obtener todos los libros
        return BookResource::collection($books); // Transformar a JSON
    }

    // Obtener un libro por ID
    public function show($id)
    {
        $book = $this->bookService->find($id); // Buscar el libro por ID
        return new BookResource($book);      // Transformar a JSON
    }

    // Crear un nuevo libro
    public function store(BookRequest $request)
    {
        $book = $this->bookService->create($request->validated()); // Crear el libro
        return new BookResource($book);                          // Transformar a JSON
    }

    // Actualizar un libro existente
    public function update(BookRequest $request, $id)
    {
        $book = $this->bookService->update($id, $request->validated()); // Actualizar el libro
        return new BookResource($book);                               // Transformar a JSON
    }

    // Eliminar un libro
    public function destroy($id)
    {
        $this->bookService->delete($id);                             // Eliminar el libro
        return response()->json(['message' => 'Book deleted successfully'], 200); // Respuesta exitosa
    }
}