<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,                             // ID de la categoría
            'name' => $this->name,                         // Nombre de la categoría
            'genre' => $this->genre,                       // Género de la categoría
            'created_at' => $this->created_at->format('Y-m-d H:i:s'), // Fecha de creación formateada
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'), // Fecha de actualización formateada
        ];
    }
}
