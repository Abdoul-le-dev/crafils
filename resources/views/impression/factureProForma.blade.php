@extends('PageStatic.Dashboard')

@section('page')

<div class="container p-10">
    <div class="w-full h-full flex flex-row justify-center items-center ">

        <div class="Pop hidden absolute bg-indigo-50 p-10 top-32  shadow-2xl flex flex-col justify-center items-center " style="width: 500px">

            <div class="static flex flex-col justify-center items-center w-full">

            <img src="Icons/trait.png" alt="" class="mr-2 ml-3 h-10 w-10 my-4 cursor-pointer" style="" >
            <h3 class="FP-error m-2 ">Normalisation  proformat</h3>
            </div>
            <div class="w-full">


                <form class="Normalisation" id="formulaire2"  >
                    @csrf
                    <div class="flex flex-row p-3 flex-wrap  ">
                        <div class="num_facture hidden">

                            <input type="text" id="inputId" class="mt-4 p-2 border rounded" placeholder="ID sera affiché ici" readonly>


                        </div>
                        <div class="flex flex-row   w-full justify-center">
                            <label class="p-2">
                                <input type="radio" name="client"  class="can" value="Client Anonyme" > <a class="FP-error text-xs" >Client Anonyme</a>
                            </label>

                            <label class="p-2">
                                <input type="radio" name="client" class="p-2 cen" value="Client Enregister"> <a class="FP-error text-xs">Client Enregister</a>
                            </label>



                        </div>

                        <div class="flex flex-row mt-2  w-full justify-center">
                            <label class="p-2">
                                <input type="radio" name="reglement" class="pfn" value="credit" > <a class="FP-error text-xs">A credit</a>
                            </label>

                            <label class="p-2">
                                <input type="radio" name="reglement" class="p-2 bln" value="tranche"> <a class="FP-error text-xs">En tranche</a>
                            </label>

                            <label class="p-2">
                                <input type="radio" name="reglement" class="p-2 fan" value="cash"> <a class="FP-error text-xs">Cash</a>
                            </label>

                        </div>

                        <div class="AddCa">

                        </div>

                    </div>


                    <div class="flex justify-center mb-4">
                        <div class="flex justify-between  mt-4  w-full">

                            <button type="submit" class="FP-error bg-indigo-200 p-3 rounded-sm hover:bg-[#ADD8E6]">Normaliser </button>
                            <a onclick="PopR()" class="FP-error bg-indigo-200 p-3 rounded-sm hover:bg-red-400 hover:cursor-pointer">Annuler </a>


                        </div>
                    </div>
                </form>




            </div>
        </div>

    </div>
    <div class="mt-6 bg-white min-h-[300px] p-4">
        
        <div class="flex justify-center p-2 mb-2">
            <h1 class="FP-Menu">Factures Proformat</h1>
        </div>
        <div class="p-3 ml-5 flex flex-row">

            
            <form action="" method="post">
                @csrf
                <label for="num-facture" class="FP-Menu">Numero Facture</label>
                <input type="number" class="Recherchefacture border-2 border-indigo-500/50 p-2 rounded-lg focus:outline-none focus:border-indigo-500/100 w-60 FP-error" placeholder="Rechercher">
                <input type="number" class="hidden type" value="1">
            </form>
        </div>


       <div class="Contenu">
        
        @forelse ($derniere_facture as $facture )

       <div class="flex flex-row p-5 m-5  align-center bg-stone-300 justify-between">
           
            <div class="flex flex-row ">
                   <h3 class="flex flex-row FP-error m-2"><img src="Icons/play.png"  alt="">
                    <span>N°</span> {{$facture->num_factures}}
                    </h3>
                   <h3 class="FP-error m-2"><span class="">Client-</span>{{$facture->client_anonyme}}
                    @if ($facture->client_id != null)

                    {{$facture->client->nom}}-{{$facture->client->n_societe}}
                        
                    @endif
                </h3>
                   
            </div>

           <div class="flex flex-row " >

                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white" id="{{$facture->num_factures}}">
                    <a href="{{ route('modifier_facture', ['numero_facture' =>$facture->num_factures])}}" class="FP-error pointer">Modifier la facture</a>
                </button>

                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a href="{{route('details',['numero_facture'=>$facture->num_factures]) }}" class="details{{$facture->num_factures}} FP-error pointer">Détails</a>
                </button>

                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a href="{{ route('visualiser',['numero_facture'=>$facture->num_factures])}}" class="FP-error pointer">Visualiser</a>
                </button>

                
                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a href="{{ route('visualisers',['numero_facture'=>$facture->num_factures])}}" class="FP-error pointer">Télecharger</a>
                </button>

               

                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a   onclick="Pops('{{ $facture->num_factures }}')" class="FP-error pointer">Normaliser la facture</a>
                </button>
                
               
            

           </div>
        </div>

        <script>
       




            var num = {{$facture->num_factures}};
            function formatNumber(num, length) {
                var str = '' + num;
                while (str.length < length) {
                    str = '0' + str;
                }
                return str;
            }
            num = formatNumber(num, 8);
            var num_detail = '.details'+ num ;
           
            var button_detail = document.querySelector(num_detail);

            if(button_detail !== null)
            {
                button_detail.addEventListener('click',function(e){
                alert('yes');
            })
            }
           

         
        </script>
        @empty

        <div class="next-contenu hidden flex p-5 mt-8 justify-center align-center">

            <h3 class="FP-error  text-red-400">Auccune facture trouvé</h3>

        </div>
       
            
        @endforelse 
       </div>

       

       <div class="next-contenu hidden flex p-5 mt-8 justify-center align-center">

            <h3 class="FP-error  text-red-400">Auccune facture trouvé</h3>

       </div>
       <div class="Contenu_search">

       
       </div>

         
        


    </div>

</div>




@endsection