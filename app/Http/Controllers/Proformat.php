<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Facture;

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
        return view('impression.modeldetail',compact('donne_facture'));
    }
    public function modifier_facture( Request $request)
    {
        $num_facture = $request->query('numero_facture');
        return view('impression.model_modifier_facture');
    }
    public function visualiser(Request $request)
    {
        $num_facture = $request->query('numero_facture');
        return view('impression.model_visualiser');
    }
    public function normaliser(Request $request)
    {
        $num_facture = $request->query('numero_facture');
        return view('impression.model_normailser');
    }
}
