<?php

namespace App\Http\Controllers;

use App\Mail\FactureMail;
use Illuminate\Http\Request;
use App\Models\produit;
use App\Models\CompteFacture;
use App\Models\ListingVente;
use App\Models\categorie;
use App\Models\client;
use App\Models\Creancier;
use App\Models\CreancierTraçability;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



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

        $derniere_facture = CompteFacture::latest()-> first(); 

       // recuperation du n° de facture

        $n_facture = $derniere_facture ? (int)$derniere_facture-> num_factures + 2:2; 

       // formatage

      // $num_facture = str_pad((string)$n_facture, 8, '0', STR_PAD_LEFT);
    
        
        // Appel de la table facture et enregistrement de la facture

        if($num_facture =! null  )
        {   
            
            $total = 10;
        /* 
           CompteFacture::create([
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
              ListingVente::create([

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


    public function sendMail($num_factures)
    {
        $tomail='abdouledev@gmail.com';
        $mailMessage ="La facture".$num_factures."  vient dêtre génerer par Madame Olivia veuillez cliquez sur le lien en dessous pour consulter la facture";
        $href ="http://www.crafils.com/visualiser?numero_facture=".$num_factures;
        $subject ="CRAFILS système d'alerte";
        $data =[
            'subject'=>$subject,
            'mailMessage'=> $mailMessage,
            'href'=>$href,

        ];
        Mail::to($tomail)->send(new FactureMail($data));

    }



    
    public function finalisationVentes(Request $request)
    {

        $panier = $request->panier;
        
        $typeClient = $request->typeClient;
        $nameCLients  = $request->nameCLients; 
        $montant  = $request->montant;
        $idCLients  = $request->idCLients;
        $facture  = $request->facture;
        $reglement  = $request->reglement;
        $data ='808';//erreur 808 cette action est impossible produit non existant ou stock insuffisant

        // generation du numero de facture

         

         $derniere_facture = CompteFacture::latest()-> first(); 

         // recuperation du n° de facture
  
         $numero_factures = $derniere_facture ? (int)$derniere_facture->num_factures + 1:1; 

        

         $numero_factures = str_pad($numero_factures, 8,"0",STR_PAD_LEFT);
         $montant_facture= 0;
         $normaliser = false;

         

        // Enregistrement de la factures
            if($facture ==='normaliser')
            {
                $normaliser=true;

            }
            //verfication data
            if(!$facture ==='proformat' || !$facture ==='simple' || !$facture ==='normaliser')
            {
                return '811';
            }
            else
            {
                if($facture ==='proformat')
                {
                    $facture = 1;
                }
                if($facture ==='simple')
                {
                    $facture = 2;
                }
                if($facture ==='normaliser')
                {
                    $facture = 3;
                }

            }
            if(!$reglement ==='credit' || !$reglement ==='tranche' || !$reglement ==='cash')
            {
                return '8012';
            }

          if($derniere_factures =! null)
          {   
            $users_id = Auth::id();
            $total = 0;
            

            foreach($panier as $item)
            {
             $reference = $item['reference'];
     
             $verif_produit = produit::where('reference',$reference)->first();

             $id_reference =$verif_produit->id;
     
             if(!$verif_produit )
             { 
                     return '810';
             }

             if( (int)$verif_produit->quantite < (int)$item['quantite'] )

             {
                return '8010';
             }
     
             $prix_unitaire = produit::where('reference',$reference)->first();
             
             //$prix =$prix_unitaire->prix;
             $quantite =  $item['quantite'];
     
             $tota = (float)$prix_unitaire->prix *  (int)$item['quantite']; 
             $montant_facture += $tota;
             // $tota = 0;
                $total += 1;
        
                    ListingVente::create([
        
                    'num_facture'  => $numero_factures ,
                    'produit_id'  => $id_reference,
                    //'prix_unitaire' => $prix,
                    'quantite'  => $quantite,
                    'total' => $tota,
        
        
                ]);

                //soustraction

                $total_produit = (int)$verif_produit->quantite - (int)$quantite;

                $tab =[
                    'quantite' => $total_produit
                ];
                $verif_produit->update($tab);
               
     
     
            }

            //Enregistrement facture
            //1-Proformat
            //2-facture simple sans TVA
            //3-normaliser avec tva
            
            
            if($nameCLient =!null && $idCLients ==null )
            {
                if($reglement ==='tranche')
                {
                    CompteFacture::create([

                        'num_factures' => $numero_factures,
                        'user_id'      => $users_id,
                        'client_anonyme' =>(string) $nameCLients,
                        'type_reglement' =>(string )$reglement,
                        'type_facture'   =>(string)$facture,
                        'total_payer'   =>(string) $montant,
                        'montant_facture' =>(string) $montant_facture,
                        'normaliser'       =>$normaliser,
                        'total'          =>(int) $total,
                        
                    ]);
                } else if($reglement ==='cash')
                {
                    CompteFacture::create([

                        'num_factures' => $numero_factures,
                        'user_id'      => $users_id,
                        'client_anonyme' =>(string) $nameCLients,
                        'type_reglement' =>(string )$reglement,
                        'type_facture'   =>(string)$facture,
                        'total_payer'   =>(string) $montant_facture,
                        'montant_facture' =>(string) $montant_facture,
                        'normaliser'       =>$normaliser,
                        'total'          =>(int) $total,
                        
                    ]);
                }
                else if($reglement ==='credit')
                {
                    CompteFacture::create([

                        'num_factures' => $numero_factures,
                        'user_id'      => $users_id,
                        'client_anonyme' =>(string) $nameCLients,
                        'type_reglement' =>(string )$reglement,
                        'type_facture'   =>(string)$facture,
                        'total_payer'   =>'0',
                        'montant_facture' =>(string) $montant_facture,
                        'normaliser'       =>$normaliser,
                        'total'          => $total,
                        
                    ]);




                }
                else if($facture ===1)
                {
                    CompteFacture::create([

                        'num_factures' => $numero_factures,
                        'user_id'      => $users_id,
                        'client_anonyme' =>(string) $nameCLients,
                        'type_reglement' =>(string )$reglement,
                        'type_facture'   =>(string)$facture,
                        'total_payer'   =>'0',
                        'montant_facture' =>(string) $montant_facture,
                        'normaliser'       =>$normaliser,
                        'total'          =>(int) $total,
                        
                    ]); 
                }
          
            }
            else if ($nameCLient == null && $idCLients != null) {
              
                if ($reglement === 'tranche') {
                    CompteFacture::create([
                        'num_factures' => $numero_factures,
                        'user_id'      => $users_id,
                        'client_id'    => $idCLients, 
                        // 'client_anonyme' => (string) $nameCLients,
                        'type_reglement' => (string)$reglement,
                        'type_facture'   => (string)$facture,
                        'total_payer'    => (string)$montant,
                        'montant_facture'=> (string)$montant_facture,
                        'normaliser'     => $normaliser,
                        'total'          => (int)$total,
                    ]);
            
                    $du = $montant_facture - $montant;
            
                    CreancierTraçability::create([
                        'user_id'      => $users_id,
                        'client_id'    => $idCLients,
                        'numero_facture' => $numero_factures,
                        'montant_du'   => $du,
                    ]);
            
                    $montant_du = CreancierTraçability::where('client_id', $idCLients)->get();
            
                    $montant_get = 0;
            
                    if ($montant_du) {
                        foreach ($montant_du as $montant) {
                            $montant_get += $montant->montant_du;
                        }
                    }

                    $creancier =  Creancier::where('client_id',$idCLients)->first();
                    if($creancier)
                    {
                        $creancier->montant = $montant_get;
                        $creancier->save();
                    }
                    else
                    {
                        Creancier::create([
                            'user_id'  => $users_id,
                            'client_id'=> $idCLients,
                            'montant'  => $montant_get,
                        ]);

                    }
            
                   
            
                } else if ($reglement === 'cash') {
                    CompteFacture::create([
                        'num_factures'    => $numero_factures,
                        'user_id'         => $users_id,
                        'client_id'       => $idCLients, 
                        'client_anonyme'  => (string)$nameCLients,
                        'type_reglement'  => (string)$reglement,
                        'type_facture'    => (string)$facture,
                        'total_payer'     => (string)$montant_facture,
                        'montant_facture' => (string)$montant_facture,
                        'normaliser'      => $normaliser,
                        'total'           => (int)$total,
                    ]);
            
                } else if ($reglement === 'credit') {
                    CompteFacture::create([
                        'num_factures'    => $numero_factures,
                        'user_id'         => $users_id,
                        'client_id'       => $idCLients, 
                        // 'client_anonyme'  => (string)$nameCLients,
                        'type_reglement'  => (string)$reglement,
                        'type_facture'    => (string)$facture,
                        'total_payer'     => '0',
                        'montant_facture' => (string)$montant_facture,
                        'normaliser'      => $normaliser,
                        'total'           => (int)$total,
                    ]);
            
                    CreancierTraçability::create([
                        'user_id'      => $users_id,
                        'client_id'    => $idCLients,
                        'numero_facture' => $numero_factures,
                        'montant_du'   => $montant_facture,
                    ]);
            
                    $montant_du = CreancierTraçability::where('client_id', $idCLients)->get();
            
                    $montant_get = 0;
            
                    if ($montant_du) {
                        foreach ($montant_du as $montant) {
                            $montant_get += $montant->montant_du;
                        }
                    }

                    $creancier =  Creancier::where('client_id',$idCLients)->first();
                    if($creancier)
                    {
                        $creancier->montant = $montant_get;
                        $creancier->save();
                    }
                    else
                    {
                        Creancier::create([
                            'user_id'  => $users_id,
                            'client_id'=> $idCLients,
                            'montant'  => $montant_get,
                        ]);

                    }
            
                    
                }else if($facture ===1)
                {
                    CompteFacture::create([

                        'num_factures' => $numero_factures,
                        'user_id'      => $users_id,
                        'client_anonyme' =>(string) $nameCLients,
                        'type_reglement' =>(string )$reglement,
                        'type_facture'   =>(string)$facture,
                        'total_payer'   =>'0',
                        'montant_facture' =>(string) $montant_facture,
                        'normaliser'       =>$normaliser,
                        'total'          =>(int) $total,
                        
                    ]); 
                }
            }
            
            else
            {
                return $data;
            }
            
          }

          $verification_facture = CompteFacture::where('num_factures',$numero_factures)-> first(); 

          if($verification_facture ==null)
          {
            //retirer les prodits vendu 

            ListingVente::where('num_facture',$numero_factures)->delete();
            foreach($panier as $item)
            {
             $reference = $item['reference'];
     
             $verif_produit = produit::where('reference',$reference)->first();

             $id_reference =$verif_produit->id;
     
            
             
             //$prix =$prix_unitaire->prix;
             $quantite =  $item['quantite'];
        
                   

                //adiction

                $total_produit = (int)$verif_produit->quantite + (int)$quantite;

                $tab =[
                    'quantite' => $total_produit
                ];
                $verif_produit->update($tab);
               
     
     
            }

            return '809';
          }
          else
          {
            $tomail='abdouledev@gmail.com';
            $mailMessage ="Une facture de type ".$facture ." de numero ".$numero_factures."  vient dêtre génerer par Madame Olivia veuillez cliquez sur le lien en dessous pour consulter la facture";
            $href ="http://127.0.0.1:8000/visualiser?numero_facture=".$numero_factures;
            $subject ="CRAFILS SYSTEME D'ALERTE FACTURE";
            $data =[
                'subject'=>$subject,
                'mailMessage'=> $mailMessage,
                'href'=>$href,
                

            ];
            Mail::to($tomail)->send(new FactureMail($data));
        

            return    $numero_factures ;
          }


        
        
       

        
        

    } 
   



    public function View_facture()
    {
        return view('Facture.facture');
    }   


      

       



}


