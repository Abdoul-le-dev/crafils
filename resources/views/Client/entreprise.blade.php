@extends('PageStatic.Dashboard')


@section('page')




<div class="container p-10 ">



   <div class="bg-white rounded-sm mt-10 flex flex-col sm:h-full ">

   <div class="flex justify-center mt-4 text-indigo-600 ">
    <h2 class="FP-Menu ">Enregistrement entreprise(société)</h2>
   </div>

   @if ($errors)

    @foreach ($errors ->all()  as $error )


        <div class="flex flex-col  ml-20 p-5   ">
            <li class="text-red-300 FP-error"> {{ $error}}</li>
        </div>


    @endforeach

    @endif

    <form action="{{ route('Ajout_entreprise') }}" method="post" >

        @csrf
        @method('post')




        <div class="flex flex-row p-3 flex-wrap justify-center  ">
            <div class=" flex flex-col mx-4 my-4 md:w-1/3  justify-center">
                <div class="flex flex-row   justify-center">
                    <label for="nom" class="FP-static ml-2 p-2 justify-center " >Nom société <span class="mx-1"></span></label>
                    <input type="text" name="n_societe" id="n_societe" placeholder="nom de l'entreprise" class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
                </div>



            </div>

            <div class="flex flex-row mx-4 my-4 md:w-1/2  justify-center ">
                <label for="num_ifu" class="FP-static ml-2 mx-4 p-2" >Numero IFU<span></span></label>
                <input type="text" name="num_ifu" id="num_ifu" placeholder="Veuillez entrez le numero ifu" class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required>
            </div>

            <div class="flex flex-row mx-4 my-4 md:w-1/3  justify-center">
                <label for="email" class="FP-static ml-2 p-2 justify-center" >Email <span class="mr-1"></span></label>
                <input type="email" name="email" placeholder="Veuillez entrez l'email"  class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required  >
            </div>

            <div class="flex flex-row mx-4 my-4 md:w-1/2 justify-center  ">
                <label for="telephone" class="FP-static ml-2 p-2" >Télephone</label>
                <input type="text" name="telephone" id="quantite" placeholder="Veuillez entrez le numéro" class="Fp-error border-2  p-2  focus:outline-none focus:border-2 focus:border-blue-400 rf" required>
            </div>


            <div class="flex flex-row mx-4 my-4 md:w-2/3  ">
                <label for="n_societe" class="FP-static ml-2 py-2  " >RCCM<span class="ml-2"></span></label>
                <input type="text" name="RCCM" id="RCCM"  class=" border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " placeholder="Veuillez entrez le RCM" >
            </div>

            <div class="flex flex-row mx-4 my-4  md:w-1/2  justify-center">
                <label for="address" class="FP-static ml-2 p-2" >Address client</label>
                <input type="text" name="address" id="address"   class=" border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required placeholder="Veuillez entrez l'address" >

            </div>



        </div>


        <div class="flex justify-center mb-4">
            <div class="flex justify-between  mt-4  w-1/3 ">

                <button type="submit" class="FP-static bg-indigo-200 p-3 rounded-sm hover:bg-[#ADD8E6]">Ajouter </button>
                <a href="{{ route('section_client')}}" class="FP-static bg-indigo-200 p-3 rounded-sm hover:bg-red-400">Annuler </a>


            </div>
        </div>


    </form>






   </div>
</div>


@endsection
