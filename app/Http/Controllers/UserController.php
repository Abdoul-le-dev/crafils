<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{ 
    
   //Page 
   public function login(Request $request)
   {
     
     
     try {
      $input = $request->all();
     } catch (\Throwable $th) {
      
      return response()->json([
         "status"=> false,
         "message"=> $th->getMessage(),
      ]);
     }


   }
   public function Dashboard()
   {
    //Dashboard User
    return view('User.DashbordUser');

   }
   public function Stock()
   {
    //Dashboard User
    return view('User.PageStock');

   }

   public function P_Produit()
   {
    //Page Produit
    return view('User.Produit');

   }

   public function P_Ajout_produit()
   {
    //Page Ajout nouveau produit
    return view('User.AjouterProduit');

   }

   public function P_Profil()
   {
    //Page Profil
    return view('User.Profil');

   }

   public function P_comptabilite()
   {
    //Page Comptability
    return view('User.Comptability');

   }

   public function P_Historique()
   {
    //Page Historique
    return view('User.Historique');

   }

   public function P_Impression()
   {
    //Page Impression
    return view('User.Impression');

   }

   public function P_Recherche()
   {
    //Page Recherche
    return view('User.RechercheProduit');

   }

   public function P_Statistique()
   {
    //Page Statistique
    return view('User.Statistique');

   }

   public function P_Bordereau_livraison()
   {
    //Page Statistique
    return view('User.BordereauLivraison');

   }

   public function P_Pro_format()
   {
    //Page Statistique
    return view('User.Proformat');

   }




   // Fonctionnalité

   public function Modifier()
   {
    //Modifier Produit
    

   }

   public function Suppression()
   {
    //Suppression Produit
    

   }




}
