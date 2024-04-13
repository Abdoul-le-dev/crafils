<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\categorie;
use App\Http\Requests\Ajout_client;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class clients extends Controller
{
   //Ajouterclients
   public function P_Ajout_client()
    {
        return view('Client.Ajouterclient');
    }


    public function Ajout_client(client $table, Ajout_client $request)
    {
        $user_id = Auth::id();

        client::create([
            'user_id' => $user_id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'n_societe' => $request->n_societe,
            'address' => $request->address,
        ]);


        $return = 'Le client '. $request->nom .' a été ajouter avec succes';


        $request->session()->flash('success', $return );

        return redirect()->route('Dashboard');
    }
}
