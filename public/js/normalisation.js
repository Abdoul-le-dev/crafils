document.addEventListener('DOMContentLoaded', function () {
    var checkCa = document.querySelector('.can');
    var checkCe = document.querySelector('.cen');
    var checkPf = document.querySelector('.pfn');
    var checkBl = document.querySelector('.bln');
    var checkfa = document.querySelector('.fan');
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
        
        
        
                AddChild.innerHTML = '<div class="flex flex-row mx-4 my-4 w-full " > <label for="description" class="FP-Menu ml-2 py-2 text-xs " >Nom du client<span class="ml-2"></span></label><input type="text" name="nom" required  class="ClientName border-2 p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required></div>';
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
                options.text = option.nom +' ' + option.n_societe

            selected.add(options);

            });



            });

        checkBl.addEventListener('change', function()
        {   
            
            var add = document.querySelector('.AddCa');

            var divPage = document.querySelector('.AddCa')
            var childtranche= document.createElement('div');
            divPage.appendChild(childtranche);
            childtranche.className = "childTranche";
            var childTranche = document.querySelector('.childTranche');

            childTranche.innerHTML = '<div class="flex flex-row mx-4 my-4 w-full " > <label for="description" class="FP-Menu ml-2 py-2 text-xs " >Montant<span class="ml-2"></span></label><input type="text" name="montant" required  class="ClientName border-2 FP-error p-2 focus:outline-none focus:border-2 focus:border-blue-400 " required></div>';


        

        });

        checkPf.addEventListener('change', function()
        {
        
                
                var childTranche = document.querySelector('.childTranche');
                if(childTranche)
                    {
                        childTranche.remove();
                    }
            

        });
        checkfa.addEventListener('change', function()
        {

            var childTranche = document.querySelector('.childTranche');
                if(childTranche)
                    {
                        childTranche.remove();
                    }
            
        });

    }

    Normaliser();
   







});

function Pops(id)
{
    let pop = document.querySelector('.Pop');
    pop.classList.remove('Pops');
    pop.classList.remove('hidden');
    pop.classList.add('Popt');
    pop.classList.add('block')
    pop.addEventListener('animationend', () => {
        pop.classList.remove('hidden');
        pop.classList.add('block')

    });

    var inputField = document.getElementById('inputId');
     inputField.value = id;
}

function Normaliser()
{   
    
    var Form =document.querySelector('.Normalisation');
    
    if(Form !== null)
    {
        Form.addEventListener('submit',function(e)
        {
            var Tclient = document.querySelector('input[name="client"]:checked');
            var Treglement = document.querySelector('input[name="reglement"]:checked');
           // var Treglement = document.querySelector('input[name="reglement"]:checked');
    
            var typeClient, nameCLients, idCLients,reglement,montant;
    
    
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
            
            if( Treglement!=null)
            {
                reglement =Treglement.value ;
                alert(reglement)
        
                    if(reglement ==='credit' || reglement ==='cash' || reglement==='tranche')
                    {
                        
    
                            if(reglement === 'tranche')
                                
                                {   if(typeClient ==='Client Anonyme')
                                    {   alert("Vous ne pouverz pas vendre à crédit a un client anonyme, veuillez enregistré le client");
                                        e.preventDefault();
                                        return;
    
                                    }
                                    var montantdiv = document.querySelector('input[name="montant"]');
                                    montant = montantdiv.value;
                                    
                            }
                            if(reglement === 'Acredit')
                            {
                                    if(typeClient ==='Client Anonyme')
                                        {   alert('Vous ne pouverz pas vendre à crédit a un client anonyme, veuillez enregistré le client');
                                            e.preventDefault();
                                            return;
    
                                        }
    
                            }
    
                                   
                        }
                        
                        
        
            }
            else
            {
                alert("veuillez remplir tousl les champs");
                e.preventDefault();
                return;
            }
            if(typeClient != null && Treglement != null )
            {

                var inputField = document.getElementById('inputId');
                 var num_facture = inputField.value ;
                
            
            var _token = $('input[type="hidden"]').attr('value');
    
            e.preventDefault();
           
    
           $.ajax({
    
            url:'/normalisation',
            type: 'get',
            data: {
                 typeClient ,
                 nameCLients ,
                 idCLients,
                 reglement,
                 montant,
                 num_facture,
                 _token
            },
            success:  function(data)
            {   if(data ==='error')
                {

                }
                else
                {
                    e.preventDefault();
                PopR();
                localStorage.removeItem('Panier');
                var url = 'http://www.crafils.com/visualiser?numero_facture=' + data;
                window.location.href = url;
                }
                
            }
            
    
           });
    
    
    
    
    
            // finishValidation();
            }
    
        });
    }












}