@extends('PageStatic.Dashboard')

@section('page')

<div class="container p-10">
   
    <div class="mt-6 bg-white min-h-[300px] p-4">
        
        <div class="flex justify-center p-2 mb-2">
            <h1 class="FP-Menu">Factures Normalisées</h1>
        </div>
        <div class="p-3 ml-5 flex flex-row">

            
            <form action="" method="post">
                @csrf
                <label for="num-facture" class="FP-Menu">Numero Facture</label>
                <input type="number" class="Recherchefacture border-2 border-indigo-500/50 p-2 rounded-lg focus:outline-none focus:border-indigo-500/100 w-60 FP-error" placeholder="Rechercher">
                <input type="number" class="hidden type" value="3">
            </form>
        </div>


       <div class="Contenu">
        
        @foreach ($derniere_facture as $facture )

       <div class="flex flex-row p-5 m-5  align-center bg-stone-300 justify-between">
           
            <div class="flex flex-row ">
                   <h3 class="flex flex-row FP-error m-2"><img src="Icons/play.png"  alt="">
                    <span>N°</span> {{$facture->num_factures}}
                    </h3>
                   <h3 class="FP-error m-2"><span class="">Client-</span>{{$facture->client_anonyme}}
                    

                    @if ($facture->client_id !=null )
                    {{$facture->client->nom }}-{{$facture->client->n_societe }}

                    

                    @else

                    {{$facture->client_anonyme }}
                   
                
                    @endif
                </h3>
                   
            </div>

           <div class="flex flex-row " >

               

                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a href="{{route('details',['numero_facture'=>$facture->num_factures]) }}" class="details{{$facture->num_factures}} FP-error pointer">Détails</a>
                </button>

                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a href="{{ route('visualiser',['numero_facture'=>$facture->num_factures])}}" class="FP-error pointer">Visualiser</a>
                </button>
                <button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white">
                    <a href="{{ route('visualisers',['numero_facture'=>$facture->num_factures])}}" class="FP-error pointer">Visualiser et télecharger</a>
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
       
            
        @endforeach 
       </div>

       

       <div class="next-contenu hidden flex p-5 mt-8 justify-center align-center">

            <h3 class="FP-error  text-red-400">Auccune facture trouvé</h3>

       </div>
       <div class="Contenu_search">

       
       </div>

         
        


    </div>

</div>




@endsection