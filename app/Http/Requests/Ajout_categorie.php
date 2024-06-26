<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ajout_categorie extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'categorie' =>'required|unique:categories,categorie',
            
        ];
    }
    public function messages()
    {
        return[
            'categorie.required'=> "La categorie est requise",
             "categorie.unique" =>"Cette categorie existe déja",
        
        ];
    }
}
