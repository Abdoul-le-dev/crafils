//finalisation vente

  var finalisationVente;

$.ajaxSetup({
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}})



function getPanier() {

    var Panier =localStorage.getItem('Panier');


    if (Panier == null) {
        return [];
    }
    else {
        return JSON.parse(Panier);
    }




}


$.ajax({
    url: '/clients?client=1',
    type: 'GET',
    success: function (response) {
        // Récupérer les données depuis la réponse
        let client = response.Client;


        // Enregistrer les données dans le localStorage
        localStorage.setItem('client', JSON.stringify(client));

        console.log('Données client récupérées et enregistrées dans le localStorage.');
    },
    error: function (error) {
        console.error('Erreur lors de la récupération des données :', error);
    }
});





function getClient()
{
    var client = localStorage.getItem('client');

     if(client ==null)
     {
        return [];
     }

     return JSON.parse(client);
}

document.addEventListener('DOMContentLoaded', function () {
    var checkCa = document.querySelector('.ca');
    var checkCe = document.querySelector('.ce');
    var checkPf = document.querySelector('.pf');
    var checkBl = document.querySelector('.bl');
    var checkfa = document.querySelector('.fa');
    var checktranche = document.querySelector('.Tranche');
 
    if(checkCa)
    {
        checkCa.addEventListener('change', function () {
            var Addca = document.querySelector('.AddCa');
    
            var AddChild = document.querySelector('.Addchild');
            if(AddChild)
            {
                AddChild.remove();
            }
    
            var divQ = document.createElement('div');
    
            Addca.appendChild(divQ);
            divQ.className ='Addchild';
            var AddChild = document.querySelector('.Addchild');
    
    
    
            AddChild.innerHTML = '<div class="flex flex-row mx-4 my-4 w-full " > <label for="clientname" class="FP-Menu ml-2 py-2 text-xs " >Nom du client<span class="ml-2"></span></label><input type="text" name="nom" required  class="ClientName border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required></div>';
        });
    

    checkCe.addEventListener('change', function () {
        var AddChild = document.querySelector('.Addchild');

        var Addca = document.querySelector('.AddCa');
        if(AddChild)
        {
            AddChild.remove();
        }

        var divQ = document.createElement('div');

        Addca.appendChild(divQ);
        divQ.className ='Addchild';



        client = getClient();


        divQ.innerHTML = '<div class="w-full flex flex-row"><input type="text" id="searchInput" class="FP-Menu  border-2 p-2  focus:outline-none focus:border-2 focus:border-blue-400 " id="searchInput" placeholder="Rechercher "> <select id="Clients" name="Clients"  class="Clients idClients FP-Menu w-40 border-2 p-2  text-xs focus:outline-none focus:border-2 focus:border-blue-400 " required><option value="">Search</option></select></div>'

        var selected = document.querySelector('.Clients');

        client.forEach(function(option)
        {
            var options = document.createElement('option');

            options.value = option.id;
            if(option.n_societe == null)
            {
                options.text = option.nom +' ' + option.prenom
               
            }
            else
            {

                options.text = option.nom +' ' + option.n_societe 
               

            }
           
           selected.add(options);

        });



           });

    checkBl.addEventListener('change', function()
    {   var child = document.querySelector('.child');

        if(child)
        {
            child.remove();
        }
        var childTranche = document.querySelector('.childTranche');

        if(childTranche)
        {
            childTranche.remove();
        }
        var add = document.querySelector('.AddCa');

        var child = document.createElement('div');

        add.appendChild(child );
        child.className ="child";

        child.innerHTML ='<div class="flex flex-row w-full "><label class="p-3 FP-Menu text-xs">Règlements :</label>  <label class="p-2"> <input type="radio" name="reglement" class="ca  reglement Ac" required value="credit" > <a class="FP-Menu text-xs">A crédit</a></label> <label class="p-2"> <input type="radio" name="reglement" class="Tranche ca  reglement " required value="tranche" > <a class="FP-Menu text-xs ">En tranche</a></label><label class="p-2"><input type="radio" name="reglement" class="p-2 ce Pc" value="cash"> <a class="FP-Menu text-xs">Payer cash</a></label></div>'
        var checktranche = document.querySelector('.Tranche');
        checktranche.addEventListener('change', function()
        {
            
            var divPage = document.querySelector('.AddCa')
            var childtranche= document.createElement('div');
            divPage.appendChild(childtranche);
            childtranche.className = "childTranche";
            var childTranche = document.querySelector('.childTranche');

            childTranche.innerHTML = '<div class="flex flex-row mx-4 my-4 w-full " > <label for="description" class="FP-Menu ml-2 py-2 text-xs " >Montant<span class="ml-2"></span></label><input type="text" name="montant" required  class="ClientName border-2 FP-error p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required></div>';
  
        });

        var Ac = document.querySelector('.Ac');
        var Pc = document.querySelector('.Pc');

        Ac.addEventListener('change',function(){
            
            var childTranche = document.querySelector('.childTranche');
            if(childTranche)
                {
                    childTranche.remove();
                }
        });

        Pc.addEventListener('change',function(){
            var childTranche = document.querySelector('.childTranche');
            if(childTranche)
                {
                    childTranche.remove();
                }
        });

    });

    checkPf.addEventListener('change', function()
    {

        var child = document.querySelector('.child');
        var childTranche = document.querySelector('.childTranche');

        if(childTranche)
        {
            childTranche.remove();
        }
        if(child)
            {
                child.remove();
            }
    });
    checkfa.addEventListener('change', function()
    {
        var child = document.querySelector('.child');

        if(child)
        {
            child.remove();
        }
        var add = document.querySelector('.AddCa');

        var child = document.createElement('div');

        add.appendChild(child );
        child.className ="child";

        child.innerHTML ='<div class="flex flex-row w-full "><label class="p-3 FP-Menu text-xs">Règlements :</label>  <label class="p-2"> <input type="radio" name="reglement" class="ca  reglement Ac" required value="A crédit" > <a class="FP-Menu text-xs">A crédit</a></label> <label class="p-2"> <input type="radio" name="reglement" class="Tranche ca  reglement " required value="tranche" > <a class="FP-Menu text-xs ">En tranche</a></label><label class="p-2"><input type="radio" name="reglement" class="p-2 ce Pc" value="cash"> <a class="FP-Menu text-xs">Payer cash</a></label></div>'
        var checktranche = document.querySelector('.Tranche');
        checktranche.addEventListener('change', function()
        {
            
            var divPage = document.querySelector('.AddCa')
            var childtranche= document.createElement('div');
            divPage.appendChild(childtranche);
            childtranche.className = "childTranche";
            var childTranche = document.querySelector('.childTranche');

            childTranche.innerHTML = '<div class="flex flex-row mx-4 my-4 w-full " > <label for="description" class="FP-Menu ml-2 py-2 text-xs " >Montant<span class="ml-2"></span></label><input type="number" name="montant" required  class="ClientName border-2 FP-error p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required></div>';
  
        });
        var Ac = document.querySelector('.Ac');
        var Pc = document.querySelector('.Pc');

        Ac.addEventListener('change',function(){
            
            var childTranche = document.querySelector('.childTranche');
            if(childTranche)
                {
                    childTranche.remove();
                }
        });

        Pc.addEventListener('change',function(){
            var childTranche = document.querySelector('.childTranche');
            if(childTranche)
                {
                    childTranche.remove();
                }
        });

    });

}
   







});

function validationFormulaire()
{   
    
    var Form =document.querySelector('.Formulaire');
    
    if(Form !== null)
    {
        Form.addEventListener('submit',function(e)
        {
            var Tclient = document.querySelector('input[name="client"]:checked');
            var Tfacture = document.querySelector('input[name="facture"]:checked');
            var Treglement = document.querySelector('input[name="reglement"]:checked');
    
            var typeClient, nameCLients, idCLients,facture ,reglement,montant;
    
    
            if( Tclient!=null)
            {
                typeClient = Tclient.value;
    
                if(Tclient.value ==='Client Anonyme')
                {
                     nameCLients = document.querySelector('.ClientName');
    
                    if( nameCLients!=null)
                    {
                        nameCLients = nameCLients.value;
    
                    }
                    else
                    {
                        alert('Veuillez mentionner le type du clients');
                        e.preventDefault();
                        return
                    }
                }
    
                if(Tclient.value ==='Client Enregister')
                {
                     idCLients = document.querySelector('.idClients');
    
    
    
                        if( idCLients!=null)
                        {
                            idCLients =idCLients.value;
    
                        }
                        else
                        {
                            alert('Veuillez selectionnez le clients');
                            e.preventDefault();
                            return;
                        }
    
                }
            }
            else
            {
                alert("veuillez remplir tous les champs");
                e.preventDefault();
                return;
            }
            if( Tfacture!=null)
            {
                facture =Tfacture.value ;
    
                if(facture ==='simple' || facture ==='normaliser')
                {   

                    if(Treglement!=null)
                    {
                        reglement =Treglement.value;

                       

                        if(reglement === 'tranche')
                            
                            {   if(typeClient ==='Client Anonyme')
                                {   alert("Vous ne pouverz pas vendre à crédit a un client anonyme, veuillez enregistré le client");
                                    e.preventDefault();
                                    return;

                                }
                                var montantdiv = document.querySelector('input[name="montant"]');
                                
                                montant = montantdiv.value;
                                var panier = getPanier();
                                var total = 0;
                                panier.forEach(function(e)
                                {
                                total += parseFloat(e.total );

                                })
                                if(montant > total )
                                {
                                    alert('Le montant en tranche ne peut être supérieur au total de la facture');
                                        e.preventDefault();
                                        return;

                                }
                                
                                
                        }
                        if(reglement === 'credit')
                            {
                                if(typeClient ==='Client Anonyme')
                                    {   alert('Vous ne pouverz pas vendre à crédit a un client anonyme, veuillez enregistré le client');
                                        e.preventDefault();
                                        return;

                                    }

                            }
                    }
                    else{
                        alert('veuillez choisir le type de reglements');
                        e.preventDefault();
                        return;
                    }

                    
    
                }
                
    
               /* if(Tfacture.value ==='proformat')
                {
                    reglement ='TypeProformat';
                }*/

                  
    
    
            }
            else
            {
                alert("veuillez remplir tous les champs");
                e.preventDefault();
                return;
            }
            if(typeClient != null && facture != null )
            {
                
            var   finalisationVente =
            {  "TypeClient"  :  typeClient ,
                "nomCLients" : nameCLients ,
                "idCLients"  : idCLients,
                "TypeFacture": facture ,
                "Reglement"  : reglement,
    
            }
            
            var _token = $('input[type="hidden"]').attr('value');
    
            e.preventDefault();
           
           
            var panier = getPanier();
    
           $.ajax({
    
            url:'/sentdata',
            type: 'get',
            data: {
                 panier,
                 typeClient ,
                 nameCLients ,
                 idCLients,
                 facture,
                 reglement,
                 montant,
                 _token
            },
            success:  function(data)
            {   
               
                e.preventDefault();
                PopR();
                localStorage.removeItem('Panier');
                var url = 'http://www.crafils.com/visualiser?numero_facture=' + data;
                window.location.href = url;
                
            }
            
    
           });
    
    
    
    
    
            // finishValidation();
            }
    
        });
    }












}





function finishValidation()
{

    var panier = "getPanier()";
    var panierJSON = JSON.stringify(panier);

    //alert(panier)



    $('#formulaire1').on('submit',function(event)
    {
        event.preventDefault();
        jQuery.ajax(
            {
                url:'/sentdata',

                data:{
                    panier: panierJSON,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                type:'post',

                success: function(result)
                {
                    jQuery('#formulaire1')[0].reset();
                    PopR();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });

    })
}

$(document).ready(function()
{
    validationFormulaire();
    //envoi des donnees

});

document.addEventListener('DOMContentLoaded', function(){

   // validationFormulaire();

});

function returnBack()
{
    
}






