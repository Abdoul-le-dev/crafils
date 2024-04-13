<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRA & Fils connexion</title>

    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/dashbord.js"></script>
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

            <div class="flex h-[600px]  w-full justify-center items-center " >

                <div class="flex flex-col min-h-[450px] w-96 bg-[#F1F5F9] items-center shadow-lg">

                    <div class=" flex flex-row justify-center my-1 w-full ">
                        <h2 class="FP-titre py-4 text-lg ">Connexion</h2>
                    </div>
                    <div class=" flex flex-row justify-center my-3 w-full  ">
                       <img src="Icons/profil.png" alt="">

                    </div>

                    <div class=" flex items-center ">
                        <form action="{{ route('auth.login')}}" method="post">
                            @csrf

                            <div class="mt-3">
                                <input type="text" name="email" value="{{old('email')}}" placeholder="Identifiants" class=" text-xs shadow-lg border-2 rounded-lg p-2 border-indigo-500/50 w-60 focus:outline-none focus:border-2 focus:border-indigo-500/10 focus:rounded-lg " >
                                @error('email')
                                   <li class="  text-red-500 text-xs">
                                    {{ $message}}
                                   </li>
                                @enderror
                            </div>
                            <div class="mt-3">

                                <input type="text"  name="password" placeholder="Password" class="text-xs shadow-lg border-2 rounded-lg p-2 border-indigo-500/50 w-60 focus:outline-none focus:border-2 focus:border-indigo-500/10 focus:rounded-lg" >
                                @error('password')
                                <li class="text-red-500 text-xs">
                                 {{ $message}}
                                </li>
                             @enderror
                            </div>
                            <div class="flex mt-4 mb-2 justify-center w-full FP-Menu">
                               <button type="submit" class="p-2 bg-indigo-500/50  rounded-sm w-32" >Se connecter</button>
                            </div>


                        </form>
                    </div>


                 </div>

            </div>







        </div>
    </div>


</body>
</html>
