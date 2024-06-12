@extends('PageStatic.Dashboard')

@section('page_titre')
    Ajouter Produit
@endsection

@section('page')
<div class="container p-10 h-full ">



    <div class="bg-white rounded-sm mt-5 flex flex-col sm:h-full ">

    <div class="flex justify-center mt-4 text-indigo-400 ">
     <h2 class="FP-Menu ">Liste des Produits</h2>
    </div>

    <form action="{{ route('trie')}}" method="post" id="searchForm">
    <div class="flex flex-row justify-center w-full p-2 mt-4 grid gap-x-2  grid-cols-2">

         @csrf

        <div class="flex flex-row justify-center">


            <div class="flex flex-row p-3 w-full  flex-wrap">
               <div class="flex flex-row mx-4 my-4 md:w-1/2  ">
                   <label for="nom" class="FP-Menu ml-2 p-2 justify-center  " ><span class="mx-1 text-start"> Réference </span></label>

                   <div class="w-full flex flex-row">
                      <input type="text" id="searchInput" class="searchInput FP-Menu  border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " id="searchInput" placeholder="Rechercher ">

                      <select id="reference" name="reference"  class="FP-Menu w-40 border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " required>

                           <option value="">Search</option>
                           @foreach ($Produitss as $Produit)

                               <option value="{{ $Produit->reference }}">{{ $Produit->reference}}</option>
                           @endforeach


                      </select>
                      <script>
                       $(document).ready(function () {
                           // Gérer les changements dans l'élément de saisie de recherche
                           $('#searchInput').on('input', function () {
                               // Récupérer la valeur de la saisie de recherche
                               var searchTerm = $(this).val().toLowerCase();
                               $('#reference').show();

                               // Parcourir chaque option du menu déroulant
                               $('#reference option').each(function () {
                                   // Récupérer le texte de l'option en minuscules
                                   var optionText = $(this).text().toLowerCase();

                                   // Vérifier si le terme de recherche est présent dans le texte de l'option
                                   if (optionText.includes(searchTerm)) {
                                       // Afficher l'option si le terme de recherche est trouvé
                                       $(this).show();
                                   } else {
                                       // Masquer l'option si le terme de recherche n'est pas trouvé
                                       $(this).hide();
                                   }
                               });

                               // Déplacer l'option par défaut (première option) à la fin
                               $('#reference').append($('#reference option:first'));
                           });
                       });
                      </script>
                   </div>
                   <script>
                     $(document).ready(function () {
                      // Écouter l'événement de changement sur le menu déroulant
                      $('#reference').on('change', function () {
                            // Soumettre automatiquement le formulaire lorsque la sélection change
                            $('#searchForm').submit();
                      });
                   });
                   </script>

               </div>
            </div>

        </div>




    </div>
   </form>

    <div class="mt-2 flex justify-center w-full p-2" style="min-width: 400px">
        <table class="border-separate border border-slate-300 hidden md:block">
            <thead>
                <tr class="bg-[#F8FAFC]">
                 <th class="FP-Menu text-base font-thin border border-slate-300 py-3 md:px-6">
                    Nom du produit
                 </th>
                 <th class="FP-Menu text-base font-thin border border-slate-300 py-3 md:px-6">
                    N° Référence
                 </th>
                 <th class="FP-Menu text-base font-thin border border-slate-300 py-3 px-6">
                    Prix produit
                 </th>
                 <th class="FP-Menu text-base font-thin border border-slate-300 py-3 px-6">
                    Categories
                 </th>
                 <th class="FP-Menu text-base font-thin border border-slate-300 py-3 px-6">
                    Marque
                 </th>
                 <th class="FP-Menu text-base font-thin border border-slate-300 py-3 px-6">
                    Quantité disponible
                 </th>
               </tr>
            </thead>
            @foreach ($Produits as $data)


            <tbody>
               <tr>
                  <td class="FP-Menu text-sm font-thin border  border-slate-300 py-3 md:px-8 text-black-100">
                     {{$data->nom}}
                  </td>
                  <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8 text-blue-400">
                    {{$data->reference}}
                  </td>
                  <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                    {{$data->prix}}
                  </td>
                  <td class="FP-Menu text-sm font-thin border border-slate-300 py-3  text-blue-400 md:px-8">


                         {{$data->categorie->categorie}}

    

                  </td>
                  <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                    {{$data->marque}}
                  </td>
                  <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                    {{$data->quantite}}
                  </td>

               </tr>
            </tbody>
            @endforeach

        </table>

    </div>
    <div class="px-10 FP-error">
        @if($read == 1 )
    {{ $Produits ->appends(request()->input())->links() }}
    @endif
    </div>
    </div>
 </div>

 @endsection
