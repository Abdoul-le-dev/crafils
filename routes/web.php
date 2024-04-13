<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\clients;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreancierController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Proformat;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Page

//Page Principal
Route::get('/', function () {
    return view('Access.Login');
});


//Dashboard
Route::get('/dashboard',[UserController::class,'Dashboard'])->name('Dashboard');

//tâche principale
Route::get('/stock',[UserController::class,'Stock'])->name('Stock');



//Produit
Route::get('/produit',[UserController::class,'P_Produit'])->name('Produit');

//AjouterProduit
Route::get('/ajout_produit',[UserController::class,'P_Ajout_produit'])->name('Ajout_Produit');

//AjouterProduit
Route::get('/modifier_produit',[UserController::class,'Modifier'])->name('Ajout_Produits');


//SupprimerProduit
Route::get('/supprimer_produit',[UserController::class,'Suppression'])->name('Suppression');

//Profil
Route::get('/profil',[UserController::class,'P_Profil'])->name('Profil');

//Comptabilité
Route::get('/comptability',[UserController::class,'P_comptabilite'])->name('Comptability');

//Historique
Route::get('/historique',[UserController::class,'P_Historique'])->name('Historique');

//Impression
Route::get('/impression',[UserController::class,'P_Impression'])->name('Impression');

//Recherche
Route::get('/recherche',[UserController::class,'P_Recherche'])->name('Recherche');


//Statistique
Route::get('/statistique',[UserController::class,'P_Statistique'])->name('Statistique');

//Proformat
Route::get('/pro_format',[UserController::class,'P_Pro_format'])->name('Pro_format');

//Bordereau de livraison
Route::get('/bordereau_livraison',[UserController::class,'P_Bordereau_livraison'])->name('Bordereau_livraison');

//AjouterProduit
Route::get('/client',[clients::class,'P_Ajout_client'])->name('Ajout_Client');




// page stock
Route::get('/ajouter_produit',[StockController::class,'AjouterProduitView'])->name('AjouterProduit');

Route::get('/ajouter_categorie',[StockController::class,'AjouterCategorieView'])->name('AjouterCategorie');
Route::get('/liste_produit',[StockController::class,'ListeProduitView'])->name('ListeProduit');

//Page de vente
Route::get('/vendre',[VenteController::class,'PageVenteView'])->name('PageVente');
Route::post('/vendre',[VenteController::class,'Search'])->name('Search');

//page creancier
Route::get('/creancier',[CreancierController::class,'CreancierView'])->name('PageCreancier');
Route::get('/ajouter_creancier',[CreancierController::class,'AjouterView'])->name('AjouterCreancier');
Route::get('/liste_creancier',[CreancierController::class,'ListeView'])->name('ListeCreancier');
Route::get('/reglements_creancier',[CreancierController::class,'ReglementsView'])->name('ReglementsCreancier');


Route::get('/listeproduits/',[StockController::class,'__invoke'])->name('tri');



// post request

// ajout client

Route::post('/client',[clients::class,'Ajout_client'])->name('Ajout_Client');

Route::post('/stock',[CategoriesController::class,'AjouterCategorie'])->name('Add_Categorie');

Route::post('/ajouter_produit',[ProduitController::class,'AjouterProduit'])->name('Add_produit');


////// renouveau

Route::post('/listeproduits/',[StockController::class,'trie'])->name('trie');

// connexion
Route::get('/login',[AuthController::class,'viewConnexion'])->name('connexion');
Route::post('/login',[AuthController::class,'doConnexion'])->name('auth.login');

//essaie
Route::get('/essaie',[StockController::class,'essaie'])->name('essaie');
Route::get('/clients',[StockController::class,'client'])->name('client');
Route::post('/sentdata',[VenteController::class,'finalisationVentes']);

//creancier

Route::post('/ajouter_creancier',[CreancierController::class,'Ajout_creancier'])->name('Ajout_creancier');

Route::post('/reglements_creancier',[CreancierController::class,'Reglements_creancier'])->name('Reglements_creancier');

//facture

Route::get('/facture',[VenteController::class,'View_facture']);

//Impression

Route::get('/pro-forma',[Proformat::class,'view_proformat'])->name('proforma');
Route::post('/searchdata',[Proformat::class,'search'])->name('search');
Route::get('/details',[Proformat::class,'details'])->name('details');











