<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;        // Request para validar datos
use App\Http\Resources\LoanResource;      // Resource para transformar datos
use App\Services\LoanService;             // Service para encapsular la lógica

class LoanController extends Controller
{
    protected $loanService;

    // Constructor para inyectar el service
    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService; // Inyección del service <button class="citation-flag" data-index="3">
    }

    // Obtener todos los préstamos
    public function index()
    {
        $loans = $this->loanService->getAll(); // Obtener todos los préstamos
        return LoanResource::collection($loans); // Transformar a JSON
    }

    // Obtener un préstamo por ID
    public function show($id)
    {
        $loan = $this->loanService->find($id); // Buscar el préstamo por ID
        return new LoanResource($loan);      // Transformar a JSON
    }

    // Crear un nuevo préstamo
    public function store(LoanRequest $request)
    {
        $loan = $this->loanService->create($request->validated()); // Crear el préstamo
        return new LoanResource($loan);                          // Transformar a JSON
    }

    // Actualizar un préstamo existente
    public function update(LoanRequest $request, $id)
    {
        $loan = $this->loanService->update($id, $request->validated()); // Actualizar el préstamo
        return new LoanResource($loan);                               // Transformar a JSON
    }

    // Eliminar un préstamo
    public function destroy($id)
    {
        $this->loanService->delete($id);                              // Eliminar el préstamo
        return response()->json(['message' => 'Loan deleted successfully'], 200); // Respuesta exitosa
    }
}