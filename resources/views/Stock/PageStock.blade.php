@extends('PageStatic.Dashboard')

@section('page_titre')
    Stock
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
        <img src="Icons/ajouter-le-fichier.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
        <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300"><a href="{{route('AjouterProduit')}}">Ajouter Produit</a></h3>
    </div>

    <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10">
        <img src="Icons/categories.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
        <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300" onclick="Pop()" ><a onclick="Pop()">Ajouter Catégorie</a></h3>
    </div>

    <div class="p-5 border-2 border-black  rounded-lg flex flex-col justify-center items-center m-10 ">
        <img src="Icons/trait.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer">
        <h3 class="FP-Menu bg-indigo-200 p-2 rounded-md cursor-pointer hover:bg-indigo-300"><a href="{{route('ListeProduit')}}">Liste Produits</a></h3>
    </div>



</div>

<div class="Pop hidden  absolute bg-indigo-50 p-10 top-32  shadow-2xl flex flex-col justify-center items-center " style="width: 400px">

    <div class="static flex flex-col justify-center items-center w-full">

    <img src="Icons/trait.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer" style="" >
    <h3 class="FP-Menu m-2 ">Ajouter une catégorie</h3>
    </div>
    <div class="w-full">

        <form action="{{ route('Add_Categorie') }}" method="post" >

            @csrf
            @method('post')


            <div class="flex flex-row p-3 flex-wrap justify-center  ">
                <div class="flex flex-row mx-4 my-4 w-full justify-center">
                    <label for="categorie" class="FP-Menu ml-2 p-2 justify-center " >Catégorie<span class="mx-1"></span></label>
                    <input type="text" name="categorie" id="nom" class="border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " >
                </div>


                <div class="flex flex-row mx-4 my-4 w-full ">
                    <label for="description" class="FP-Menu ml-2 py-2  " >Description<span class="ml-2"></span></label>
                    <input type="text" name="description"  class=" border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " >
                </div>

            </div>


            <div class="flex justify-center mb-4">
                <div class="flex justify-between  mt-4  w-full">

                    <button type="submit" class="FP-Menu bg-indigo-200 p-3 rounded-sm hover:bg-[#ADD8E6]">Ajouter </button>
                    <a onclick="PopR()" class="FP-Menu bg-indigo-200 p-3 rounded-sm hover:bg-red-400 hover:cursor-pointer">Annuler </a>


                </div>
            </div>


        </form>

    </div>
</div>
</div>


@endsection
