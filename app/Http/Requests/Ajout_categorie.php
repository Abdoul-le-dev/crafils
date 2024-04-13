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
            'description'    =>'min:3',
        ];
    }
    public function messages()
    {
        return[
            'categorie.required'=> "La categorie est requise",
            "description.required" =>"Si il y'a une description elle doit contenir au moins trois caractère",
            "categorie.unique" =>"Cette categorie existe déja",
        
        ];
    }
}
