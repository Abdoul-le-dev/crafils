<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRA & Fils Facture</title>

    <link rel="stylesheet" href="/css/style.css">
   
    <script src="jquery/jquery.js"></script>
   
    <script src="js/dashbord.js"></script>
    <script src="js/finalisationVente.js"></script>
    <script src="js/facture.js"></script>
    @vite('resources/css/app.css')
    
</head>
<body>

    <div class="app">
        <div class="layout">


            <div class="flex flex-row h-full w-full bg-[#F1F5F9]">

                <div class="hC hidden md:block  bg-[#212B36] w-64 shadow-ld" id="Personalise">

                    <div class=" sm:hidden md:block text-white px-4 cursor-pointer">

                        <h2 class="FP-titre py-4 text-lg cursor-pointer">CRA & Fils</h2>


                    </div>


                </div>

                <nav class="flex bg-white h-16 w-full shadow-lg justify-between" >

                    <div class="flex mt-2">

                        <div class="flex h-5 w-5 mb-5 mt-3 items-center">

                            <img src="Icons/menu-burger.svg" onclick="ActiveHeader()" alt="" class="hA ml-3 mr-10 cursor-pointer">
                            <img src="Icons/menu-burger.svg" onclick="DesactiveHeader()" alt="" class="hD hidden ml-3 mr-10 cursor-pointer">

                              <!--Formulaire-->
                            <div>

                            <form action="" method="post" class="hidden md:block">
                                <input type="text" placeholder="Rechercher" class="shadow-lg border-2 rounded-lg p-2 border-indigo-500/50 w-60" >
                            </form>
                            </div>
                        </div>



                    </div>
                    <div class="flex flex-row space-x-10 mr-20  mb-5 mt-3 items-center">

                            <!--Notification-->

                            <div class="bg-[#CDD0D4]  rounded-full w-10 h-10 flex items-center">

                            <img src="Icons/bell-regular.svg" alt="" class="ml-3 mr-10 cursor-pointer w-4 h-4">

                            </div>

                            <!---Message-->

                            <div class="bg-[#CDD0D4] rounded-full w-10 h-10 flex items-center ">

                            <img src="Icons/envelope-regular.svg" alt="" class="ml-3 mr-10 cursor-pointer w-4 h-4">

                            </div>


                            <!---Profil-->

                            <div class="bg-[#CDD0D4] rounded-full w-10 h-10 ">



                            </div>

                            <!---time-->

                            <div>
                                <p class="FP-Menu">Time</p>
                            </div>
                     </div>


                </nav>

            </div>

           {{--Creation de la facture--}}

           <div class="h-full m-6">

            {{--//entête--}}

            <div class="flex flex-row w-full h-1/4 ">
               
                <div>

                    <img src="image/logo.png" alt="logo cra & fils">

                </div>
                <div></div>
                <div></div>
            </div>



           </div>






        </div>
    </div>
  
    
</body>
</html>