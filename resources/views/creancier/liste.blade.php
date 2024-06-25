@extends("PageStatic.Dashboard")
@section("page_titre")
Liste créanciers
@endsection
@section("page")
@if ($errors)




        @foreach ($errors ->all()  as $error )

           <div class="p-3 absolute bg-white m-2 right-0 mr-10">


                <li class="text-red-300 FP-error"> {{ $error}}</li>

            </div>



        @endforeach







@endif
<div class="container p-10 h-full ">

  

    <div class="bg-white rounded-sm mt-10 flex flex-col sm:h-full ">
 
    <div class="flex justify-center mt-4 text-indigo-400 ">
     <h2 class="FP-Menu ">Liste des créanciers</h2>
    </div>
    <div class="flex flex-row justify-center w-full p-2 mt-4 grid gap-x-2  grid-cols-2">

    
        
    </div>

 
    
   <div class="mt-5 flex justify-center w-full " style="min-width: 400px">
      <table class="border-separate border border-slate-300 hidden md:block">
          <thead>
              <tr class="bg-[#F8FAFC]">
               <th class=" FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Nom 
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Prénom
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Montant dû
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Email
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Numero
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Société
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                  Address
               </th>
               <th class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6">
                 Historique
               </th>
             </tr>
          </thead>
          @forelse ($Creanciers as $Creancier )
          <tbody>
             <tr>
                <td class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6 ">
                   {{$Creancier->client->nom}} 
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6 ">
                  {{$Creancier->client->prenom}} 
                </td>
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3  md:px-6 text-blue-400">
                  {{$Creancier->montant}} FCFA
                </td>
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                  {{$Creancier->client->email}} 
                </td>
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                  {{$Creancier->client->telephone}} 
                </td>
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                  @if($Creancier->client->n_societe != null)
                  {
                     {{$Creancier->client->n_societe}}
                  }@else
                  
                     ---
                  
                  @endif
                </td>
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                  {{$Creancier->client->address}} 
                </td>
                <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                 <a href="{{route('details_creancier',['id'=>$Creancier->id])}}"><img src="image/dettes.png" class="w-10 h-10" alt=""></a> 
                </td>
                
             </tr>
          </tbody>
         

          @empty

          @endforelse
          
         
         
      </table>
  </div>
   
      
   
 
     
 
    </div>
 </div>
@endsection