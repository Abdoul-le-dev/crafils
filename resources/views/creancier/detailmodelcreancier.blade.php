@extends('PageStatic.Dashboard')

@section('page_titre')
   Détails creancier
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
    <div class="bg-white rounded-md   mt-10 flex flex-col  justify-center items-center " style="min-height: 60vh">
        <div class="flex flex-row mt-10 mx-10  p-2 justify-between ">

           <div>
            <h1 class="FP-error mr-2 font-bold mx-10 text-black">

                @if($client->n_societe != null)
                {
                    Détails des dettes de la sociéte: <span class="class="text-blue-400""> {{$client->n_societe}}</span>

                }
                @else
                Détails des dettes du client: <span class="text-blue-400">{{$client->nom}} {{$client->prenom}}</span> 
                @endif
               
            </h1>
           </div>
           <div>

            <h1 class="FP-error mr-2 font-bold mx-10 text-black">

                Total dettes: <span class="text-blue-400">{{$client->totalDette($client->id)}} FCFA</span>
               
            </h1>

           </div>

        </div>
        <div class="flex flex-row mt-2 mx-10  p-2 justify-between ">

            
            
            <table class="border-separate border border-slate-300 hidden md:block mx-10">
                <thead>
                    <tr class="">
                     
                     <th class="FP-error  text-base font-thin border border-slate-300 py-3 md:px-6">
                        Date d'achat
                     </th>
                     <th class="FP-error  text-base font-thin border border-slate-300 py-3 md:px-6">
                        N° facture
                     </th>
                     <th class="FP-error text-base font-thin border border-slate-300 py-3 px-6">
                        Prix total facture
                     </th>
                     
                     <th class="FP-error  text-base font-thin border border-slate-300 py-3 px-6">
                       Montant payer
                     </th>
                     <th class="FP-error  text-base font-thin border border-slate-300 py-3 px-6">
                        Montant restant a solder
                      </th>
                   </tr>
                </thead>
               
    
    
               @foreach ( $client_tracability as $creancier)

               <tbody>
                <tr>
                  
                   
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8">
                    {{$creancier->created_at}}
                   </td>
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3  text-blue-400 md:px-8">

                    {{$creancier->numero_facture}}
                    
                   </td>
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8 text-green-400">
                     
                    {{$creancier->Facture_montant_total($creancier->numero_facture)}} FCFA
                   </td>
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8 text-blue-300">
                   
                    {{$creancier->Facture_montant_payer($creancier->numero_facture)}} FCFA
                   
                   </td>
                   <td class="FP-Menu text-sm font-thin border border-slate-300 py-3 md:px-8 text-red-400">
                     
                    {{$creancier->montant_du}} FCFA
                   
                   </td>
                  
 
                </tr>
               </tbody>
                   
               @endforeach
                
    
            </table>
        </div>

        <div class="flex flex-row mt-10 mx-10  p-2 justify-center ">

           <button class="FP-error bg-indigo-200 p-2 rounded-lg my-4 hover:bg-red-400"> Retour</button>

   
   
        </div>

    </div>   
</div> 
@endsection