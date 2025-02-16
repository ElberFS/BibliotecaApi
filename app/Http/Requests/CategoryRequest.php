<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories', // El nombre es obligatorio y debe ser único
            'genre' => 'required|string',                  // El género es obligatorio
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name is required.',    // Mensaje si el nombre no se proporciona <button class="citation-flag" data-index="7">
            'name.unique' => 'The name is already in use.', // Mensaje si el nombre ya existe
            'genre.required' => 'The genre is required.',  // Mensaje si el género no se proporciona
        ];
    }
}
