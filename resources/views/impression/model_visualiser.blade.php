<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="jquery/jquery.js"></script>
    <script src="js/dashbord.js"></script>
    <script src="js/finalisationVente.js"></script>
    <script src="js/facture.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js" integrity="sha512-pdCVFUWsxl1A4g0uV6fyJ3nrnTGeWnZN2Tl/56j45UvZ1OMdm9CIbctuIHj+yBIRTUUyv6I9+OivXj4i0LPEYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
</head>
<body class=" bg-white flex flex-col  items-center element">
    
   
        
    
        
    <div class="py-10    h-[160vh]  bg-white m-10 flex flex-col">

        <div class="flex flex-row justify-between ">
            <div>
                <img src="./image/Cra.png" alt="" class="w-48 ">
                <p class="FP-titre hidden">Votre Partenaire Fidel</p>
            </div>
            <div class="flex flex-col ">

                <p class=" FP-error text-xs"># Benin, Cotonou,Gbedjromede</p>
                <p class=" FP-error text-xs">Industrie automobile de pièces détachées</p>
                <p class="text-xs text-[#4287f5]  FP-error">Logistique | | 229 974 110 00</p>
                <P class=" FP-error text-[#4287f5]"><span>www.crafils.com </span><span class="text-black">-</span><span> contact@crafils.com</span></P>

            </div>
        </div>
        <div class="flex body flex-col  justify-center">
            <div class="mt-4  flex flex-row justify-between items-center p-8 ">

        
            
                <p class="FP-error"><span class="font-bold">Date: {{$date}}</span></p>
            
            
                
                <p class="FP-error"><span class="font-bold">
                    @if($donne_facture->type_facture == 1 && $donne_facture->normaliser ===0)

                   <span class="text-[#4287f5]"> Proforma:</span>
                    @endif
                    @if($donne_facture->type_facture == 2 && $donne_facture->normaliser ===0)

                    <span class="text-[#4287f5]">Facture ratachée</span>
                    
                    @endif
                    @if($donne_facture->normaliser ===1)

                   <span class="text-[#4287f5]">Rataché Facture Normaliser:</span>
                    @endif
                     </span>n°{{$donne_facture->num_factures}}
                </p>
            
                <p class="border-2 p-2 mx-4 border-[#4287f5] FP-error rounded-md namefacture"><span class="font-bold ">Client: </span> 
                    @if ($donne_facture->client_id != null)

                          

                        
                    @if ($donne_facture->num_ifu != null)

                    {{$donne_facture->client->n_societe}}

                    @else

                    {{$donne_facture->client->nom}}-{{$donne_facture->client->prenom}}

                    @endif

                @else 

                {{$donne_facture->client_anonyme}}


                @endif
                </p>
            
        
            </div>
        
            <div class="mt-2 flex  w-full lg:px-8 :t-8 " >
                <table class="border-separate   md:block ">
                    <thead>
                        <tr class="">
                        <th class=" text-base FP-error font-bold border border-slate-300 py-1 md:px-6 ">
                            Nom du produit
                        </th>
                        <th class=" text-base FP-error font-bold border border-slate-300 py-1 md:px-6">
                            N° Référence
                        </th>
                        <th class=" text-base  FP-error font-bold border border-slate-300 py-1 px-4">
                            Quantité
                        </th>
                        <th class="text-base FP-error font-bold border border-slate-300 py-1 px-4  min-w-20">
                            Prix unitaire
                        </th>
                        <th class=" text-base FP-error font-bold border border-slate-300 py-1 px-4 min-w-40">
                        Prix total
                        </th>
                        
                    </tr>
                    </thead>
                    @foreach ( $premiere as $produit )

                    <tbody>
                        <tr>
                        <td class="text-sm FP-error font-thin  border  border-slate-300 py-1 md:px-4 text-black-100">
                            {{ $produit->produit->nom}}
                        </td>
                        <td class="text-sm FP-error  font-thin border border-slate-300 py-1 md:px-4 text-blue-400">
                            {{ $produit->produit->reference}}
                        </td>
                        <td class="text-sm FP-error font-thin border border-slate-300 py-1 md:px-4">
                                {{ $produit->quantite}}
                        </td>
                        
                        <td class="text-sm FP-error font-thin border border-slate-300 py-1 md:px-4">
                                {{ $produit->produit->prix}}
                        </td>
                        <td class="text-sm FP-error font-thin border border-slate-300 py-3 md:px-8">
                                {{ $produit->total}}
                        </td>
                        
        
                        </tr>
                    </tbody>
                        
                    @endforeach

                    @if(isset($next_page))
                        @foreach ( $next_page as $produit )

                        <tbody>
                            <tr>
                            <td class="text-sm FP-error font-thin  border  border-slate-300 py-3 md:px-8 text-black-100">
                                {{ $produit->produit->nom}}
                            </td>
                            <td class="text-sm FP-error  font-thin border border-slate-300 py-3 md:px-8 text-blue-400">
                                {{ $produit->produit->reference}}
                            </td>
                            <td class="text-sm FP-error font-thin border border-slate-300 py-3 md:px-8">
                                    {{ $produit->quantite}}
                            </td>
                            
                            <td class="text-sm FP-error font-thin border border-slate-300 py-3 md:px-8">
                                    {{ $produit->produit->prix}}
                            </td>
                            <td class="text-sm FP-error font-thin border border-slate-300 py-3 md:px-8">
                                    {{ $produit->total}}
                            </td>
                            
            
                            </tr>
                        </tbody>
                            
                        @endforeach
                    @endif
                    
                    <tbody class="Tva">
                        
                        <tr class="">
                        
                        
                            <td class="">
                            
                            </td>
                            <td class="">
                            
                            </td>
                            <td class="text-base FP-error font-bold  bg-blue-400 py-3 px-2">
                                Prix Total Hors Taxe
                            </td>
        
                            <td class="text-base FP-error font-bold bg-blue-400 py-3 md:px-6   ">
                            TVA
                            </td>
                            <td class="text-base FP-error font-bold  bg-blue-400 py-3 md:px-4">
                                Prix Total TTC
                            </td>
                            
                            
        
                        </tr>
                    </tbody>
                    <tbody class="TvaS">
                        
                        <tr class="">
                        
                        
                            <td class="">
                            
                            </td>
                            <td class=" ">
                            
                            </td>
                            
                            <td class="text-base FP-error font-bold border border-slate-300 py-1 md:px-4 ">
                            {{ $tht}}
                            </td>
        
                            <td class="text-base FP-error font-bold py-3 md:px-4 border border-slate-300 py-1  ">
                                {{ $tva}}
                            </td>
                            <td class="text-base FP-error font-bold border border-slate-300 py-1 md:px-4">
                                {{ $ttc}} FCFA
                            </td>
                            
                            
        
                        </tr>
                    </tbody>
                
                    
        
                </table>
            
            
        
            </div>
        </div>
        
        
        <div class="secondpart mt-8 flex flex-row justify-end p-8 ">

                <div class="mr-[150px] flex flex-col ">
                    
                        @if($donne_facture->type_facture == 1 && $donne_facture->normaliser ===0)
    
                        
                        @endif
                        @if($donne_facture->type_facture == 2 && $donne_facture->normaliser ===0)
                        <p class=" FP-titre text-blue-400">  Total Payer: {{$donne_facture->total_payer}} FCFA</p>
                        <p class=" FP-titre text-base">
                            Montant Due : {{$donne_facture->Due($donne_facture->montant_facture,$donne_facture->total_payer)}} FCFA
                        
                        </p>
                        
            
                        @endif
                        @if($donne_facture->normaliser ===1)

                        <p class=" FP-titre text-blue-400">  Total Payer: {{$donne_facture->total_payer}} FCFA</p>
                        <p class=" FP-titre text-base">
                            Montant Due : {{$donne_facture->Due($donne_facture->montant_facture,$donne_facture->total_payer,$donne_facture->tva)}} FCFA
                        
                        </p>
    
                       
                        @endif
                         
                   
                </div>
            
                <div class="flex flex-col border-2 rounded-md border-[#4287f5] " >
                    <p class="text-xl FP-error font-bold text-[#4287f5]">Sté CRA & FILS</p>
                    <p class="text-sm FP-error font-bold  text-[#4287f5] flex justify-center">03 BP 4223 Cotonou Bénin</p>
                    <p class="text-sm FP-error font-bold text-[#4287f5]">Tèl:974 110 00/648 629 06</p>
                </div>
                <div>
                    <img src="image/sig.png" alt="" class=" h-20 z-index-0">
                </div>
            

        </div>

        <div class="flex flex-col mt-[50px] justify-center items-center troisiemepart ">

            <p class="FP-error text-xs mb-2 text-black">C/1090 Mininkpo Cotonou Tel: 97 41 10 00 64 86 29 06</p>
            <p class="FP-error text-xs mb-2 text-black">RCCM: RB/COT/16B 16829 || IFU: 3201642255315 || Email: rcaetfils@gmail.com</p>
            <p class="FP-error text-xs  text-black">Depuis 10 ans, qualité et prix compétitifs demeurent notre engagement pour vous satisfaire.</p>

        </div>



        
    </div>



    <div class="py-10 px-5 dixproduits h-[150vh]  bg-white m-10 flex flex-col hidden">

        <div class="mt-2 flex  w-full lg:px-8 :t-8 " >
            <table class="border-separate   md:block ">
                     <thead>
                        <tr class="">
                        <th class=" text-base FP-error font-bold border border-slate-300 py-1 md:px-6 ">
                            Nom du produit
                        </th>
                        <th class=" text-base FP-error font-bold border border-slate-300 py-1 md:px-6">
                            N° Référence
                        </th>
                        <th class=" text-base  FP-error font-bold border border-slate-300 py-1 px-4">
                            Quantité
                        </th>
                        <th class="text-base FP-error font-bold border border-slate-300 py-1 px-4  min-w-20">
                            Prix unitaire
                        </th>
                        <th class=" text-base FP-error font-bold border border-slate-300 py-1 px-4 min-w-40">
                        Prix total
                        </th>
                        
                    </tr>
                    </thead>
                @foreach ( $deuxieme_session as $produit )

                <tbody>
                    <tr>
                    <td class="text-sm FP-error font-thin  border  border-slate-300 py-1 md:px-4 text-black-100">
                        {{ $produit->produit->nom}}
                    </td>
                    <td class="text-sm FP-error  font-thin border border-slate-300 py-1 md:px-4 text-blue-400">
                        {{ $produit->produit->reference}}
                    </td>
                    <td class="text-sm FP-error font-thin border border-slate-300 py-1 md:px-4">
                            {{ $produit->quantite}}
                    </td>
                    
                    <td class="text-sm FP-error font-thin border border-slate-300 py-1 md:px-4">
                            {{ $produit->produit->prix}}
                    </td>
                    <td class="text-sm FP-error font-thin border border-slate-300 py-3 md:px-8">
                            {{ $produit->total}}
                    </td>
                    
    
                    </tr>
                </tbody>
                    
                @endforeach

                
                <tbody>
                    
                    <tr class="">
                    
                    
                        <td class="">
                        
                        </td>
                        <td class="">
                        
                        </td>
                        <td class="text-base FP-error font-bold  bg-blue-400 py-3 px-2">
                            Prix Total Hors Taxe
                        </td>
    
                        <td class="text-base FP-error font-bold bg-blue-400 py-3 md:px-6   ">
                        TVA
                        </td>
                        <td class="text-base FP-error font-bold  bg-blue-400 py-3 md:px-4">
                            Prix Total TTC
                        </td>
                        
                        
    
                    </tr>
                </tbody>
                <tbody>
                    
                    <tr class="">
                    
                    
                        <td class="">
                        
                        </td>
                        <td class=" ">
                        
                        </td>
                        
                        <td class="text-base FP-error font-bold border border-slate-300 py-1 md:px-4 ">
                        {{ $tht}}
                        </td>
    
                        <td class="text-base FP-error font-bold py-3 md:px-4 border border-slate-300 py-1  ">
                            {{ $tva}}
                        </td>
                        <td class="text-base FP-error font-bold border border-slate-300 py-1 md:px-4">
                            {{ $ttc}} FCFA
                        </td>
                        
                        
    
                    </tr>
                </tbody>
            
                
    
            </table>
        
        
    
        </div>

        <div class=" mt-8 flex flex-row justify-end p-8 ">

                <div class="mr-[150px] flex flex-col ">
                        
                    @if($donne_facture->type_facture == 1 && $donne_facture->normaliser ===0)

                    
                    @endif
                    @if($donne_facture->type_facture == 2 && $donne_facture->normaliser ===0)
                    <p class=" FP-titre text-blue-400">  Total Payer: {{$donne_facture->total_payer}} FCFA</p>
                    <p class=" FP-titre text-base">
                        Montant Due : {{$donne_facture->Due($donne_facture->montant_facture,$donne_facture->total_payer)}} FCFA
                    
                    </p>
                    
        
                    @endif
                    @if($donne_facture->normaliser ===1)

                    <p class=" FP-titre text-blue-400">  Total Payer: {{$donne_facture->total_payer}} FCFA</p>
                    <p class=" FP-titre text-base">
                        Montant Due : {{$donne_facture->Due($donne_facture->montant_facture,$donne_facture->total_payer,$donne_facture->tva)}} FCFA
                    
                    </p>

                
                    @endif
                    
            
                </div>
            
                <div class="flex flex-col border-2 rounded-md border-[#4287f5] " >
                    <p class="text-xl FP-error font-bold text-[#4287f5]">Sté CRA & FILS</p>
                    <p class="text-sm FP-error font-bold  text-[#4287f5] flex justify-center">03 BP 4223 Cotonou Bénin</p>
                    <p class="text-sm FP-error font-bold text-[#4287f5]">Tèl:974 110 00/648 629 06</p>
                </div>
                <div>
                    <img src="image/hi.png" alt="" class=" h-20 z-index-0">
                </div>
            

        </div>

        <div class="flex flex-col mt-[50px] justify-center items-center  ">

            <p class="FP-error text-base font-medium mb-2 text-black">C/1090 Mininkpo Cotonou Tel: 97 41 10 00 64 86 29 06</p>
            <p class="FP-error text-base font-medium mb-2 text-black ">RCCM: RB/COT/16B 16829 || IFU: 3201642255315 || Email: rcaetfils@gmail.com</p>
            <p class="FP-error text-base font-medium  text-black">Depuis 10 ans, qualité et prix compétitifs demeurent notre engagement pour vous satisfaire.</p>

        </div>

    </div>



    @if( $nombre == 1 )
        
    <script>
        //alert("e")
        var taille = document.querySelector('.body');

        taille.classList.add('h-[50vh]');
        taille.classList.add('mt-[30px]');

        var tailles = document.querySelector('.secondpart');

        tailles.classList.add('mt-[30px]');
        
    </script>
    @elseif ($nombre == 2)

    <script>
        //alert("e")
        var taille = document.querySelector('.body');

        taille.classList.add('h-[70vh]');
        taille.classList.add('mt-[30px]');

        var tailles = document.querySelector('.secondpart');

        tailles.classList.add('mt-[30px]');
        
    </script>

    @elseif ($nombre == 3)

    <script>
        //alert("e")
        var taille = document.querySelector('.body');

        taille.classList.add('h-[100vh]');
        taille.classList.add('mt-[80px]');
        taille.classList.add('z-10');

        var tailles = document.querySelector('.secondpart');

        tailles.classList.add('mt-[70px]');
        tailles.classList.add('z-0');

        var troisieme = document.querySelector('.troisiemepart');
        troisieme.classList.remove('mt-[50px]');
        troisieme.classList.add('mt-[10px]');
        
    </script>

    @elseif ($nombre == 4 )

    <script>
        //alert("e")
        var taille = document.querySelector('.body');

        taille.classList.add('h-[90vh]');
        taille.classList.add('mt-[20px]');
        taille.classList.add('z-10');

        var tailles = document.querySelector('.secondpart');

        tailles.classList.add('hidden');
        //tailles.classList.add('z-0');

        var troisieme = document.querySelector('.troisiemepart');
       // troisieme.classList.remove('mt-[50px]');
        troisieme.classList.add('hidden');

        var  dixproduits = document.querySelector('.dixproduits');
        dixproduits.classList.remove('hidden');
        dixproduits.classList.add('block');

        var Tva = document.querySelector('.Tva');
        Tva.classList.add('hidden');
        var TvaS = document.querySelector('.TvaS');
        TvaS.classList.add('hidden');
        
    </script>

    @elseif ( $nombre == 5 )

    <script>
        //alert("e")
        var taille = document.querySelector('.body');

        taille.classList.add('h-[100vh]');
        taille.classList.add('mt-[90px]');
        taille.classList.add('z-10');

        var tailles = document.querySelector('.secondpart');

        tailles.classList.add('hidden');
        //tailles.classList.add('z-0');

        var troisieme = document.querySelector('.troisiemepart');
     // troisieme.classList.remove('mt-[50px]');
        troisieme.classList.add('hidden');

        var  dixproduits = document.querySelector('.dixproduits');
        dixproduits.classList.remove('hidden');
        dixproduits.classList.add('block');

        var Tva = document.querySelector('.Tva');
        Tva.classList.add('hidden');
        var TvaS = document.querySelector('.TvaS');
        TvaS.classList.add('hidden');
        
    </script>

    @elseif ( $nombre == 6 )

    <script>
        //alert("e")
        var taille = document.querySelector('.body');

        taille.classList.add('h-[100vh]');
        taille.classList.add('mt-[90px]');
        taille.classList.add('z-10');

        var tailles = document.querySelector('.secondpart');

        tailles.classList.add('hidden');
        //tailles.classList.add('z-0');

        var troisieme = document.querySelector('.troisiemepart');
    // troisieme.classList.remove('mt-[50px]');
        troisieme.classList.add('hidden');

        var  dixproduits = document.querySelector('.dixproduits');
        dixproduits.classList.remove('hidden');
        dixproduits.classList.add('block');

        var Tva = document.querySelector('.Tva');
        Tva.classList.add('hidden');
        var TvaS = document.querySelector('.TvaS');
        TvaS.classList.add('hidden');
        
    </script>



    @endif

</body>

<script>
    // Sélection de l'élément HTML à convertir en PDF

    var element = document.querySelector('.element');
    // Récupération de la valeur du nom de la facture

   
    // Création d'une nouvelle instance de la date et de l'heure actuelle
    let now = new Date();

 
    var namefacture = document.querySelector('.namefacture').textContent.trim();
    namefacture = namefacture.replace(/Client/g, '').replace(/_/g, '').replace(/\s+/g, '');
    
    namefacture = namefacture + now.toISOString().slice(0, 10) + '.pdf';


   
    




    // Options pour la génération du fichier PDF
    var opt = {
        filename:namefacture , // Ajout de l'extension .pdf et formatage de la date
       // Correction de la syntaxe
    };

    // Ajout d'une classe à l'élément HTML (décommenté si nécessaire)
    // element.classList.add('bg-slate-300');

    // Génération et sauvegarde du PDF
    setTimeout(15000);
    html2pdf().set(opt).from(element).save();

   // element.classList.remove('bg-slate-300');
</script>
</html>