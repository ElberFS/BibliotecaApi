<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,                             // ID del libro
            'title' => $this->title,                       // Título del libro
            'author' => $this->author,                     // Autor del libro
            'category_id' => $this->category_id,           // ID de la categoría asociada
            'status' => $this->status,                     // Estado del libro ("available" o "borrowed")
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Fecha de creación formateada
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Fecha de actualización formateada
        ];
    }
}
