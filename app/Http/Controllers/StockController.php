<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\produit;
use App\Models\User;
use App\Models\client;


class StockController extends Controller
{
    //
    public function AjouterProduitView()
    {
        $categories = categorie::all();

        return view("Stock.ajouterProduits")->with('categories',$categories);
    }
    public function AjouterCategorieView()
    {
        return view("Stock.ajouterCategorie");
    }
    public function ListeProduitView()
    {
        //$post = produit::factory(900)->create();
        //$user = User::factory()
        $Categories = categorie::all();
        $Produits = produit::query()->latest()->paginate(10);

        $Produitss = produit::all();
        $read =1;



        return view("Stock.listeProduit",compact('Categories','Produits','Produitss','read'));
    }
    public function AjouterProduit()
    {

    }
    public function __invoke(Request $request)
    :View {

            /**
             * @var string|null $sortBy
             */
            $categorie = $request->categorie;

            /**
             * @var string|null $direction
             */
            $direction = $request->direction;

            $produits = produit::query()

                ->filter(
                    categorie: $categorie,
                    direction: $direction,
                )
                ->latest()
                ->paginate(5);

            $categorie =   categorie::all();
            $produitss = produit::all();



            return view(
                view: 'Stock.listeProduit',
                data: ['Categories' => $categorie,'Produits' =>$produits,'Produitss' =>$produitss],
            );

    }

    //

    public function trie(Request $request)
    {
        $reference = $request->reference;
        $direction ='DESC';



        // Exécuter la requête et obtenir les résultats

        $produits = produit::where('reference',$reference)->get();





        // Trier les résultats en fonction de la marque (si spécifiée)




        $categorie = categorie::all();
        $produitss = produit::all();
        $read = 0;


        return view(
            view: 'Stock.listeProduit',
            data: ['Categories' => $categorie,'Produits' => $produits,'Produitss' => $produitss,'read'=> $read],
        );

    }
    public function essaie()
    {   if(isset($_GET["produit"]) && $_GET["produit"] == 1 )
        {

            $produit = produit::all();
            return response()->json(["Produit" => $produit]);

            //var_dump($produit);
            //die();
        }


            // return view('vente.getdata',compact('produit'));
    }

    public function client()
    {   if(isset($_GET["client"]) && $_GET["client"] == 1 )
        {

            $clients = Client::select('id', 'nom','n_societe','prenom')->get();
            return response()->json(["Client" => $clients]);

            //var_dump($produit);
            //die();
        }


            // return view('vente.getdata',compact('produit'));
    }

}


