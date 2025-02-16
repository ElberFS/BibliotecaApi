<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'loan_code' => 'required|string|unique:loans',           // El código del préstamo es obligatorio y debe ser único
            'user_name' => 'required|string',                        // El nombre del usuario es obligatorio
            'book_id' => 'nullable|exists:books,id',                 // El libro debe existir en la tabla books (opcional)
            'movie_id' => 'nullable|exists:movies,id',               // La película debe existir en la tabla movies (opcional)
            'delivery_date' => 'required|date',                      // La fecha de entrega es obligatoria
            'return_date' => 'required|date|after:delivery_date',    // La fecha de devolución debe ser posterior a la fecha de entrega
        ];
    }
    // Mensajes personalizados para las validaciones
    public function messages(): array
    {
        return [
            'loan_code.required' => 'The loan code is required.',      // Mensaje si el código del préstamo no se proporciona
            'loan_code.unique' => 'The loan code is already in use.',  // Mensaje si el código del préstamo ya existe
            'user_name.required' => 'The user name is required.',      // Mensaje si el nombre del usuario no se proporciona
            'book_id.exists' => 'The selected book is invalid.',       // Mensaje si el libro no existe
            'movie_id.exists' => 'The selected movie is invalid.',     // Mensaje si la película no existe
            'delivery_date.required' => 'The delivery date is required.', // Mensaje si la fecha de entrega no se proporciona
            'return_date.required' => 'The return date is required.',  // Mensaje si la fecha de devolución no se proporciona
            'return_date.after' => 'The return date must be after the delivery date.', // Mensaje si la fecha de devolución no es válida
        ];
    }
}
