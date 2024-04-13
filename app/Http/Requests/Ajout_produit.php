<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ajout_produit extends FormRequest
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
            'categorie' =>'required',
            'marque'    =>'required|min:3',
            'reference' =>'required|min:3|unique:produits,reference',
            'prix'      =>'required|numeric',
            'quantite'  =>'required|numeric|gt:0'
        ];
    }
    public function messages()
    {
        return[
            'categorie.required' =>'La  catégorie du produit est requise',

            'marque.required' =>'La  marque du produit est requise',
            'marque.min' =>'La  marque du produit doit contenir au moins trois chiffres',

            'reference.required' =>'Le numero de reférence du produit est requis',
            'reference.min' =>'La  reference du produit doit contenir au moins trois caratères',
            'reference.unique' =>'La  reference de ce produits existe deja ',


            'prix.required' =>'Le prix du produit est requis',
            'prix.numeric'  => 'Le prix du produit ne doit être constituer que de chiffre',

            'quantite.required' =>'La  quantite du produit est requise',
            'quantite.get' =>'la quantité doit être superieur a zéro'
        ];
    }
}
