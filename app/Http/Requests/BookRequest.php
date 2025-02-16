<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',                     // El título es obligatorio
            'author' => 'required|string',                    // El autor es obligatorio
            'category_id' => 'required|exists:categories,id', // La categoría debe existir en la tabla categories
            'status' => 'required|in:available,borrowed',     // El estado debe ser "available" o "borrowed"
        ];
    }

    // Mensajes personalizados para las validaciones
    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',               // Mensaje si el título no se proporciona
            'author.required' => 'The author is required.',             // Mensaje si el autor no se proporciona
            'category_id.required' => 'The category ID is required.',   // Mensaje si la categoría no se proporciona
            'category_id.exists' => 'The selected category is invalid.', // Mensaje si la categoría no existe
            'status.required' => 'The status is required.',             // Mensaje si el estado no se proporciona
            'status.in' => 'The status must be either available or borrowed.', // Mensaje si el estado no es válido
        ];
    }
}
