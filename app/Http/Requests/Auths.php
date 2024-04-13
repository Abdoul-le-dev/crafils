<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Auths extends FormRequest
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
            "email" => "required|email|min:8",
            "password"     => "required|min:8",
        ];
    }
    public function messages()
    { 
        return [

        "email.required" => "Votre identifiants est requis",
        "email.email" => "Format incorrect de votre identifiants",
        
        "password.required" => "Votre password est requis",
        "password.min" => "Votre password doit contenir au moins 8 caractères",



       ];
    }

}
