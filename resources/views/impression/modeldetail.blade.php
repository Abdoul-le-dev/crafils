@extends('PageStatic.Dashboard')

@section('page')

<div class="Container py-8">

    <div class="min-h-[430px] bg-white m-10 ">

       <div class="flex justify-center p-4 ">
         <h1 class="FP-Menu"> Détails facture</h1>

       </div>
       @foreach ( $donne_facture as $item )
           
      
        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

                <div class=" flex flex-row mx-10 ">
                    <p class="FP-error mr-2 font-bold">Numéro Facture:</p> <span class="FP-error">{{$item->num_factures}}</span>
                </div>

                <div class=" flex flex-row mx-10 ">
                    <p class="FP-error mr-2 font-bold">Type client:</p> 
                    
                        @if ($item->client_id !== null)
                        <span class="FP-error">Client enregistré   </span>
                        @else
                        <span class="FP-error">Client anonyme   </span>
                        @endif
                        
                </div>
                <div class=" flex flex-row mx-10">
                    <p class="FP-error mr-2 font-bold">Nom du client:</p> <span class="FP-error">{{$item->client_anonyme}}</span>
                </div>

        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

            <div class=" flex flex-row mx-10 ">
                <p class="FP-error mr-2 font-bold">Type de règlement:</p> <span class="FP-error">{{$item->type_reglement}}</span>
            </div>
            <div class=" flex flex-row mx-10 ">
                <p class="FP-error mr-2 font-bold">Type de facture:</p> <span class="FP-error">{{$item->type_facture}}</span>
            </div>
            <div class=" flex flex-row mx-10">
                <p class="FP-error mr-2 font-bold">Total:</p> <span class="FP-error">{{$item->total}} produits</span>
            </div>
        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

            <div class=" flex flex-row mx-10">
                <p class="FP-error mr-2 font-bold">Date d'enregistrement:</p> <span class="FP-error">{{$item->created_at}}</span>
            </div>
            <div class=" flex flex-row ">
                <p class="FP-error mr-2 font-bold">Dernière date de modification:</p> <span class="FP-error">{{$item->updated_at}}</span>
            </div>
            <div class=" flex flex-row ">
                <p class="FP-error mr-2 font-bold">Signature du personnel:</p> <span class="FP-error">M mirabel</span>
            </div>

   
   
        </div>
        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

            <h1 class="FP-error mr-2 font-bold mx-10 text-black">Liste des produits</h1>

        </div>
        <div class="flex flex-row mt-2 mx-10  p-2 justify-between ">

            
            
            <table class="border-separate border border-slate-300 hidden md:block mx-10">
                <thead>
                    <tr class="">
                     
                     <th class="FP-error  text-base font-thin border border-slate-300 py-3 md:px-6">
                        N° Référence
                     </th>
                     <th class="FP-error text-base font-thin border border-slate-300 py-3 px-6">
                        Prix produit
                     </th>
                     
                     <th class="FP-error  text-base font-thin border border-slate-300 py-3 px-6">
                        Quantité 
                     </th>
                   </tr>
                </thead>
               
    
    
               @foreach ( $produits as $produit)

               <tbody>
                <tr>
                  
                   
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                    {{ $produit->produit->reference}}
                   </td>
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3  text-blue-400 md:px-8">

                    {{ $produit->produit->prix}}
                   </td>
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                     
                    {{$produit->quantite}}
                   </td>
                  
 
                </tr>
               </tbody>
                   
               @endforeach
                
    
            </table>
        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-center ">

           <button class="FP-error bg-indigo-200 p-2 rounded-lg my-4 hover:bg-red-400"> Retour</button>

   
   
        </div>

        @endforeach    
      

   
    </div>


    </div>

</div>

@endsection