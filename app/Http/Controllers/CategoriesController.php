<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Ajout_categorie;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function AjouterCategorie(Ajout_categorie $request)
    {

        $user_id = Auth::id();
        categorie::create([
            'user_id' => $user_id,

            'categorie' => $request->categorie,
           
        ]);

        $returnMessage = 'La categorie '. $request->categorie .' à été creer avec succes';

        $request->session()->flash('success', $returnMessage);

        return  redirect()->route('Stock');

    }
}
