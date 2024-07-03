
<!--Entete (Structure de base)-->

    <div class="flex flex-row h-full w-full bg-[#F1F5F9]">

        <div class="hC hidden md:block min-h-screen bg-[#212B36] w-64 shadow-ld" id="Personalise">

            <div class=" sm:hidden md:block text-white px-4 cursor-pointer">

                <h2 class="FP-titre py-4 text-lg cursor-pointer">CRA & Fils</h2>

                <div class="flex flex-row h-5 w-5 mb-5 mt-3">

                    <img src="image/maison.png" alt="dashboard" class="mr-2">

                    <h2 class="FP-Menu hover:text-indigo-500" ><a href="{{route('Dashboard')}}">Dashboard</a></h2>

                </div>

                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/panier.png" alt="Vente" class="mr-2">

                   <a href="{{route('PageVente')}}"> <h2 class="FP-Menu Menu hover:text-indigo-500">Vente</h2></a>

                    
                </div>


                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/produit.png" alt="Produit" class="mr-2" onclick="Activez()" >

                    <h2 class="FP-Menu Menu hover:text-indigo-500" onclick="Activez()">Produit</h2>

                    <i  class="principale" onclick="Activez()" ><img src="image/bas.png" alt="" class="ml-10 mt-1 h-5 w-5 cursor-pointer" ></i>
                    <i onclick="Desactivez()" class="secondaire hidden " ><img src="image/haut.png" alt="" class="ml-10 mt-1 h-5 w-5 cursor-pointer " ></i>

                </div>

                


                <div class="flex flex-row  mb-5 mt-3  cursor-pointer R1 hidden">
                    <img src="image/ajouter.png" alt="ListeProduit" class="mr-2 ml-3 h-5 w-5">

                   <a href="{{route('ListeProduit')}}"><h2 class="FP-Menu Menu hover:text-indigo-500" id="">Liste Produits</h2></a> 

                </div>
                <div class="flex flex-row  mb-5 mt-3 cursor-pointer A1 hidden">
                    <a href="{{route('AjouterProduit')}}"><img src="image/ajouter.png" alt=""   class="mr-2 ml-3 h-5 w-5"></a>

                    <h2 class="FP-Menu Menu " id="S_Menuv" ><a href="{{route('AjouterProduit')}}">Ajouter</a></h2>

               </div>
               



                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/impression1.png" alt="Impression" onclick="Activeez()" class="mr-2 h-5 w-5">

                    <h2 class="FP-Menu hover:text-indigo-500" onclick="Activeez()">Impression</h2><!--Faux format & Factures normaliser-->

                    <i  class="principales" onclick="Activeez()" ><img src="image/bas.png" alt="" class="ml-10 mt-1 h-5 w-5 cursor-pointer" ></i>
                    <i onclick="Desactiveez()" class="secondaires hidden " ><img src="image/haut.png" alt="" class="ml-10 mt-1 h-5 w-5 cursor-pointer " ></i>

                </div>

               


                <div class="flex flex-row  mb-5 mt-3  cursor-pointer R11 hidden">
                   <a href="{{route('proforma')}}"><img src="image/ajouter.png" alt="" class="mr-2 ml-3 h-5 w-5"></a> 

                    <a href="{{route('proforma')}}"><h2 class="FP-Menu Menu hover:text-indigo-500" id="">Pro Format</h2></a>

                </div>
                <div class="flex flex-row  mb-5 mt-3 cursor-pointer A11 hidden">
                    <img src="image/ajouter.png" alt="" class="mr-2 ml-3 h-5 w-5">

                    <h2 class="FP-Menu Menu hover:text-indigo-500 " id="S_Menuv"><a href="{{route('normaliser')}}">Ratachée Normaliser </a> </h2>

                </div>
               <div class="flex flex-row  mb-5 mt-3 cursor-pointer A12 hidden">
                    <img src="image/ajouter.png" alt="facture_simple" class="mr-2 ml-3 h-5 w-5">

                    <h2 class="FP-Menu Menu hover:text-indigo-500" id=""><a href="{{route('facture_simple')}}">Facture Hors taxe </a> </h2>

                </div>

               

                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/revoir.png" alt="Client" class="mr-2">
        
                    <h2 class="FP-Menu Menu hover:text-indigo-500"><a href="{{ route('section_client')}}">Client</a></h2>
        
                 </div>
                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/dette.png" alt="" class="mr-2">
        
                    <h2 class="FP-Menu Menu hover:text-indigo-500"><a href="{{route('PageCreancier')}}">Creancier</a></h2>
        
                    
                </div>
                 

           
             

                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer cursor-pointer">

                    <img src="image/compta.png" alt="" class="mr-2 ">

                    <h2 class="FP-Menu hover:text-indigo-500"> <a href="{{ route('Comptability')}}">Comptabilité</a> </h2>

                </div>

                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/statistique.png" alt="" class="mr-2">

                    <h2 class="FP-Menu hover:text-indigo-500"><a href="{{ route('Statistique')}}">Statistique</a> </h2>

                </div>

                <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/temps-passe.png" alt="" class="mr-2">

                    <h2 class="FP-Menu hover:text-indigo-500"><a href="{{ route('Historique')}}">Historique</a> </h2>

                </div>

                 <div class="flex flex-row h-5 w-5 mb-5 mt-3 cursor-pointer">

                    <img src="image/utilisateur.png" alt="Profil" class="mr-2 w-8">

                    <h2 class="FP-Menu hover:text-indigo-500"><a href="{{route('Profil')}}">Profil</a> </h2>

                </div>
            </div>


        </div>
        
        <div class="flex flex-col w-full">

            <nav class="flex bg-white h-16 w-full shadow-lg justify-between" >

                <div class="flex mt-2">

                    <div class="flex h-5 w-5 mb-5 mt-3 items-center">

                        <img src="Icons/menu-burger.svg" onclick="ActiveHeader()" alt="menu-burger" class="hA ml-3 mr-10 cursor-pointer">
                        <img src="Icons/menu-burger.svg" onclick="DesactiveHeader()" alt="menu-burger" class="hD hidden ml-3 mr-10 cursor-pointer">

                          <!--Formulaire-->
                        <div>

                        <div   class="hidden md:block">
                            
                            <input type="text" placeholder="Rechercher" class="Search-reference shadow-lg border-2 rounded-lg p-2 border-indigo-500/50 w-60 focus:outline-none focus:border-indigo-500/100" >
                            <script>
                               
                                var search = document.querySelector('.Search-reference');
                                var reference = search.value;
                                search.addEventListener('keypress', function(event)
                                 {
                                // Vérifie si la touche appuyée est la touche "Entrée" (code 13)
                                if (event.keyCode === 13) {
                                   
                                    window.location.href = '/liste_produit';

                                    const elment = document.querySelector('.searchInput');

                                    elment.value = reference;

                                    $('#searchForm').submit();
                                   
                                  
                                   // alert('La touche Entrée a été pressée !');
                                }
                                 });
                             
                               
                            </script>
                        </div>
                        </div>
                    </div>



                </div>
                <div class="hidden lg:flex lg:flex-row space-x-10 mr-20  mb-5 mt-3 items-center">

                        <!--Notification-->

                        <div class="bg-[#CDD0D4]  rounded-full w-10 h-10 flex items-center">

                        <img src="Icons/bell-regular.svg" alt="Notification" class="ml-3 mr-10 cursor-pointer w-4 h-4">

                        </div>

                        <!---Message-->

                        <div class="bg-[#CDD0D4] rounded-full w-10 h-10 flex items-center ">

                        <img src="Icons/envelope-regular.svg" alt="-Message" class="ml-3 mr-10 cursor-pointer w-4 h-4">

                        </div>


                        <!---Profil-->

                        <div class="bg-[#CDD0D4] rounded-full w-10 h-10 ">

                            <img src="image/ll.png" alt="clock" class="mt-3 ml-3 mr-10 cursor-pointer w-4 h-4">


                        </div>

                        <!---time-->

                        <div>
                            <p class="FP-Menu Times text-blue-400" id="current-time">Time:</p>
                        </div>
                 </div>


             </nav>

            <div>
                <div class="hidden mt-10" id="errors">

                    <div class="p-3 absolute bg-white m-2 right-0 mr-10 text-base">


                        <li class="text-red-500 FP-error Message"></li>

                    </div>

                </div>
                @if(Session::has('success'))

                <div class="p-3 absolute bg-white m-2 right-0 mr-10">


                    <p class="Success_result flex flex-row text-[#32BEA6] FP-succes sm-rounded">
                        <img src="Icons/verifier.png" alt="" class="mx-2">
                        {{ Session::get('success') }}
                    </p>

                    <script>
                       // Sélectionnez l'élément où l'heure sera affichée
                        const currentTimeElement = document.getElementById('current-time');

                        // Fonction pour mettre à jour l'heure
                        function updateTime() {
                            const now = new Date();
                            const hours = now.getHours().toString().padStart(2, '0');
                            const minutes = now.getMinutes().toString().padStart(2, '0');
                            const seconds = now.getSeconds().toString().padStart(2, '0');
                            const timeString = `${hours}:${minutes}:${seconds}`;
                            currentTimeElement.textContent = timeString;
                        }

                        // Mettre à jour l'heure initiale
                        updateTime();

                        // Mettre à jour l'heure toutes les secondes
                        setInterval(updateTime, 1000);

                        setTimeout(() => {

                            var success = document.querySelector('.Success_result');

                            success.classList.add('hidden');

                        }, 10000);
                    </script>


                </div>

                @endif
                @if ($errors)




                    @foreach ($errors ->all()  as $error )

                        <div class="p-3 absolute bg-white m-2 right-0 mr-10">


                                <li class="text-red-300 FP-error"> {{ $error}}</li>

                        </div>



                    @endforeach

                @endif
                

            
                
                @yield('page')
             </div>
            </div>

            <script>
                // Sélectionnez l'élément où l'heure sera affichée
                 const currentTimeElement = document.getElementById('current-time');

                 // Fonction pour mettre à jour l'heure
                 function updateTime() {
                     const now = new Date();
                     const hours = now.getHours().toString().padStart(2, '0');
                     const minutes = now.getMinutes().toString().padStart(2, '0');
                     const seconds = now.getSeconds().toString().padStart(2, '0');
                     const timeString = `${hours}:${minutes}:${seconds}`;
                     currentTimeElement.textContent = timeString;
                 }

                 // Mettre à jour l'heure initiale
                 updateTime();

                 // Mettre à jour l'heure toutes les secondes
                 setInterval(updateTime, 1000);

                
             </script>










</div>






