<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <title>{{$subject}}</title>
</head>
<body>

   <div class="flex justify-center item-center ">
        <img src="{{$url}}" alt="logo">
   </div>

    <h1 class="FP-Menu">Alerte CRA</h1>
  
    <h3 class="my-5">{{$mailMessage}}</h3>
    <a href="{{$href}}" class="border bg-blue-300  FP-Menu p-2">Consulter la facture</a>
</body>
</html>
