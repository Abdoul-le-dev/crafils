@extends('PageStatic.Dashboard')

@section('page_titre')
   Produit
@endsection

@section('page')

<div class="p-10 flex justify-center items-center">
   <div class="bg-white rounded-md   mt-10 flex flex-row  flex-wrap p-10 justify-center items-center " style="min-height: 60vh">
   
       <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10 w-48">
           <img src="Icons/creancier (1).png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
           <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300"><a href="{{route('AjouterCreancier')}}">Ajouter créancier</a></h3>
       </div>

       <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10">
         <img src="Icons/regles.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
         <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300" ><a href="{{route("ReglementsCreancier")}}">Réglements</a></h3>
     </div>
   
       <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10">
           <img src="Icons/liste-de-souhaits.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
           <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300" ><a href="{{route("ListeCreancier")}}">Liste des créanciers</a></h3>
       </div>
   
       
   
      
   
   </div>
</div>


@endsection