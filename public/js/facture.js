$(document).ready(function () {

    var recherche_facture = document.querySelector('.Recherchefacture');
    var type = document.querySelector('.type');
    if(type)
        {
            type = document.querySelector('.type').value 
        }
    var _token = $('input[type="hidden"]').attr('value');
    var Contenu = document.querySelector('.Contenu');
    var next_contenu = document.querySelector('.next-contenu');
    var Contenu_search =document.querySelector('.Contenu_search');

    if(recherche_facture !== null && type !== null)
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
                        type,
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

                            if (type == 1) {
                                data.forEach(item => {
                                    var contenu = '<div class="flex flex-row p-5 m-5 align-center bg-stone-300 justify-between">' +
                                                  '<div class="flex flex-row ">' +
                                                  '<h3 class="flex flex-row FP-error m-2"><img src="Icons/play.png" alt=""><span>N°</span>' + item.num_factures + '</h3>' +
                                                  '<h3 class="FP-error m-2"><span class="">Client-</span>' + item.client_anonyme + '</h3>' +
                                                  '</div>' +
                                                  '<div class="flex flex-row">' +
                                                  '<button onclick="redirection_modif(' + item.num_factures + ')" class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white" id="' + item.num_factures + '"><a href="" class="FP-error pointer">Modifier la facture</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/details?numero_facture=' + item.num_factures + '" class="FP-error pointer">Détails</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/visualiser?numero_facture=' + item.num_factures + '" class="FP-error pointer">Visualiser</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/visualisers?numero_facture=' + item.num_factures + '" class="FP-error pointer">Télécharger</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a onclick="Pops(' + item.num_factures + ')" class="FP-error pointer">Normaliser la facture</a></button>' +
                                                  '</div>' +
                                                  '</div>';
                                    Contenu_search.innerHTML += contenu; // Ajouter au lieu de remplacer
                                });
                            }
                            
                            

                            if(type == 2)
                            {
                                data.forEach(item => {
                                    var contenu = '<div class="flex flex-row p-5 m-5 align-center bg-stone-300 justify-between">' +
                                                  '<div class="flex flex-row ">' +
                                                  '<h3 class="flex flex-row FP-error m-2"><img src="Icons/play.png" alt=""><span>N°</span>' + item.num_factures + '</h3>' +
                                                  '<h3 class="FP-error m-2"><span class="">Client-</span>' + item.client_anonyme + '</h3>' +
                                                  '</div>' +
                                                  '<div class="flex flex-row">' +
                                                  '<button onclick="redirection_modif(' + item.num_factures + ')" class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white" id="' + item.num_factures + '"><a href="" class="FP-error pointer">Modifier la facture</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/details?numero_facture=' + item.num_factures + '" class="FP-error pointer">Détails</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/visualiser?numero_facture=' + item.num_factures + '" class="FP-error pointer">Visualiser</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/visualisers?numero_facture=' + item.num_factures + '" class="FP-error pointer">Télécharger</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a onclick="Pops(' + item.num_factures + ')" class="FP-error pointer">Normaliser la facture</a></button>' +
                                                  '</div>' +
                                                  '</div>';
                                    Contenu_search.innerHTML += contenu; // Ajouter au lieu de remplacer
                                });
                            }
                            
                            if(type == 3)
                            {
                                data.forEach(item => {
                                    var contenu = '<div class="flex flex-row p-5 m-5 align-center bg-stone-300 justify-between">' +
                                                  '<div class="flex flex-row ">' +
                                                  '<h3 class="flex flex-row FP-error m-2"><img src="Icons/play.png" alt=""><span>N°</span>' + item.num_factures + '</h3>' +
                                                  '<h3 class="FP-error m-2"><span class="">Client-</span>' + item.client_anonyme + '</h3>' +
                                                  '</div>' +
                                                  '<div class="flex flex-row">' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/details?numero_facture=' + item.num_factures + '" class="FP-error pointer">Détails</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/visualiser?numero_facture=' + item.num_factures + '" class="FP-error pointer">Visualiser</a></button>' +
                                                  '<button class="flex p-2 bg-white rounded-lg mx-3 hover:bg-black hover:text-white"><a href="http://127.0.0.1:8000/visualisers?numero_facture=' + item.num_factures + '" class="FP-error pointer">Télécharger</a></button>' +
                                                   '</div>' +
                                                  '</div>';
                                    Contenu_search.innerHTML += contenu; // Ajouter au lieu de remplacer
                                });
                            }
                                
                            
                        

                        

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
function ListeFacture()
{
    
}
function redirection_modif(id)
{
    var url = 'http://127.0.0.1:8000/modifier_facture?numero_facture=' + id;
    window.location.href = url;
}