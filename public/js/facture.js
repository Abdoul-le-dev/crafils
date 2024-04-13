$(document).ready(function () {

    var recherche_facture = document.querySelector('.Recherchefacture');
    var _token = $('input[type="hidden"]').attr('value');
    var Contenu = document.querySelector('.Contenu');
    var next_contenu = document.querySelector('.next-contenu');
    var Contenu_search =document.querySelector('.Contenu_search');

    if(recherche_facture !== null)
    {
        recherche_facture.addEventListener('input',function(e)
            {
            var num_facture = recherche_facture.value;
            var _token = $('input[type="hidden"]').attr('value');

            if(num_facture.trim()==='')
            {
                    Contenu.classList.remove('hidden');
                    next_contenu.classList.add('hidden');
                    Contenu_search.classList.add('hidden');
                
            }
            else
            {
                $.ajax({
                    url:'/searchdata',
                    type: 'POST',
                    data:
                    {
                        num_facture,
                        _token
                    },
                    success: function(data)
                    {
                        if(data =='nothing')
                        {   
                            Contenu.classList.add('hidden');
                            next_contenu.classList.remove('hidden');
                            Contenu_search.classList.add('hidden');
                        }
                        else
                        {   Contenu.classList.add('hidden');
                            next_contenu.classList.add('hidden');
                            Contenu_search.classList.remove('hidden');
                            data.forEach(item => {
                                var contenu = '<div class="flex flex-row p-5 m-5  align-center bg-stone-300 justify-between"> <div class="flex flex-row "><h3 class="flex flex-row FP-error m-2"><img src="Icons/play.png" alt=""><span>N°</span>' + item.num_factures + '</h3><h3 class="FP-error m-2"><span class="">Client-</span>' + item.client_anonyme + '</h3></div><div class="flex flex-row"><button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white" id="' + item.num_factures + '"><a href="" class="FP-error pointer">Modifier la facture</a></button><button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="" class="FP-error pointer">Détails</a></button><button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="" class="FP-error pointer">Visualiser</a></button><button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="" class="FP-error pointer">Envoyer par mail</a></button><button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="" class="FP-error pointer">Normaliser la facture</a></button></div></div>';
                                Contenu_search.innerHTML = contenu;
                                
                            });
                            
                            
                        

                        

                        }
        }
       });
   }
   

  
})
    }
});

function Facture_details()
{
    
}