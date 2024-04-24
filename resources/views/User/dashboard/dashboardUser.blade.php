@extends('PageStatic.Dashboard')


@section('page')





<div class="container p-10 ">



   <div class="flex flex-wrap flex-row  bg-white rounded-sm mt-10 justify-center items-center " style="min-height: 60vh">

      <div class="flex flex-col shadow-lg border-2 border-black w-48 justify-center items-center rounded-lg mx-2 m-3p-2 m-10  ">
         <img src="Icons/filtre.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
         <a href="{{route('PageVente')}}" class="bg-indigo-200 p-2 rounded-lg m-4 FP-Menu">Vente</a>
      </div>

      <div class="flex flex-col shadow-lg border-2 border-black w-48  justify-center items-center rounded-lg mx-2 m-10">
         <img src="Icons/stock.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer" >
         <a href="{{ route('Stock')}}" class="bg-indigo-200 p-2 rounded-lg my-4 FP-Menu">Stock</a>
      </div>


      <div class="flex flex-col shadow-lg border-2 border-black w-48  justify-center items-center rounded-lg mx-2 m-10">
         <img src="Icons/customer.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
         <a href="{{ route('Ajout_Client')}}" class="bg-indigo-200 p-2 rounded-lg my-4 FP-Menu">Nouveau client</a>
      </div>

      <div class="flex flex-col shadow-lg border-2 border-black w-48  justify-center items-center rounded-lg mx-2 m-10">
         <img src="Icons/creancier.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
         <a href="{{ route("PageCreancier")}}" class="bg-indigo-200 p-2 rounded-lg my-4 FP-Menu">Creancier</a>
      </div>


      <div class="flex flex-col shadow-lg border-2 border-black w-48  justify-center items-center rounded-lg mx-2 m-10">
         <img src="Icons/time.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
         <a href="" class="bg-indigo-200 p-2 rounded-lg my-4 FP-Menu">Heure Pointe</a>
      </div>




   </div>
</div>


@endsection
