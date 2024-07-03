@extends('PageStatic.Dashboard')
@section('page_titre')
Enregistrement clients
@endsection

@section('page')


@if ($errors)




        @foreach ($errors ->all()  as $error )

           <div class="p-3 absolute bg-white m-2 right-0 mr-10">


                <li class="text-red-300 FP-error"> {{ $error}}</li>

            </div>



        @endforeach







@endif




<div class="p-10 flex justify-center items-center">


<div class="bg-white rounded-md   mt-10 flex flex-row  flex-wrap p-10 justify-center items-center " style="min-height: 60vh">



    <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10 w-48">
        <img src="image/ENTREPRISE.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
        <a href="{{route('Ajout_Client')}}"> <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300">Ajouter client</h3></a>
    </div>

    

    <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10 ">
        <img src="image/CLIENT.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
        <a href="{{route('Ajout_entreprise')}}"><h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300">Ajouter entreprise</h3></a>
    </div>



</div>


</div>


@endsection