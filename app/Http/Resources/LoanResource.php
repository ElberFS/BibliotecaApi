<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,                             // ID del préstamo
            'loan_code' => $this->loan_code,               // Código único del préstamo
            'user_name' => $this->user_name,               // Nombre del usuario que realiza el préstamo
            'book_id' => $this->book_id,                   // ID del libro asociado (opcional)
            'movie_id' => $this->movie_id,                 // ID de la película asociada (opcional)
            'delivery_date' => $this->delivery_date,       // Fecha de entrega
            'return_date' => $this->return_date,           // Fecha de devolución
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Fecha de creación formateada
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Fecha de actualización formateada
        ];
    }
}
