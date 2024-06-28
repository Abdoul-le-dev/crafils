@extends('PageStatic.Dashboard')

@section('page_titre')
    Ajouter Produit
@endsection

@section('page')
<script>
    // Attendez que le DOM soit chargé
    document.addEventListener("DOMContentLoaded", function () {
        // Récupérez l'élément div
        var monDiv = document.getElementById("Personalise");

        // Désactivez le div en le cachant
        monDiv.style.display = "none";
    });
</script>
<div class="container p-10  ">



 <div class="bg-white rounded-sm mt-5 flex flex-col sm:h-full ">

    <div class="flex justify-center mt-4 text-green-600 ">
     <h2 class="FP-Menu ">Ajouter Produits</h2>
    </div>
    @if ($errors)

    @foreach ($errors ->all()  as $error )


        <div class="flex flex-col  ml-20 p-5   ">
            <li class="text-red-300 FP-error"> {{ $error}}</li>
        </div>


    @endforeach

    @endif

     <form action="{{ route('Add_produit') }}" method="post" >

         @csrf
         @method('post')


         <div class="flex flex-row p-3 flex-wrap  ">

             <div class="flex flex-row p-3 w-full  flex-wrap">
                <div class="flex flex-row mx-4 my-4 md:w-1/2  ">
                    <label for="nom" class="FP-Menu ml-2 p-2 justify-center  " ><span class="mx-1 text-start"> Categories </span></label>

                    <div class="w-full flex flex-row">
                       <input type="text" id="searchInput" class="FP-Menu  border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " id="searchInput" placeholder="Rechercher ">

                       <select id="categorie" name="categorie"  class="FP-Menu w-40 border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " required>


                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                            @endforeach

                       </select>
                       <script>
                        $(document).ready(function () {
                            // Gérer les changements dans l'élément de saisie de recherche
                            $('#searchInput').on('input', function () {
                                // Récupérer la valeur de la saisie de recherche
                                var searchTerm = $(this).val().toLowerCase();
                                $('#categorie').show();

                                // Parcourir chaque option du menu déroulant
                                $('#categorie option').each(function () {
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
                                $('#categorie').append($('#categorie option:first'));
                            });
                        });
                       </script>
                    </div>

                </div>

                <div class="flex flex-row mx-4 my-4 md:w-1/3  justify-center ">

                    <label for="nom" class="FP-Menu ml-2 p-2 justify-center text-start " >Marque <span class="mx-3"></span></label>
                    <div class="w-40">
                       <input type="text" name="marque"  class="border-2 w-full p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>

                    </div>
                </div>
             </div>

             <div class="flex flex-row p-3 w-full">
                <div class="flex flex-row mx-4 my-4 md:w-1/2  ">
                    <label for="reference" class="FP-Menu ml-2 p-2 justify-center text-start" ><span class="">N° Référence</span></label>
                    <div class="w-40">
                    <input type="text" name="reference" id="champDeSaisie" class="border-2 w-full p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
                    </div>
                    
                </div>

                <div class="flex flex-row mx-4 my-4 md:w-1/3 justify-center  ">
                    <label for="nom" class="FP-Menu ml-2 p-2 text-start" >Nom produit</label>
                    <div class="w-40">
                    <input type="text" name="nom" id="nom" class="border-2  w-full p-2  focus:outline-none focus:border-2 focus:border-blue-400 rf" required>
                    </div>
                </div>

             </div>
             <div class="flex flex-row p-3 w-full">
                <div class="flex flex-row mx-4 my-4 md:w-1/2  ">
                    <label for="prix" class="FP-Menu ml-2 p-2 justify-center text-start" ><span class="">Prix Produit</span></label>
                    <div class="w-40">
                    <input type="text" name="prix" id="prix"  class="border-2 w-full p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
                    </div>
                </div>

                <div class="flex flex-row mx-4 my-4 md:w-1/3 justify-center  ">
                    <label for="quantite" class="FP-Menu ml-2 p-2 text-start" >Quantité</label>
                    <div class="w-40">
                    <input type="text" name="quantite" id="quantite" class="border-2  w-full p-2  focus:outline-none focus:border-2 focus:border-blue-400 rf" required>
                    </div>
                </div>

             </div>










         </div>


         <div class="flex justify-center mb-4">
             <div class="flex justify-between  mt-4  w-1/3 ">

                 <button type="submit" class="FP-Menu bg-indigo-200 p-3 rounded-sm hover:bg-[#ADD8E6]">Ajouter </button>
                 <a href="{{ route('Stock')}}" class="FP-Menu bg-indigo-200 p-3 rounded-sm hover:bg-red-400">Retour </a>


             </div>
         </div>


     </form>

    </div>
</div>

 @endsection
