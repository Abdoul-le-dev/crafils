<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\Creancier;
use App\Models\CreancierTraçability;
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
        $request->validate([
            'client' => 'required|integer',
            'montant' => 'required|numeric',
        ]);
        $user_id = Auth::id();
        $idCLients= $request->client;

        $montant_du = CreancierTraçability::where('client_id', $idCLients)->sum('montant_du');
            
                    $montant_get = 0;
            
                   /* if ($montant_du) {
                        foreach ($montant_du as $montant) {
                            $montant_get += $montant->montant_du;
                        }
                    }*/

        $creancier =  Creancier::where('client_id',$request->client)->first();
        if($creancier)
        {   
            $montant_du = $montant_du + $request->montant;
            $creancier->montant = $montant_du;
            $creancier->save();
        }
        else
        {
            Creancier::create([

                'user_id' => $user_id,
                'client_id' => $request->client,
                'montant' => $request->montant,
    
    
            ]);

        }


        $return = 'Créancier ajouter avec succes';


        $request->session()->flash('success', $return );

        return redirect()->route('Dashboard');
    }
    public function Reglements_creancier(Request $request)
    {
        $user_id = Auth::id();

        $client_id = $request->client;

        $creancier = Creancier::where('client_id',$client_id)->get();

        if($creancier!=null)


        {
           if( $creancier->montant >= $request->montant )
           {

           }
        }


    }
    public function details_creancier(Request $request)
    {
        $idCLients = $request->id;

        $clients = Creancier::where('id',$idCLients)->get();

        if($clients)
        {   
            $client = client::where('id',$idCLients)->first();
            $client_tracability = CreancierTraçability::where('client_id',$idCLients)->get();

            return view('creancier.detailmodelcreancier',compact('client','client_tracability'));
        }
        else
        {
            return redirect()->back()->withErrors(['errors' => 'Clients non trouver']);
        }



    }
}
