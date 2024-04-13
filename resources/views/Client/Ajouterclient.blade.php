@extends('PageStatic.Dashboard')


@section('page')




<div class="container p-10 ">



   <div class="bg-white rounded-sm mt-10 flex flex-col sm:h-full ">

   <div class="flex justify-center mt-4 text-indigo-600 ">
    <h2 class="FP-Menu ">Enregistrement client</h2>
   </div>

   @if ($errors)

    @foreach ($errors ->all()  as $error )


        <div class="flex flex-col  ml-20 p-5   ">
            <li class="text-red-300 FP-error"> {{ $error}}</li>
        </div>


    @endforeach

    @endif

    <form action="{{ route('Ajout_Client') }}" method="post" >

        @csrf
        @method('post')




        <div class="flex flex-row p-3 flex-wrap justify-center  ">
            <div class=" flex flex-col mx-4 my-4 md:w-1/3  justify-center">
                <div class="flex flex-row   justify-center">
                    <label for="nom" class="FP-Menu ml-2 p-2 justify-center " >Nom <span class="mx-1"></span></label>
                    <input type="text" name="nom" id="nom" class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
                </div>



            </div>

            <div class="flex flex-row mx-4 my-4 md:w-1/2  justify-center ">
                <label for="prenom" class="FP-Menu ml-2 mx-4 p-2" >Prenom <span></span></label>
                <input type="text" name="prenom"  class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
            </div>

            <div class="flex flex-row mx-4 my-4 md:w-1/3  justify-center">
                <label for="email" class="FP-Menu ml-2 p-2 justify-center" >Email <span class="mr-1"></span></label>
                <input type="email" name="email"  class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required >
            </div>

            <div class="flex flex-row mx-4 my-4 md:w-1/2 justify-center  ">
                <label for="telephone" class="FP-Menu ml-2 p-2" >Télephone</label>
                <input type="text" name="telephone" class="border-2  p-2  focus:outline-none focus:border-2 focus:border-blue-400 rf" required>
            </div>


            <div class="flex flex-row mx-4 my-4 md:w-1/3  ">
                <label for="n_societe" class="FP-Menu ml-2 py-2  " >Nom société <span class="ml-2"></span></label>
                <input type="text" name="n_societe"  class=" border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
            </div>

            <div class="flex flex-row mx-4 my-4  md:w-1/2  justify-center">
                <label for="address" class="FP-Menu ml-2 p-2" >Address</label>
                <input type="text" name="address"  class=" border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required >

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
