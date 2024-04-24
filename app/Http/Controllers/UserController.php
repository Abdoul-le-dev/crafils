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
    return view('User.dashboard.dashboardUser');

   }
   public function Stock()
   {
    //Dashboard User
    return view('Stock.PageStock');

   }


   
   public function P_Profil()
   {
    //Page Profil
    return view('User.profil.Profil');

   }

   public function P_comptabilite()
   {
    //Page Comptability
    return view('User.comptability.comptability');

   }

   public function P_Historique()
   {
    //Page Historique
    return view('User.historique.historique');

   }

   


   public function P_Statistique()
   {
    //Page Statistique
    return view('User.statistique.statistique');

   }

  

   
   




}
