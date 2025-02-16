<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,                             // ID de la película
            'title' => $this->title,                       // Título de la película
            'director' => $this->director,                 // Director de la película
            'category_id' => $this->category_id,           // ID de la categoría asociada
            'status' => $this->status,                     // Estado de la película ("available" o "borrowed")
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Fecha de creación formateada
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Fecha de actualización formateada
        ];
    }
}
