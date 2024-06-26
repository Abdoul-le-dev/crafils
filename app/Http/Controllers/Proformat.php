<?php

namespace App\Http\Controllers;

use App\Models\CompteFacture;
use Illuminate\Support\Facades\Auth;

use App\Models\Creancier;
use App\Models\CreancierTraçability;
use Illuminate\Http\Request;
use App\models\ListingVente;
use App\Models\Sale;
use Illuminate\Support\Carbon;

class Proformat extends Controller
{   
    public function mail()
    {
        return view('welcome');
    }
    public function view_proformat()
    {   $derniere_facture = CompteFacture::where('type_facture','1')->where('normaliser', 0)->limit(3)->get();
        return view('impression.factureProForma',compact('derniere_facture'));
    }

    public function search(Request $request)
    {
        $data_facture =$request->num_facture;
        $type =$request->type;

        if($type == 1)
        {
            $num_facture = CompteFacture::where('num_factures',$data_facture)
                                ->where('type_facture',1)->get();
        }

        if($type == 2)
        {
            $num_facture = CompteFacture::where('num_factures',$data_facture)
                                ->where('type_facture',2)->get();
        }
        if($type == 3)
        {
            $num_facture = CompteFacture::where('num_factures',$data_facture)
                                ->where('type_facture',3)->get();
        }
       
        
        $num_factures= $num_facture;
        
       // dd($num_facture);
        
        if($num_factures ->isEmpty())
        {   
            $data = 'nothing';
            
            
        }else
        {
            $data = $num_facture;
        }
        
        return $data ;

    }
    public function details(Request $request)
    {   $num_facture = $request->query('numero_facture');
        $donne_facture = CompteFacture::where('num_factures',$num_facture)->get();
        $produits = Sale::where('num_facture',$num_facture)->get();
        return view('impression.modeldetail',compact('donne_facture','produits'));
    }
    public function modifier_facture( Request $request)
    {
        $num_facture = $request->query('numero_facture');
        return view('impression.model_modifier_facture');
    }
    public function visualiser(Request $request)
    {   
       
        $num_facture = $request->query('numero_facture');
        $donne_facture = CompteFacture::where('num_factures',$num_facture)->first();
        
        $produits = Sale::where('num_facture',$num_facture)->get();

        $tht = 0;
        foreach($produits as $produit)
        {
            $tht = (int)$produit->total + $tht ;

        }
        $tva =  ($tht * 18)/100;
        $ttc = $tht + $tva;
        $date = Carbon::now();
        $nombre_facture = $produits->count();
        $nombre = 2;
        $premiere =[];
        $deuxieme_session =[];
        $troisieme_session =[];
        $quatrieme_session = [];
        $cinquieme_session =[];

        if($nombre_facture <= 6)
        {
            $premiere = $produits;
            $nombre =2;
            if($nombre_facture <= 3)
            {
                $nombre=1;
            }
        
        }
        else if($nombre_facture > 6 && $nombre_facture <= 9)
        {
            $premiere = $produits;
            $nombre=3;
        }

        else if($nombre_facture > 9 && $nombre_facture <= 12)
        {
            $premiere = $produits->take(9);
            $deuxieme_session = $produits->slice(9);
            $nombre=4;
        }
        else if($nombre_facture > 12 && $nombre_facture <= 15)
        {
            $premiere = $produits->take(12);
            $deuxieme_session = $produits->slice(12);
            $nombre=5;
        }
        else if($nombre_facture > 15 && $nombre_facture <= 28)
        {
            $premiere = $produits->take(12);
            $deuxieme_session = $produits->slice(12);
            $nombre=6;
        }

        if($donne_facture != null)
        {   
            
        return view('impression.model_visualiser', compact('donne_facture', 'premiere','deuxieme_session','nombre','ttc', 'tht', 'tva', 'date'));
            
        }
    
      return view('User.dashboard.dashboardUser');

        
       
    }
    public function visualisers(Request $request)
{   
    
    $num_facture = $request->query('numero_facture');
    $donne_facture = CompteFacture::where('num_factures',$num_facture)->first();
    
    $produits = Sale::where('num_facture',$num_facture)->get();

    $tht = 0;
    foreach($produits as $produit)
    {
        $tht = (int)$produit->total + $tht ;

    }
    $tva =  ($tht * 18)/100;
    $ttc = $tht + $tva;
    $date = Carbon::now();
    $nombre_facture = $produits->count();
    $nombre = 2;
    $premiere =[];
    $deuxieme_session =[];
    $troisieme_session =[];
    $quatrieme_session = [];
    $cinquieme_session =[];

    if($nombre_facture <= 6)
    {
        $premiere = $produits;
        $nombre =2;
        if($nombre_facture <= 3)
        {
            $nombre=1;
        }
    
    }
    else if($nombre_facture > 6 && $nombre_facture <= 9)
    {
        $premiere = $produits;
        $nombre=3;
    }

    else if($nombre_facture > 9 && $nombre_facture <= 12)
    {
        $premiere = $produits->take(9);
        $deuxieme_session = $produits->slice(9);
        $nombre=4;
    }
    else if($nombre_facture > 12 && $nombre_facture <= 15)
    {
        $premiere = $produits->take(12);
        $deuxieme_session = $produits->slice(12);
        $nombre=5;
    }
    else if($nombre_facture > 15 && $nombre_facture <= 28)
    {
        $premiere = $produits->take(12);
        $deuxieme_session = $produits->slice(12);
        $nombre=6;
    }

    if($donne_facture != null)
    {   
        
    return view('impression.model_visualiser', compact('donne_facture', 'premiere','deuxieme_session','nombre','ttc', 'tht', 'tva', 'date'));
        
    }

  return view('User.dashboard.dashboardUser');

    
   
}

    public function normaliser(Request $request)
    {
        $derniere_facture = CompteFacture::where('type_facture','3')
                                ->where('normaliser', 1) 
                                ->limit(3)->get();
        return view('impression.model_normailser',compact('derniere_facture'));
    }

    public function facture_simple()
    {

        $derniere_facture = CompteFacture::where('type_facture','2')->where('normaliser', 0) ->limit(3)->get();
        return view('impression.visualise_facture',compact('derniere_facture'));

    }
    public function normalisation(Request $request)
    {

       
        $users_id = Auth::id();
        $typeClient = $request->typeClient;
        $nameCLients  = $request->nameCLients; 
        $montant  = $request->montant;
        $idCLients  = $request->idCLients;
        $num_facture  = $request->num_facture;
        $reglement  = $request->reglement;


        if($num_facture != null)
        {
           $facture = CompteFacture::where('num_factures',$num_facture)->first();

           $facture->normaliser = true ;
           //dd($reglement);
           if($reglement ==='credit' || $reglement ==='cash' || $reglement==='tranche')
           {
             $facture->type_reglement =  $reglement;
           }else
           {
               return 'error1';
           }


           if($reglement ==='cash')
           {
            $facture->total_payer =  $facture->montant_facture;
           }
           else if($reglement==='tranche' && $montant != null && (int)$montant > 0 &&  $facture->montant_facture > (int)$montant )
           {
            $montant_facture =$facture->montant_facture;
             $facture->total_payer = $montant;
             $du = $montant_facture - $montant;
             
                    CreancierTraçability::create([
                        'user_id'      => $users_id,
                        'client_id'    => $idCLients,
                        'numero_facture' => $num_facture,
                        'montant_du'   => $du,
                    ]);
            
                    $montant_du = CreancierTraçability::where('client_id', $idCLients)->get();
            
                    $montant_get = 0;
            
                    if ($montant_du) {
                        foreach ($montant_du as $montant) {
                            $montant_get += $montant->montant_du;
                        }
                    }
                    
            
                    Creancier::create([
                        'user_id'  => $users_id,
                        'client_id'=> $idCLients,
                        'montant'  => $montant_get, // corriger cette ligne, $montant_facture n'a pas de sens ici
                    ]);
            
           }
           else if($reglement ==='credit')
           {
            $facture->total_payer ='0';
            $montant_facture =$facture->montant_facture;
             
             $du = $montant_facture ;
             
                    CreancierTraçability::create([
                        'user_id'      => $users_id,
                        'client_id'    => $idCLients,
                        'numero_facture' => $num_facture,
                        'montant_du'   => $du,
                    ]);
            
                    $montant_du = CreancierTraçability::where('client_id', $idCLients)->get();
            
                    $montant_get = 0;
            
                    if ($montant_du) {
                        foreach ($montant_du as $montant) {
                            $montant_get += $montant->montant_du;
                        }
                    }
                    
            
                    Creancier::create([
                        'user_id'  => $users_id,
                        'client_id'=> $idCLients,
                        'montant'  => $montant_get, // corriger cette ligne, $montant_facture n'a pas de sens ici
                    ]);
            
           }
           else
           {
               return 'error2';
           }

           $facture->save();

           return $num_facture;


          

           

        }else
        {
            return 'error3';
        }

       


    }
}
