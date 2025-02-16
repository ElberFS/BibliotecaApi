<?php

namespace App\Repositories;

use App\Models\Loan;

class LoanRepository
{
    // Obtener todos los préstamos
    public function getAll()
    {
        return Loan::all(); // Retorna todos los préstamos
    }

    // Obtener un préstamo por ID
    public function find($id)
    {
        return Loan::findOrFail($id); // Busca el préstamo por ID o lanza una excepción si no existe
    }

    // Crear un nuevo préstamo
    public function create(array $data)
    {
        return Loan::create($data); // Crea un nuevo préstamo con los datos proporcionados
    }

    // Actualizar un préstamo existente
    public function update($id, array $data)
    {
        $loan = Loan::findOrFail($id); // Busca el préstamo por ID
        $loan->update($data);         // Actualiza los datos del préstamo
        return $loan;                 // Retorna el préstamo actualizado
    }

    // Eliminar un préstamo
    public function delete($id)
    {
        $loan = Loan::findOrFail($id); // Busca el préstamo por ID
        $loan->delete();              // Elimina el préstamo
    }
}