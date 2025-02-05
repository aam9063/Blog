<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|min:5',
            'contenido' => 'required|string|min:50'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio',
            'titulo.min' => 'El título debe tener al menos 5 caracteres',
            'contenido.required' => 'El contenido es obligatorio',
            'contenido.min' => 'El contenido debe tener al menos 50 caracteres'
        ];
    }
}
