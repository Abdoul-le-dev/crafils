@extends('PageStatic.Dashboard')

@section('page')

<div class="Container py-8">

    <div class="min-h-[430px] bg-white mx-10 ">

       <div class="flex justify-center p-4 ">
         <h1 class="FP-Menu"> Détails facture</h1>

       </div>
       @foreach ( $donne_facture as $item )
           
      
        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

                <div class=" flex flex-row mx-10 ">
                    <p class="FP-error mr-2 text-base font-bold text-blue-400">Numéro Facture:</p> <span class="FP-error text-yellow-400">{{$item->num_factures}}</span>
                </div>

                <div class=" flex flex-row mx-10 ">
                    <p class="FP-error mr-2 text-base font-bold text-blue-400">Type client:</p> 
                    
                        @if ($item->client_id !== null)
                        <span class="FP-error">Client enregistré   </span>
                        @else
                        <span class="FP-error">Client anonyme   </span>
                        @endif
                        
                </div>
                <div class=" flex flex-row mx-10">
                    <p class="FP-error mr-2 text-base font-bold text-blue-400">Nom du client:</p> <span class="FP-error">{{$item->client_anonyme}}</span>
                </div>

        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

            <div class=" flex flex-row mx-10 ">
                <p class="FP-error mr-2 text-base font-bold text-blue-400">Type de règlement:</p> <span class="FP-error text-black">{{$item->type_reglement}}</span>
            </div>
            <div class=" flex flex-row mx-10 ">
                <p class="FP-error mr-2 text-base font-bold  text-blue-400">Type de facture:</p> <span class="FP-error">
                    
                    @if($item->type_facture == 1 && $item->normaliser ===0)
    
                        Proforma
                        @endif
                        @if($item->type_facture == 2 && $item->normaliser ===0)
    
                        Facture Hors Taxe
                        
                        @endif
                        @if($item->normaliser ===1)
    
                        Ratachée Normalisé
                        @endif
                    
                    </span>
            </div>
            <div class=" flex flex-row mx-10">
                <p class="FP-error mr-2 text-base font-bold text-blue-400">Total:</p> <span class="FP-error">{{$item->total}} produits</span>
            </div>
        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

            <div class=" flex flex-row mx-10">
                <p class="FP-error mr-2  text-base font-bold text-blue-400">Date d'enregistrement:</p> <span class="FP-error">{{$item->created_at}}</span>
            </div>
            <div class=" flex flex-row ">
                <p class="FP-error mr-2  text-base font-bold text-blue-400">Dernière date de modification:</p> <span class="FP-error">{{$item->updated_at}}</span>
            </div>
            <div class=" flex flex-row ">
                <p class="FP-error mr-2  text-base font-bold text-blue-400">Signature du personnel:</p> <span class="FP-error">{{$item->UserName($item->user_id)}}</span>
            </div>

   
   
        </div>
        <div class="flex flex-row mt-10 mx-10  p-2  ">

            <div class="w-1/2">
                <h1 class="FP-error mr-2 font-bold mx-10 text-black">Liste des produits</h1>
            </div>
            @if($item->type_facture == 2 || $item->normaliser ===1)
            <div>
                <h1 class="FP-error mr-2 font-bold mx-10 text-black">Historique de règlements</h1>
            </div>
            @endif
            

        </div>
        <div class="flex flex-row   ">
            <div class="flex flex-row mt-2 w-1/2    p-2 justify-between ">

            
            
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

            
            @if($item->type_facture == 2 || $item->normaliser ===1)

            
           

            <div class="flex flex-row mt-2  p-2 justify-between ">

            
            
                <table class="border-separate border border-slate-300 hidden md:block mx-10">
                    <thead>
                        <tr class="">
                         
                         <th class="FP-error  text-base font-thin border border-slate-300 py-3 md:px-6">
                            Total TTC
                         </th>
                         <th class="FP-error text-base font-thin border border-slate-300 py-3 px-6">
                            Total payer
                         </th>
                         
                         <th class="FP-error  text-base font-thin border border-slate-300 py-3 px-6">
                            Due
                         </th>
                       </tr>
                    </thead>
                   
        
        
                  
    
                   <tbody>
                    <tr>
                      
                       
                       <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                        {{$item->montant_facture}}
                       </td>
                       <td class="FP-Menu text-sm font-thin border border-slate-300 py-3  text-blue-400 md:px-8">
    
                        {{$item->total_payer}}
                       </td>
                       <td class="FP-Menu text-sm text-red-400 font-thin border border-slate-300 py-3 md:px-8">
                         
                        {{$item->Due($item->montant_facture,$item->total_payer)}} Fcfa
                        
                       </td>
                      
     
                    </tr>
                   </tbody>
                       
                   
                    
        
                </table>
            </div>
            @endif
        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-center ">

           <a href="{{route('ReturnBack')}}" class="FP-error bg-indigo-200 p-3 rounded-lg my-4 hover:bg-red-500"> Retour</a>

   
   
        </div>

        @endforeach    
      

   
    </div>


    </div>

</div>

@endsection