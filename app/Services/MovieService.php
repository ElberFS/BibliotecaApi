<?php

namespace App\Services;

use App\Repositories\MovieRepository;
use Illuminate\Support\Facades\Validator;

class MovieService
{
    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    // Obtener todas las películas
    public function getAll()
    {
        return $this->movieRepository->getAll();
    }

    // Obtener una película por ID
    public function find($id)
    {
        return $this->movieRepository->find($id);
    }

    // Crear una nueva película
    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|string',
            'director' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:available,borrowed',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->movieRepository->create($data);
    }

    // Actualizar una película existente
    public function update($id, array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'sometimes|required|string',
            'director' => 'sometimes|required|string',
            'category_id' => 'sometimes|required|exists:categories,id',
            'status' => 'sometimes|required|in:available,borrowed',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->movieRepository->update($id, $data);
    }

    // Eliminar una película
    public function delete($id)
    {
        return $this->movieRepository->delete($id);
    }
}