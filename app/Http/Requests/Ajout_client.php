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
            'nom'    => 'required|min:3',
            'prenom' => 'required|min:3',
            'email'  => 'email',
            'telephone' => 'required|min:8',
            'n_societe' => 'required',
            'address' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le  nom du client est requis',
            'nom.min' => 'Le nom du client doit comporter au moins trois caractères.',

            'prenom.required' => 'Le prenom du client est requis',
            'prenom.min' => 'Le prenom du client doit comporter au moins trois caractères.',



            'telephone.required' => 'Le numero de telephone du client est requis',
            'telephone.min' => 'Le numero de telephone du client doit contenir au moins huit chiffres',

            'n_societe.min' => 'Le nom de la société du client est requis',

            'address.min' => 'Address est requis',

        ];
    }

}
