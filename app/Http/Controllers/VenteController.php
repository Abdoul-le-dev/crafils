<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;
use App\Models\Facture;
use App\Models\vente;
use App\Models\categorie;


use Illuminate\Support\Facades\Auth;



class VenteController extends Controller
{
    public function PageVenteView()
    {
        $resultat = [];
        $produit = produit::all();
        





         //return   response()->json(["Produit" => $produit]);
         return view('vente.pageVente',compact('resultat'));

    }

    public function Search(Request $request)// envoie de donne sous format Json
    {
        //$produit = produit::all()->get();
        //$reference = $request->reference;

        // $resultat = produit::where('reference',$reference)->get();



        return view("vente.pageVente");
    }
    public function finalisationVente(Request $request)
    {   
        $data ='Erreur de produit veuillez reprendre';
        //$typeClient = $request->typeClient;
        $nameCLients = strval($request->nameCLients);
        $idCLients = $request->idCLients;
        $typeFacture = $request->facture;
        $reglement = strval($request->reglement);
        $panier =  $request->panier;

       
       

        //generation de la facture 

        // recuperetion de la derniere facture 

        $derniere_facture = Facture::latest()-> first(); 

       // recuperation du n° de facture

        $n_facture = $derniere_facture ? (int)$derniere_facture-> num_factures + 2:2; 

       // formatage

      // $num_facture = str_pad((string)$n_facture, 8, '0', STR_PAD_LEFT);
    
        
        // Appel de la table facture et enregistrement de la facture

        if($num_facture =! null  )
        {   
            
            $total = 10;
        /* 
           Facture::create([
                'num_factures'  => $num_facture,
                'user_id'       => $user_id,
                'client_id'     => $idCLients,
                'client_anonyme'=> $nameCLients,
                'type_reglement'=> $reglement,
                'type_facture'  => $typeFacture,
                'total'         => $total,

            ]);

           /* foreach($panier as $item)
            {
             $reference = $item['reference'];

             $verif_produit = produit::where('reference',$reference)->get();

             if($verif_produit -> isEmpty() )
             { 
                return $data;
             }

             $prix_unitaire = produit::where('reference',$reference)->get();

             $tota = $prix_unitaire->prix *  $item['quantite']; 
              vente::create([

                'num_facture'  => $num_facture,
                'reference_produit'  => $item['reference'],
                'prix_unitaire' => $prix_unitaire->prix,
                'quantite'  =>  $item['quantite'],
                'total' => $tota,


              ]);  

            }*/
        }
        



        return  $num_facture ;


    }
    public function finalisationVentes(Request $request)
    {
        $panier = $request->panier;
        $typeClient = $request->typeClient;
        $nameCLients  = $request->nameCLients; 
        $nameCLient  = $request->nameCLients;
        $idCLients  = $request->idCLients;
        $facture  = $request->facture;
        $reglement  = $request->reglement;
        $data ='Erreur de produit veuillez reprendre';

        // generation du numero de facture

         $derniere_factures = Facture::latest()->first();

         $numero_factures = $derniere_factures->num_factures ? $derniere_factures->num_factures + 1 :1;

         $numero_factures = str_pad($numero_factures, 8,"0",STR_PAD_LEFT);

        // Enregistrement de la factures
        
       if($derniere_factures =! null)
        {   
            $users_id = Auth::id();
            
            $total = 10;
            if($nameCLient =!null)
            {
            Facture::create([

                'num_factures' => $numero_factures,
                'user_id'      => $users_id,
                'client_anonyme' =>(string) $nameCLients,
                'type_reglement' =>(string )$reglement,
                'type_facture'   =>(string)$facture,
                'total'          =>(int) $total,
                
            ]);
            }
            else
            {
                Facture::create([

                    'num_factures' => $numero_factures,
                    'user_id'      => $users_id,
                    'client_id'    => $idCLients, 
                    'client_anonyme' =>(string) $nameCLients,
                    'type_reglement' =>(string )$reglement,
                    'type_facture'   =>(string)$facture,
                    'total'          =>(int) $total,
                    
                ]); 
            }
            
        }

         // Enregistrement produit 
        /* $panier = [
            [
                "nom" => "RT450",
                "reference" => "123456",
                "prix" => 120000,
                "quantite" => 1,
                "quantiteStock" => "4",
                "total" => "120000"
            ]
        ];*/

        foreach($panier as $item)
       {
        $reference = $item['reference'];

        $verif_produit = produit::where('reference',$reference)->get();

        if($verif_produit -> isEmpty() )
        { 
                return $data;
        }

        $prix_unitaire = produit::where('reference',$reference)->first();
        
        $prix =$prix_unitaire->prix;
        $quantite =  $item['quantite'];

        $tota = (int)$prix_unitaire->prix *  (int)$item['quantite']; 

        vente::create([

            'num_facture'  => $numero_factures ,
            'reference_produit'  => $reference,
            'prix_unitaire' => $prix,
            'quantite'  => $quantite,
            'total' => $tota,


          ]);  


       }

        return    $numero_factures ;

       }

    public function View_facture()
    {
        return view('Facture.facture');
    }   


      

       



}


