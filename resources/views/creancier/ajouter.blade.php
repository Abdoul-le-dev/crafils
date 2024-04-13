@extends('PageStatic.Dashboard')

@section('page_titre')
   Produit
@endsection

@section('page')




<div class="container p-10 ">



    <div class="bg-white rounded-sm mt-10 flex flex-col sm:h-full ">

    <div class="flex justify-center mt-4 text-blue-600 ">
     <h2 class="FP-Menu ">Ajouter creancier</h2>
    </div>

     <form action="{{ route('Ajout_creancier') }}" method="post" >

         @csrf
         @method('post')


         <div class="flex flex-row p-3 flex-wrap justify-center  ">

            <div class="flex flex-row p-3 w-full  ">
                <div class="flex flex-row mx-4 my-4 md:w-1/2 ">
                    <label for="nom" class="FP-Menu ml-2 p-2 justify-center  " ><span class="mx-1 text-start"> Clients </span></label>

                    <div class="w-full flex flex-row">
                       <input type="text" id="searchInput" class="FP-Menu  border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " id="searchInput" placeholder="Rechercher ">

                       <select id="client" name="client"  class="FP-Menu w-50 border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " required>

                        <option ></option>

                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nom }} - {{ $client->n_societe }}</option>
                            @endforeach

                       </select>
                       <script>
                        $(document).ready(function () {
                            // Gérer les changements dans l'élément de saisie de recherche
                            $('#searchInput').on('input', function () {
                                // Récupérer la valeur de la saisie de recherche
                                var searchTerm = $(this).val().toLowerCase();
                                $('#client').show();

                                // Parcourir chaque option du menu déroulant
                                $('#client option').each(function () {
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
                                $('#client').append($('#client option:first'));
                            });
                        });
                       </script>
                    </div>

                </div>

                <div class="flex flex-row mx-4 my-4 md:w-1/2 justify-center">
                    <label for="montant" class="FP-Menu ml-2 p-2" >Montant Dû</label>
                    <input type="number" name="montant" class="border-2  p-2  focus:outline-none focus:border-2 focus:border-blue-400 rf" required>
                </div>


            </div>









         </div>


         <div class="flex justify-center mb-4">
             <div class="flex justify-between  mt-4  w-1/3 ">

                 <button type="submit" class="FP-Menu bg-indigo-200 p-3 rounded-sm hover:bg-[#ADD8E6]">Ajouter </button>
                 <a href="{{ route('Dashboard')}}" class="FP-Menu bg-indigo-200 p-3 rounded-sm hover:bg-red-400">Annuler </a>


             </div>
         </div>


     </form>






    </div>
 </div>



 @endsection
