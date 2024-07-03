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
use App\Models\Proformat;
use App\Models\Sale;
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
        $typeClient = $request->typeClient;
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
              Sale::create([

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



    
    public function finalisationVentess(Request $request)
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
         $off =false;
         $motif = "";
         $data_creancier = false;

         

        // Status verification
            if($facture ==='normaliser')
            {
                $normaliser=true;

            }
                //verfication du type de facture sinon error
                    if($facture =='proformat' || $facture =='simple' || $facture =='normaliser')
                    {   
                        if($facture ==='proformat')
                        {
                            $facture = 1;
                            $reglement = 'proformat'; 
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
                    else
                    {
                        $motif ='201';
                        return $motif;
                    

                    }
                //verfication du type de reglement    
                    if($reglement =='credit' || $reglement =='tranche' || $reglement =='cash' ||  $reglement = 'proformat')
                    {
                        if($derniere_factures =! null)
                        {   
                            $users_id = Auth::id();
                            $total = 0;
                            
                            //verification du produit et de quantite
                                foreach($panier as $item)
                                {
                                        $reference = $item['reference'];
                                
                                        $verif_produit = produit::where('reference',$reference)->first();

                                        $id_reference =$verif_produit->id;
                                       
                                        if($verif_produit )
                                        { 
                                            
                                            if( (int)$verif_produit->quantite < (int)$item['quantite'] )

                                            {   
                                                $off =true;
                                                $motif ="202";
                                                return $motif;
                                                
                                            }

                                            
                                        }else
                                        {
                                            $off =true;
                                            $motif ="203";
                                            return $motif;

                                        }

                                

                                    
                                }

                            //verification du type de facture
                            
                            if($typeClient =="Client Anonyme" && $off == false )
                            {
                                if($reglement ==='cash')
                                {
                                
                                }
                                else if($facture ==1)
                                {
                                    
                                }else
                                {
                                    // maniplation de donnée
                                    $off= true;
                                    $motif="204";
                                    return $motif;

                                }
                        
                            }else if ($typeClient === 'Client Enregister' && $off ==false ) {
                            
                                if ($reglement === 'tranche') {
                            
                                
                            
                                } else if ($reglement === 'cash') {
                                
                            
                                } else if ($reglement === 'credit') {
                                    
                                    
                                }else if($facture ===1)
                                {
                                
                                }
                            }
                            
                            else
                            {
                            
                            $off= true;
                            $motif="205";
                            return $motif;
                            }
                            
                        }
                        else
                        {
                            //erreur serveur veuillez reprendre

                            $off= true;
                            $motif="206";
                            return $motif;

                        }

                        

                        /*if($verification_facture ==null)
                        {
                            //retirer les prodits vendu 

                            Sale::where('num_facture',$numero_factures)->delete();
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
                            $verification_facture = CompteFacture::where('num_factures',$numero_factures)->first(); 
                            if($verification_facture != null)
                            {
                                $verification_facture = CompteFacture::where('num_factures',$numero_factures)->first(); 
                                $verification_facture ->delete();
                            }

                    

                            return 'erreur regler';
                        }
                        else
                        {
                            if($facture ==1)
                            {
                                $facture = 'proformat';
                            }
                            if($facture ==2)
                            {
                                $facture = 'Hors taxe';
                            }
                            if($facture =3)
                            {
                                $facture = 'normaliser';
                            }
                            /*$tomail='abdouledev@gmail.com';
                            $mailMessage ="Une facture de type ".$facture ." de numero ".$numero_factures."  vient dêtre génerer par Madame Olivia veuillez cliquez sur le lien en dessous pour consulter la facture";
                            $href ="http://www.crafils.com/alerte_facture?numero_facture=".$numero_factures;
                            $subject ="CRAFILS SYSTEME D'ALERTE FACTURE";
                            $data =[
                                'subject'=>$subject,
                                'mailMessage'=> $mailMessage,
                                'href'=>$href,
                                

                            ];
                            Mail::to($tomail)->send(new FactureMail($data));

                            //gestion d'eurreur avec catch
                        

                            return    $numero_factures ;
                        }*/
                    }
                    else
                    {
                            $off= true;
                            $motif="207";
                            return $motif;
                    
                    }

              $verification_facture = CompteFacture::where('num_factures',$numero_factures)->first(); 
            //VERIFICATION 

            //ENREGISTREMENT

            //dd($off, $verification_facture,$numero_factures );

            if($off == false && $verification_facture == null && $numero_factures!=null )
            {
                $users_id = Auth::id();
                $total = 0;
                    
                    //reperage et vente
                    foreach($panier as $item)
                    {
                            $reference = $item['reference'];
                    
                            $verif_produit = produit::where('reference',$reference)->first();

                            $id_reference =$verif_produit->id;
            
                            $prix_unitaire = produit::where('reference',$reference)->first();
                                
                                //$prix =$prix_unitaire->prix;
                                $quantite =  $item['quantite'];
                        
                                $tota = (float)$prix_unitaire->prix *  (int)$item['quantite']; 
                                $montant_facture += $tota;
                                
                                    $total += 1;
                            
                                   if($reglement = 'proformat'){
                                    Proformat::create([
                            
                                        'num_facture'  => $numero_factures ,
                                        'produit_id'  => $id_reference,
                                        'quantite'  => $quantite,
                                        'total' => $tota,
                            
                            
                                    ]);
                                   }
                                   else
                                    {
                                        Sale::create([
                            
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

                                    

                                    
                                
                        

                    }

                    //facture cas clients anonyme

                    $tva = ((int)$montant_facture * 18)/100 ;
                    $totaux = $montant_facture + $tva;
                        if($typeClient == 'Client Anonyme')
                        {
                            
                            if($reglement ==='cash')
                            {
                                CompteFacture::create([

                                    'num_factures' => $numero_factures,
                                    'user_id'      => $users_id,
                                    'client_anonyme' =>(string) $nameCLients,
                                    'type_reglement' =>(string )$reglement,
                                    'type_facture'   =>(string)$facture,
                                    'total_payer'   =>(string)  $totaux,
                                    'montant_facture' =>(string) $montant_facture,
                                    'tva' =>(string) $tva,
                                    'normaliser'       =>$normaliser,
                                    'total'          =>(int) $total,
                                    
                                ]);
                            }
                            else if($facture ==1)
                            {
                                CompteFacture::create([

                                    'num_factures' => $numero_factures,
                                    'user_id'      => $users_id,
                                    'client_anonyme' =>(string) $nameCLients,
                                    'type_reglement' =>(string )$reglement,
                                    'type_facture'   =>(string)$facture,
                                    'total_payer'   =>'0',
                                    'montant_facture' =>(string) $montant_facture,
                                    'tva' =>(string) $tva,
                                    'normaliser'       =>$normaliser,
                                    'total'          =>(int) $total,
                                    
                                ]); 
                            }
                    
                        }
                    //cas clients enregister

                    else if ( $idCLients == 'Client Enregister' ) {
                    
                        if ($reglement === 'tranche') {
                            CompteFacture::create([
                                'num_factures' => $numero_factures,
                                'user_id'      => $users_id,
                                'client_id'    => $idCLients,
                                'type_reglement' => (string)$reglement,
                                'type_facture'   => (string)$facture,
                                'total_payer'    => (string)$montant,
                                'montant_facture'=> (string)$montant_facture,
                                'tva' =>(string) $tva,
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

                            $data_creancier = true;
                    
                        
                    
                        } else if ($reglement === 'cash') {
                            CompteFacture::create([
                                'num_factures'    => $numero_factures,
                                'user_id'         => $users_id,
                                'client_id'       => $idCLients, 
                                'client_anonyme'  => (string)$nameCLients,
                                'type_reglement'  => (string)$reglement,
                                'type_facture'    => (string)$facture,
                                'total_payer'     => (string)$totaux,
                                'montant_facture' => (string)$montant_facture,
                                'tva' =>(string) $tva,
                                'normaliser'      => $normaliser,
                                'total'           => (int)$total,
                            ]);
                    
                        } else if ($reglement === 'credit') {
                            CompteFacture::create([
                                'num_factures'    => $numero_factures,
                                'user_id'         => $users_id,
                                'client_id'       => $idCLients, 
                                'type_reglement'  => (string)$reglement,
                                'type_facture'    => (string)$facture,
                                'total_payer'     => '0',
                                'montant_facture' => (string)$montant_facture,
                                'tva' =>(string) $tva,
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
                            $data_creancier = true;
                    
                            
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
                                'tva' =>(string) $tva,
                                'normaliser'       =>$normaliser,
                                'total'          =>(int) $total,
                                
                            ]); 
                        }
                    }

            }
            else
            {
                return $motif ;
            }

            //success
            return $numero_factures;

         


        
        
       

        
        

    } 
    public function finalisationVentes(Request $request)
    {
        $panier = $request->panier;
        $typeClient = $request->typeClient;
        $nameCLients = $request->nameCLients;
        $montant = $request->montant;
        $idCLients = $request->idCLients;
        $facture = $request->facture;
        $reglement = $request->reglement;
    
        // Génération du numéro de facture
        $derniere_facture = CompteFacture::latest()->first();
        $numero_factures = $derniere_facture ? (int)$derniere_facture->num_factures + 1 : 1;
        $numero_factures = str_pad($numero_factures, 8, "0", STR_PAD_LEFT);
    
        $montant_facture = 0;
        $normaliser = $facture === 'normaliser';
        $off = false;
        $motif = "";
        $data_creancier = false;
    
        // Vérification du type de facture
        $facture_types = [
            'proformat' => 1,
            'simple' => 2,
            'normaliser' => 3
        ];

        if($facture =='proformat')
        {
            $reglement = 'proformat';
        }
    
        if (!array_key_exists($facture, $facture_types)) {
            return '201';
        }
    
        $facture = $facture_types[$facture];
        
    
        // Vérification du type de règlement
        $reglement_types = ['credit', 'tranche', 'cash', 'proformat'];
        if (!in_array($reglement, $reglement_types)) {
            return '207';
        }
    
        // Vérification des produits et quantités
        foreach ($panier as $item) {
            $reference = $item['reference'];
            $verif_produit = Produit::where('reference', $reference)->first();
    
            if (!$verif_produit) {
                return '203';
            }
    
            if ((int)$verif_produit->quantite < (int)$item['quantite']) {
                return '202';
            }
        }
    
        // Traitement de la vente selon le type de client
        $users_id = Auth::id();
        $total = 0;
    
        if ($typeClient == "Client Anonyme") {
            if ($reglement !== 'cash' && $facture !== 1) {
                return '204';
            }
        } elseif ($typeClient == 'Client Enregister') {
            if (!in_array($reglement, ['tranche', 'cash', 'credit']) && $facture !== 1) {
                return '205';
            }
        } else {
            return '205';
        }
    
        // Processus de vente
        foreach ($panier as $item) {
            $reference = $item['reference'];
            $verif_produit = Produit::where('reference', $reference)->first();
            $id_reference = $verif_produit->id;
            $quantite = $item['quantite'];
            $tota = (float)$verif_produit->prix * (int)$item['quantite'];
            $montant_facture += $tota;
            $total++;
    
            if ($reglement == 'proformat') {
                Proformat::create([
                    'num_facture' => $numero_factures,
                    'produit_id' => $id_reference,
                    'quantite' => $quantite,
                    'total' => $tota,
                ]);
            } else {
                Sale::create([
                    'num_facture' => $numero_factures,
                    'produit_id' => $id_reference,
                    'quantite' => $quantite,
                    'total' => $tota,
                ]);
    
                $verif_produit->update([
                    'quantite' => (int)$verif_produit->quantite - (int)$quantite
                ]);
            }
        }
    
        $tva = ((int)$montant_facture * 18) / 100;
        $totaux = $montant_facture + $tva;
    
        // Enregistrement de la facture
        if ($typeClient == 'Client Anonyme') {
            CompteFacture::create([
                'num_factures' => $numero_factures,
                'user_id' => $users_id,
                'client_anonyme' => (string)$nameCLients,
                'type_reglement' => (string)$reglement,
                'type_facture' => (string)$facture,
                'total_payer' => $reglement === 'cash' ? (string)$totaux : '0',
                'montant_facture' => (string)$montant_facture,
                'tva' => (string)$tva,
                'normaliser' => $normaliser,
                'total' => (int)$total,
            ]);
        } else {
            $compte_facture_data = [
                'num_factures' => $numero_factures,
                'user_id' => $users_id,
                'client_id' => $idCLients,
                'type_reglement' => (string)$reglement,
                'type_facture' => (string)$facture,
                'total_payer' => $reglement === 'cash' ? (string)$totaux : ($reglement === 'tranche' ? (string)$montant : '0'),
                'montant_facture' => (string)$montant_facture,
                'tva' => (string)$tva,
                'normaliser' => $normaliser,
                'total' => (int)$total,
            ];
    
            CompteFacture::create($compte_facture_data);
    
            if (in_array($reglement, ['tranche', 'credit'])) {
                $du = $montant_facture - ($reglement === 'tranche' ? $montant : 0);
              
                if($facture==3)
                {
                    $du =$du+$tva;

                }
                CreancierTraçability::create([
                    'user_id' => $users_id,
                    'client_id' => $idCLients,
                    'numero_facture' => $numero_factures,
                    'montant_du' => $du,
                ]);
    
                $montant_du = CreancierTraçability::where('client_id', $idCLients)->sum('montant_du');
    
                Creancier::updateOrCreate(
                    ['client_id' => $idCLients],
                    ['user_id' => $users_id, 'montant' => $montant_du]
                );
    
                $data_creancier = true;
            }
        }
    
        return $numero_factures;
    }

    public function Annuler(Request $request)
    {
        $reference = $request->num_factures;

        $search = CompteFacture::where('num_factures',$reference)->first();

       if($search)
       {
            $search->annuler = true;
            return redirect()->route('Dashboard')->withErrors(['succes' => 'Facture annuler avec succes']);


       }
       else
       {
          return redirect()->route('Dashboard')->withErrors(['errors' => 'Impossible ']);

       }

    }
    
   



    public function View_facture()
    {
        return view('Facture.facture');
    }   


      

       



}


