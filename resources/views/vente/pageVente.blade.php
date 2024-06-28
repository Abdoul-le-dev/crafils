@extends('PageStatic.Dashboard')

@section('page_titre')
    Ajouter Produit
@endsection

@section('page')
<div class="container p-10 ">

    
    <div class="w-full h-full flex flex-row justify-center items-center ">

        <div class="Pop  hidden absolute bg-indigo-50 p-10 top-32  shadow-2xl flex flex-col justify-center items-center " style="width: 500px">

            <div class="static flex flex-col justify-center items-center w-full">

            <img src="Icons/trait.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer" style="" >
            <h3 class="FP-error m-2 ">Finalisation de la vente</h3>
            </div>
            <div class="w-full">


                <form class="Formulaire" id="formulaire1" method="POST" >
                    @csrf
                    <div class="flex flex-row p-3 flex-wrap  ">
                        <div class="flex flex-row   w-full justify-center">
                            <label class="p-2">
                                <input type="radio" name="client"  class="ca" value="Client Anonyme" > <a class="FP-error text-xs" >Client Anonyme</a>
                            </label>

                            <label class="p-2">
                                <input type="radio" name="client" class="p-2 ce" value="Client Enregister"> <a class="FP-error text-xs">Client Enregister</a>
                            </label>



                        </div>

                        <div class="flex flex-row mt-2  w-full justify-center">
                            <label class="p-2">
                                <input type="radio" name="facture" class="pf" value="proformat" > <a class="FP-error text-xs">Proformat</a>
                            </label>

                            <label class="p-2">
                                <input type="radio" name="facture" class="p-2 bl" value="simple"> <a class="FP-error text-xs">Facture simple</a>
                            </label>

                            <label class="p-2">
                                <input type="radio" name="facture" class="p-2 fa" value="normaliser"> <a class="FP-error text-xs">Facture normaliser</a>
                            </label>

                        </div>

                        <div class="AddCa">

                        </div>

                    </div>


                    <div class="flex justify-center mb-4">
                        <div class="flex justify-between  mt-4  w-full">

                            <button type="submit" class="FP-error bg-indigo-200 p-3 rounded-sm hover:bg-[#ADD8E6]">Ajouter </button>
                            <a onclick="PopR()" class="FP-error bg-indigo-200 p-3 rounded-sm hover:bg-red-400 hover:cursor-pointer">Annuler </a>


                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
    <div class="flex Pop1 hidden w-full h-full justify-center items-center">
      
     <img src="image/aa.gif" alt="" class="absolute p-10 top-32">
    </div>

    <div class="bg-white rounded-sm  flex flex-col sm:h-full " style="min-height: 80vh">



        <div class="flex justify-center mt-4 text-blue-600 ">
            <h2 class="FP-error font-bold ">Vendre Produits</h2>
        </div>


        <div class="flex flex-row  " style="min-width:600px ,">

            <div class="w-1/2 p-2" >


                <div class=" FP-error flex flex-row justify-center">
                    <h3 class="FP-error font-bold">Ajout produit</h3>
                </div>
                <div class="p-2 mt-10 ">


                      <div class="flex flex-row p-2 w-full ">
                        <label for="" class="p-2 FP-error font-bold text-xs ">N° Reférence</label>
                        <div class="w-1/2">
                            <input type="text" name="reference" id="search" class="Rp FP-error Ref border-2 p-2 w-full focus:outline-none focus:border-2 focus:border-blue-400 ">
                        </div>

                        <div class="">
                            <button type="">
                              <img src="Icons/recherche.png" alt="search" onclick="rechercheProduits()" class="ml-4 cursor-pointer w-12 hover:w-14">
                            </button>
                        </div>

                     </div>


                    <div class="mt-10 flex p-2 w-full " style="min-width: 200px">
                        <table class="TB border-separate border border-slate-300 hidden md:block">
                            <thead>
                                <tr class="bg-[#F8FAFC]">
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Nom du produit
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    N° Référence
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Prix produit
                                 </th>

                               </tr>
                            </thead>


                            <tbody>
                               <tr>

                                  <td class="FP-error text-xs  font-thin border border-slate-300 p-2">
                                    <p class="P1"></p>
                                  </td>
                                  <td class="FP-error text-xs font-thin text-blue-600 border border-slate-300 p-2">
                                    <p class="P2"></p>
                                  </td>
                                  <td class="FP-error text-xs font-thin border border-slate-300 p-2">
                                    <p class="P3"></p>
                                  </td>
                               </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-10 flex p-2 w-full " style="min-width: 250px">
                        <table class="border-separate border border-slate-300 hidden md:block">
                            <thead>
                                <tr class="bg-[#F8FAFC]">
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Categorie
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-7  text-xs">
                                    Marque
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Quantité disponible
                                 </th>

                               </tr>
                            </thead>


                            <tbody>
                               <tr>

                                  <td class="FP-error text-xs  font-thin border border-slate-300 p-2">
                                    <p class="P4"></p>
                                  </td>
                                  <td class="FP-error text-xs font-thin border border-slate-300 p-2">
                                    <p class="P5"></p>
                                  </td>
                                  <td class="FP-error text-xs font-thin border border-slate-300 p-2">
                                    <p class="P6"></p>
                                  </td>
                               </tr>
                            </tbody>
                        </table>
                    </div>




                   {{--  <div class="mt-5 flex p-2 w-full " style="min-width: 200px">
                        <table class="border-separate border  hidden md:block">
                            <thead>
                                <tr class="bg-[#F8FAFC]">
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Nom du produit
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    N° Référence
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Prix produit
                                 </th>

                               </tr>
                            </thead>


                            <tbody>
                               <tr>

                                  <td class="FP-error text-xs  font-thin border border-slate-300 p-2">
                                  @if($resultat)
                                  @foreach ($resultat as $result)
                                    {{ $result->nom}}
                                  @endforeach
                                  @else
                                  auccun
                                  @endif
                                  </td>
                                  <td class="FP-error text-xs font-thin text-blue-600 border border-slate-300 p-2">
                                    @if($resultat)
                                    @foreach ($resultat as $result)
                                      {{ $result->reference}}
                                    @endforeach
                                    @else
                                    auccun
                                    @endif
                                  </td>
                                  <td class="FP-error text-xs font-thin border border-slate-300 p-2">
                                    @if($resultat)
                                    @foreach ($resultat as $result)
                                      {{ $result->prix}}
                                    @endforeach
                                    @else
                                    auccun
                                    @endif
                                  </td>
                               </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-5 flex p-2 w-full " style="min-width: 200px">
                        <table class="border-separate border border-slate-300 hidden md:block">
                            <thead>
                                <tr class="bg-[#F8FAFC]">
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Categorie
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-7  text-xs">
                                    Marque
                                 </th>
                                 <th class="FP-error text-xs font-thin border border-slate-300 py-3 px-5  text-xs">
                                    Quantité disponible
                                 </th>

                               </tr>
                            </thead>


                            <tbody>
                               <tr>

                                  <td class="FP-error text-xs  font-thin border border-slate-300 p-2">
                                    @if($resultat)
                                    @foreach ($resultat as $result)
                                      {{ $result->categorie->categorie}}
                                    @endforeach
                                    @else
                                    auccun
                                    @endif
                                  </td>
                                  <td class="FP-error text-xs font-thin border border-slate-300 p-2">
                                    @if($resultat)
                                    @foreach ($resultat as $result)
                                      {{ $result->marque}}
                                    @endforeach
                                    @else
                                    auccun
                                    @endif
                                  </td>
                                  <td class="FP-error text-xs font-thin border border-slate-300 p-2">
                                    @if($resultat)
                                    @foreach ($resultat as $result)
                                      {{ $result->quantite }}
                                    @endforeach
                                    @else
                                    auccun
                                    @endif
                                  </td>
                               </tr>
                            </tbody>
                        </table>
                    </div> --}}
                  <div class=" flex justify-center mb-4" >
                        <div class="flex  mt-4 w-full">

                            <a onclick="addProduit()"><button type="" class="FP-error font-bold bg-indigo-200 p-2 mx-1 rounded-sm hover:bg-green-400">Ajouter </button></a>
                            <a onclick="" class="FP-error font-bold bg-indigo-200 p-2 rounded-sm 0 hover:bg-red-400 hover:cursor-pointer" style="margin-left: 150px" href="{{ route('Dashboard')}}">Annuler </a>


                        </div>
                  </div>





                </div>


            </div>
            <div class="bg-black" style="min-width:10px">

            </div>
            <div class="  w-1/2 p-2 Generate" >


                <div class=" FP-error flex flex-row justify-center"><h3 class="FP-error font-bold">Panier</h3></div>
                
                
               <div class="Totaux ">
                    <p class=" FP-error font-bold p-2 ">Totaux: <a  class="Total text-blue-400"></a></p>
                </div>
                <div class="Generates">

                </div>



                <div class=" Evalue flex  flex-row items-center mt-10  rounded-sm Buttonse">
                   <div class="flex  flex-row ">
                    <a onclick="prevPage()" class="FP-error bg-indigo-200 p-2 mx-1 rounded-sm cursor-pointer  hover:bg-green-400">
                        <h4 class="FP-error">Prev</h4>
                    </a>
                    <a onclick="nextPage()" class="FP-error bg-indigo-200 p-2 mx-1 cursor-pointer  rounded-sm hover:bg-green-400 ">
                        <h4 class="FP-error">Next</h4>
                    </a>
                   </div>

                   <div class="flex  flex-row ">
                     <a class="FP-error bg-indigo-200 p-2 mx-1 rounded-sm cursor-pointer  hover:bg-green-500" onclick="Pop()" >
                      <h4 class="FP-error font-bold">Valider</h4>
                     </a>
                     <a onclick="deletePanier()" class="FP-error bg-red-300 p-2 mx-1 cursor-pointer  rounded-sm hover:bg-red-500">
                      <h4 class="FP-error font-bold">Supprimer</h4>
                     </a>
                    </div>
                </div>





            </div>

        </div>




    </div>
    
 </div>






@endsection
