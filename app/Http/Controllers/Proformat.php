<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Facture;
use App\models\vente;
use Illuminate\Support\Carbon;

class Proformat extends Controller
{
    public function view_proformat()
    {   $derniere_facture = Facture::latest()->limit(3)->get();
        return view('impression.factureProForma',compact('derniere_facture'));
    }

    public function search(Request $request)
    {
        $data_facture =$request->num_facture;
        $num_facture = Facture::where('num_factures',$data_facture)->get();
        
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
        $donne_facture = Facture::where('num_factures',$num_facture)->get();
        $produits = vente::where('num_facture',$num_facture)->get();
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
        $donne_facture = Facture::where('num_factures',$num_facture)->first();
        
        $produits = vente::where('num_facture',$num_facture)->get();

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
    $donne_facture = Facture::where('num_factures',$num_facture)->first();
    
    $produits = vente::where('num_facture',$num_facture)->get();

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

    if($nombre_facture < 6)
    {

        if($nombre_facture < 3)
        {
            $nombre_view =1;
        }
        $premiere = $produits->get();
        $nombre_view =2;
    }
    else if($nombre_facture > 6 && $nombre_facture < 9)
    {
        $premiere = $produits->get();
        $nombre_view =3;
    }
    

    if($donne_facture != null)
    {   
        
       return view('impression.model_visualiser', compact('donne_facture', 'premiere','nombre','ttc', 'tht', 'tva', 'date'));
        
    }
    
    return view('User.dashboard.dashboardUser');
}

    public function normaliser(Request $request)
    {
        $num_facture = $request->query('numero_facture');
        return view('impression.model_normailser');
    }

    public function normalisation(Request $request)
    {

        $panier = $request->panier;
        
        $typeClient = $request->typeClient;
        $nameCLients  = $request->nameCLients; 
        $montant  = $request->montant;
        $idCLients  = $request->idCLients;
        $num_facture  = $request->num_facture;
        $reglement  = $request->reglement;

    }
}
