<!DOCTYPE html>
<html lang="fr" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" http-equiv="Content-Language" content="fr">
    <title>CRA & Fils @yield('page_titre')</title>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" type="x-icon" href="./image/ccra.png">
    <script src="jquery/jquery.js"></script>
    <script src="js/dashbord.js"></script>
    <script src="js/finalisationVente.js"></script>
    <script src="js/facture.js"></script>
    <script src="js/normalisation.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    {{--@vite('resources/css/app.css')--}}

</head>
<body>
    <div class="app">
        <div class="layout">


            @include('PageStatic.header')



        </div>
    </div>


</body>
</html>
