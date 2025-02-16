<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;       // Request para validar datos
use App\Http\Resources\MovieResource;     // Resource para transformar datos
use App\Services\MovieService;            // Service para encapsular la lógica

class MovieController extends Controller
{
    protected $movieService;

    // Constructor para inyectar el service
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService; // Inyección del service <button class="citation-flag" data-index="3">
    }

    // Obtener todas las películas
    public function index()
    {
        $movies = $this->movieService->getAll(); // Obtener todas las películas
        return MovieResource::collection($movies); // Transformar a JSON
    }

    // Obtener una película por ID
    public function show($id)
    {
        $movie = $this->movieService->find($id); // Buscar la película por ID
        return new MovieResource($movie);      // Transformar a JSON
    }

    // Crear una nueva película
    public function store(MovieRequest $request)
    {
        $movie = $this->movieService->create($request->validated()); // Crear la película
        return new MovieResource($movie);                           // Transformar a JSON
    }

    // Actualizar una película existente
    public function update(MovieRequest $request, $id)
    {
        $movie = $this->movieService->update($id, $request->validated()); // Actualizar la película
        return new MovieResource($movie);                                // Transformar a JSON
    }

    // Eliminar una película
    public function destroy($id)
    {
        $this->movieService->delete($id);                                // Eliminar la película
        return response()->json(['message' => 'Movie deleted successfully'], 200); // Respuesta exitosa
    }
}