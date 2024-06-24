<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\Creancier;
use Illuminate\Support\Facades\Auth;



class CreancierController extends Controller
{
    public function CreancierView()
    {
        return view("creancier.creancier");
    }
    public function ListeView()
    {   
        $Creanciers = Creancier::where('montant', '>', 0)->get();
        $data =[];
        foreach($Creanciers as $creancier)
        {
            


        }

        return view("creancier.liste",compact('Creanciers'));
    }
    public function AjouterView()
    {
        $clients = client::all();
        return view("creancier.ajouter",compact('clients'));
    }
    public function ReglementsView()
    {
        $clients = client::all();
        return view("creancier.reglements",compact('clients'));
    }
    public function Ajout_creancier(Request $request)
    {
        $user_id = Auth::id();

        Creancier::create([

            'user_id' => $user_id,
            'id_client' => $request->client,
            'montant' => $request->montant,


        ]);

        $return = 'Créancier ajouter avec succes';


        $request->session()->flash('success', $return );

        return redirect()->route('Dashboard');
    }
    public function Reglements_creancier(Request $request)
    {
        $user_id = Auth::id();

        $id_client = $request->client;

        $creancier = Creancier::where('id_client',$id_client)->get();

        if($creancier!=null)


        {
           if( $creancier->montant >= $request->montant )
           {

           }
        }


    }
}
