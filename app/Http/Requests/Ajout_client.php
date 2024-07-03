<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ajout_client extends FormRequest
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
            'email'  => 'email|required',
            'telephone' => 'required|min:8',
            'address' =>'required'
        ];
    }

    public function messages()
    {
        return [
           



            'telephone.required' => 'Le numero de telephone du client est requis',
            'telephone.min' => 'Le numero de telephone du client doit contenir au moins huit chiffres',

            'email.required' => 'L\'email du client est requis',

           

            'address.min' => 'Address est requis',

        ];
    }

}
