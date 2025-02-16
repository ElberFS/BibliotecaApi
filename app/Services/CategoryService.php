<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Validator;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    // Obtener todas las categorías
    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    // Obtener una categoría por ID
    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }

    // Crear una nueva categoría
    public function create(array $data)
    {
        // Validación (opcionalmente puedes mover esto a un Request)
        $validator = Validator::make($data, [
            'name' => 'required|string|unique:categories',
            'genre' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->categoryRepository->create($data);
    }

    // Actualizar una categoría existente
    public function update($id, array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'sometimes|required|string|unique:categories,name,' . $id,
            'genre' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->categoryRepository->update($id, $data);
    }

    // Eliminar una categoría
    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }
}