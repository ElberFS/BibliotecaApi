<?php

namespace App\Services;

use App\Repositories\LoanRepository;
use Illuminate\Support\Facades\Validator;

class LoanService
{
    protected $loanRepository;

    public function __construct(LoanRepository $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    // Obtener todos los préstamos
    public function getAll()
    {
        return $this->loanRepository->getAll();
    }

    // Obtener un préstamo por ID
    public function find($id)
    {
        return $this->loanRepository->find($id);
    }

    // Crear un nuevo préstamo
    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'loan_code' => 'required|string|unique:loans',
            'user_name' => 'required|string',
            'book_id' => 'nullable|exists:books,id',
            'movie_id' => 'nullable|exists:movies,id',
            'delivery_date' => 'required|date',
            'return_date' => 'required|date|after:delivery_date',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->loanRepository->create($data);
    }

    // Actualizar un préstamo existente
    public function update($id, array $data)
    {
        $validator = Validator::make($data, [
            'loan_code' => 'sometimes|required|string|unique:loans,loan_code,' . $id,
            'user_name' => 'sometimes|required|string',
            'book_id' => 'sometimes|nullable|exists:books,id',
            'movie_id' => 'sometimes|nullable|exists:movies,id',
            'delivery_date' => 'sometimes|required|date',
            'return_date' => 'sometimes|required|date|after:delivery_date',
        ]);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return $this->loanRepository->update($id, $data);
    }

    // Eliminar un préstamo
    public function delete($id)
    {
        return $this->loanRepository->delete($id);
    }
}