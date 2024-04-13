@extends("PageStatic.Dashboard")
@section("page_titre")
Liste créanciers
@endsection
@section("page")

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
                    société
                 </th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="FP-Menu text-xs font-thin border  border-slate-300 py-3 md:px-6 ">
                     contenue
                  </td>
                  <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                     contenue
                  </td>
                  <td class="FP-Menu text-xs font-thin border border-slate-300 py-3  md:px-6">
                     contenue
                  </td>
                  <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                     contenue
                  </td>
                  <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                     contenue
                  </td>
                  <td class="FP-Menu text-xs font-thin border border-slate-300 py-3 md:px-6">
                     contenue
                  </td>
               </tr>
            </tbody>
            
           
           
        </table>
    </div>
 
     
 
    </div>
 </div>
@endsection