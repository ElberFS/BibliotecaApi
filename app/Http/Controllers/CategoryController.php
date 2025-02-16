<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;       // Request para validar datos
use App\Http\Resources\CategoryResource;     // Resource para transformar datos
use App\Services\CategoryService;            // Service para encapsular la lógica

class CategoryController extends Controller
{
    protected $categoryService;

    // Constructor para inyectar el service
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService; // Inyección del service <button class="citation-flag" data-index="3">
    }

    // Obtener todas las categorías
    public function index()
    {
        $categories = $this->categoryService->getAll(); // Obtener todas las categorías
        return CategoryResource::collection($categories); // Transformar a JSON
    }

    // Obtener una categoría por ID
    public function show($id)
    {
        $category = $this->categoryService->find($id); // Buscar la categoría por ID
        return new CategoryResource($category);       // Transformar a JSON
    }

    // Crear una nueva categoría
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->create($request->validated()); // Crear la categoría
        return new CategoryResource($category);                           // Transformar a JSON
    }

    // Actualizar una categoría existente
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryService->update($id, $request->validated()); // Actualizar la categoría
        return new CategoryResource($category);                                // Transformar a JSON
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        $this->categoryService->delete($id);                                  // Eliminar la categoría
        return response()->json(['message' => 'Category deleted successfully'], 200); // Respuesta exitosa
    }
}