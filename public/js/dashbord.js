function Activeez() {
    const Btn_p = document.querySelector('.principales');
    const Btn_s = document.querySelector('.secondaires');
    const Btn1 = document.querySelector('.R11');
    const Btn2 = document.querySelector('.A11');
    const Btn3 = document.querySelector('.A12');
   // const Btn4 = document.querySelector('.A13');

    Btn_p.classList.add('hidden');
    Btn_s.classList.remove('hidden');
    Btn_s.classList.add('block');

    Btn1.classList.remove('hidden');
    Btn1.classList.add('block');

    Btn2.classList.remove('hidden');
    Btn2.classList.add('block');

    Btn3.classList.remove('hidden');
    Btn3.classList.add('block');

    
   // Btn4.classList.remove('hidden');
   // Btn4.classList.add('block');
}

function Desactiveez() {
    const Btn_p = document.querySelector('.principales');
    const Btn_s = document.querySelector('.secondaires');
    const Btn1 = document.querySelector('.R11');
    const Btn2 = document.querySelector('.A11');
    const Btn3 = document.querySelector('.A12');

    Btn_s.classList.add('hidden');
    Btn_p.classList.remove('hidden');
    Btn_p.classList.add('block');

    Btn1.classList.remove('block');
    Btn1.classList.add('hidden');

    Btn2.classList.remove('block');
    Btn2.classList.add('hidden');

    Btn3.classList.remove('block');
    Btn3.classList.add('hidden');
}
function Activez() {
    const Btn_p = document.querySelector('.principale');
    const Btn_s = document.querySelector('.secondaire');
    const Btn1 = document.querySelector('.R1');
    const Btn2 = document.querySelector('.A1');

    Btn_p.classList.add('hidden');
    Btn_s.classList.remove('hidden');
    Btn_s.classList.add('block');

    Btn1.classList.remove('hidden');
    Btn1.classList.add('block');

    Btn2.classList.remove('hidden');
    Btn2.classList.add('block');
}

function Desactivez() {
    const Btn_p = document.querySelector('.principale');
    const Btn_s = document.querySelector('.secondaire');
    const Btn1 = document.querySelector('.R1');
    const Btn2 = document.querySelector('.A1');

    Btn_s.classList.add('hidden');
    Btn_p.classList.remove('hidden');
    Btn_p.classList.add('block');

    Btn1.classList.remove('block');
    Btn1.classList.add('hidden');

    Btn2.classList.remove('block');
    Btn2.classList.add('hidden');
}
function ActiveHeader() {
    const btnA = document.querySelector('.hA');
    const btnD = document.querySelector('.hD');
    const btn = document.querySelector('.hC');



    btn.classList.remove('md:block');
    //btn.classList.add('md:hidden');
    btnA.classList.add('hidden');
    btnD.classList.remove('hidden');
    btnD.classList.add('block');
}
function DesactiveHeader() {
    const btnA = document.querySelector('.hA');
    const btnD = document.querySelector('.hD');
    const btn = document.querySelector('.hC');

    btnD.classList.remove('block');
    btnD.classList.add('hidden');
    btn.classList.remove('md:hidden');
    btn.classList.add('md:block');

    btnA.classList.remove('hidden');
    btnA.classList.add('block');
}

function Pop() {
    let pop = document.querySelector('.Pop');
    pop.classList.remove('Pops');
    pop.classList.remove('hidden');
    pop.classList.add('Popt');
    pop.classList.add('block')
    pop.addEventListener('animationend', () => {
        pop.classList.remove('hidden');
        pop.classList.add('block')

    });

}
function PopR() {
    let pop = document.querySelector('.Pop');
    pop.classList.remove('Popt');
    pop.classList.add('Pops');
    pop.addEventListener('animationend', () => {
        pop.classList.remove('block');
        pop.classList.add('hidden');
    });

}

$.ajax({
    url: '/essaie?produit=1',
    type: 'GET',
    success: function (response) {
        // Récupérer les données depuis la réponse
        let donnees = response.Produit;


        // Enregistrer les données dans le localStorage
        localStorage.setItem('donnees', JSON.stringify(donnees));

        console.log('Données récupérées et enregistrées dans le localStorage.');
    },
    error: function (error) {
        console.error('Erreur lors de la récupération des données :', error);
    }
});

var produitStock;

function rechercheProduits() {
    var refrenceProduits = document.querySelector('.Rp').value;

    var panier = JSON.parse(localStorage.getItem('donnees')) || [];

    // Effectuer la recherche dans le panier
    var produitRecherche = panier.find(item => item.reference === refrenceProduits);

    localStorage.setItem('produitRecherche', JSON.stringify(produitRecherche));




    var P1 = document.querySelector('.P1');
    var P2 = document.querySelector('.P2');
    var P3 = document.querySelector('.P3');

    var P4 = document.querySelector('.P4');
    var P5 = document.querySelector('.P5');
    var P6 = document.querySelector('.P6');

    // var messageAucunResultat = document.getElementById('messageAucunResultat');

    // Effacer le contenu précédent
    // Afficher les résultats (vous pouvez ajuster cela en fonction de vos besoins)
    if (produitRecherche) {



        P1.innerHTML = produitRecherche.nom;
        P2.innerHTML = produitRecherche.reference;
        P3.innerHTML = produitRecherche.prix;
        P4.innerHTML = produitRecherche.categorie;
        P5.innerHTML = produitRecherche.marque;
        P6.innerHTML = produitRecherche.quantite;

        produitStock = produitRecherche;

        P1.classList.remove('text-red-500');
        P3.classList.remove('text-red-500');
        P4.classList.remove('text-red-500');
        P5.classList.remove('text-red-500');
        P6.classList.remove('text-red-500');

        P1.classList.add('text-black');
        P3.classList.add('text-black');
        P4.classList.add('text-black');
        P5.classList.add('text-black');
        P6.classList.add('text-black');



    } else {

        var nada = "Indisponible"
        P1.innerHTML = nada;
        P2.innerHTML = refrenceProduits;
        P3.innerHTML = nada;
        P4.innerHTML = nada;
        P5.innerHTML = nada;
        P6.innerHTML = nada;
        P1.classList.add('text-red-500');
        P3.classList.add('text-red-500');
        P4.classList.add('text-red-500');
        P5.classList.add('text-red-500');
        P6.classList.add('text-red-500');

        produitStock = null;

        //alert(produitStock);
        // Afficher un message si aucun résultat n'est trouvé
    }

}

function getPanier() {

    var Panier =localStorage.getItem('Panier');


    if (Panier == null) {
        return [];
    }
    else {
        return JSON.parse(Panier);
    }




}
function savePanier(Panier) {
    localStorage.setItem('Panier', JSON.stringify(Panier));

}

var lt = 3;
function gestionStatus()
{
    var total = document.querySelector('.Produit');
       
    if(total )
    {
        total.classList.remove('hidden');
        total.classList.add('block');
    }
    var Evalue = document.querySelector('.Evalue');
   
    if(Evalue )
    {
        Evalue.classList.add('hidden');
     
    }

    var Totaux = document.querySelector('.Totaux');
   
    if(Totaux)
    {
        Totaux.classList.add('hidden');
     
    }
}

window.addEventListener('load', function (event) {



     var paniers = getPanier();
     console.log(paniers.length)
    var alpha = 0;
    calculeTotal();
    if(paniers.length ==  0)
    {
       
        gestionStatus()

       
        
    }
   
     
        
        // Votre code ici
        paniers.forEach(function(produitStock) {

            var divP = document.querySelector('.Generates');

            if(alpha <3 && divP)
            {   
               
    
               // var divP = document.querySelector('.Generates');
                alpha++;
           
            var divS = document.createElement('div');
    
            
            divS.className = "flex flex-row panierContainer w-full my-3" +' P'+produitStock.reference;
            divP.appendChild(divS);
    
            var divT = document.createElement('div');
            var divQ = document.createElement('div');
    
            divS.appendChild(divT);
            divS.appendChild(divQ);
    
            var table = document.createElement('table');
            var thead = document.createElement('thead');
            var tbody = document.createElement('tbody');
            var tr1 = document.createElement('tr');
            var tr2 = document.createElement('tr');
    
            table.className = "border-separate border  hidden md:block";
            tr1.className = "bg-[#F8FAFC]";
    
            divT.appendChild(table);
            table.appendChild(thead);
            table.appendChild(tbody);
            thead.appendChild(tr1);
            tbody.appendChild(tr2);
    
            var th1 = document.createElement('th');
            var th2 = document.createElement('th');
            var th3 = document.createElement('th');
            var th4 = document.createElement('th');
            var th5 = document.createElement('th');
    
            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');
    
            th1.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-2  text-xs";
            th2.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
            th3.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
            th4.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-1  text-xs";
            th5.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
    
            var idth5 = 'total' + produitStock.reference;
    
            td1.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
            td2.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
            td3.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
            td4.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
            td5.className = idth5 + " " + "FP-Menu text-xs font-thin border border-slate-300 p-2 total";
    
            th1.textContent = 'Nom du produit';
            th2.textContent = 'Référence';
            th3.textContent = 'Prix';
            th4.textContent = 'Quantité';
            th5.textContent = 'Total';
    
            td1.textContent = produitStock.nom;
            td2.textContent = produitStock.reference;
            td3.textContent = produitStock.prix;
            td5.textContent = produitStock.prix;
    
            var inputQuantite = document.createElement('input');
            inputQuantite.className = "quantity";
            var ids = "quantity" + produitStock.reference;
            var panierA = getPanier();
            var produit = panierA.find(item => item.reference === produitStock.reference);
    
            inputQuantite.type = 'number';
            inputQuantite.id = produitStock.reference;
            inputQuantite.name = 'quantite';
            inputQuantite.min = '1';
            inputQuantite.value = produit.quantite;
            inputQuantite.className = ids + ' ' + 'w-16 focus:outline-none';
            td4.appendChild(inputQuantite);
    
    
            produit.total = produitStock.prix * produit.quantite;
            
            if ( produit.total % 1 !== 0) { // Vérifie si le nombre a une partie décimale
                td5.textContent= parseFloat( produit.total.toFixed(2)); // Arrondit et convertit le nombre à un nombre à virgule flottante avec le nombre spécifié de chiffres après la virgule
            }else
            {
                td5.textContent = produit.total;
    
            }
            
    
            inputQuantite.addEventListener('input',function(event)
        {   var value = event.target.value;
            var max = event.target.max;
            td5.textContent = produitStock.prix * parseInt(value);
           var total =produitStock.prix * parseInt(value);
    
    
            if(parseInt(value) > parseInt(max) )
            {   value =1;
                inputQuantite.value = value;
                td5.textContent =produitStock.prix *1;
                 total =produitStock.prix * 1;
    
                alert('Stock insuffisant ')
            }
          var id =event.target.id,
    
    
           panier = getPanier();
           panier.forEach(function(e)
           {
    
             if(e.reference ==id)
             {
    
           e.quantite = parseInt(value);
           e.total= parseInt(total);
            savePanier(panier);
             }
    
           });
    
           calculeTotal();
    
    
    
    
        });
    
    
    
    
    
    
            tr1.appendChild(th1);
            tr1.appendChild(th2);
            tr1.appendChild(th3);
            tr1.appendChild(th4);
            tr1.appendChild(th5);
    
            tr2.appendChild(td1);
            tr2.appendChild(td2);
            tr2.appendChild(td3);
            tr2.appendChild(td4);
            tr2.appendChild(td5);
    
    
            divQ.className = 'm-2 mt-5';
            // Créer l'image de la corbeille
            var imgTrash = document.createElement('img');
            imgTrash.src = 'Icons/trash.png';
            imgTrash.alt = 'image';
            imgTrash.id = 'image';
            imgTrash.className = 'w-12 h-12 cursor-pointer'+' trash'+produitStock.reference;
            divQ.appendChild(imgTrash);
    
            var im ='.trash'+produitStock.reference;
    
            var img = document.querySelector(im);
            img.addEventListener('click', function() {
                deleteProduits(produitStock.reference)
            });
    
             }
    
    
    
        });
    


   
}
);

function   addProduit() {
    paniers = getPanier();

   

    if(produitStock !=null)

    {
        recherchePr = paniers.find(item => item.reference === produitStock.reference); 
        if (recherchePr != undefined) {

            if (parseInt(produitStock.quantite) > parseInt(recherchePr.quantite)) {
                recherchePr.quantite++;
                savePanier(paniers);

                var id = '.quantity' + produitStock.reference;

                var inputQuantity = document.querySelector(id);
                if(inputQuantity)
                {
                    inputQuantity.value = recherchePr.quantite;
                }

            

                var idInput = '.total' + produitStock.reference;
            
                recherchePr.total = parseInt(recherchePr.quantite) * parseInt(recherchePr.prix);

                var nombre = parseInt(recherchePr.quantite) * recherchePr.prix;
            
                var idInputs = document.querySelector(idInput);
            
                if(idInputs)
                {
                    if (nombre % 1 !== 0) { // Vérifie si le nombre a une partie décimale
                        idInputs.textContent  = parseFloat(nombre.toFixed(2)); // Arrondit et convertit le nombre à un nombre à virgule flottante avec le nombre spécifié de chiffres après la virgule
                    }
                    else
                    {
                        idInputs.textContent = recherchePr.total;
                    }
        
                }
            
                

                savePanier(paniers);
            
                calculeTotal();





            }
        }


        else {
            
            var alfa = 0;
            var refrenceProduits = document.querySelector('.Rp').value;

           var data = JSON.parse(localStorage.getItem('donnees')) || [];

    // Effectuer la recherche dans le panier
             var produitRecherche = data.find(item => item.reference === refrenceProduits);
        if(parseInt(produitRecherche.quantite)>= 1)
            {
                create();
                paniers.forEach(function(produitStock)
                {
                    alfa++;
                });
        
                //alert(alfa)
                
                if ( alfa % 4 == 0) {
                    nextPage();
                }
            }
            else
            {
                alert('stok insuffisant');
            }

}
calculeTotal();





}
}

function  creates()
{

    Produit =
    {
        nom: produitStock.nom,
        reference: produitStock.reference,
        prix: produitStock.prix,
        quantite: 1,
        quantiteStock: produitStock.quantite,
        total: produitStock.prix,
    };
    paniers.push(Produit);
    if( paniers.length <=3 )
    {

    var divP = document.querySelector('.Generates');
    var divS = document.createElement('div');

    divP.appendChild(divS);
    divS.className = "flex flex-row panierContainer w-full my-3" +' P'+produitStock.reference;

    var divT = document.createElement('div');
    var divQ = document.createElement('div');

    divS.appendChild(divT);
    divS.appendChild(divQ);

    var table = document.createElement('table');
    var thead = document.createElement('thead');
    var tbody = document.createElement('tbody');
    var tr1 = document.createElement('tr');
    var tr2 = document.createElement('tr');

    table.className = "border-separate border  hidden md:block";  
    tr1.className = "bg-[#F8FAFC]";

    divT.appendChild(table);
    table.appendChild(thead);
    table.appendChild(tbody);
    thead.appendChild(tr1);
    tbody.appendChild(tr2);

    var th1 = document.createElement('th');
    var th2 = document.createElement('th');
    var th3 = document.createElement('th');
    var th4 = document.createElement('th');
    var th5 = document.createElement('th');

    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');
    var td5 = document.createElement('td');

    th1.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-2  text-xs";
    th2.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
    th3.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
    th4.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-1  text-xs";
    th5.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";

    var idth5 = 'total' + produitStock.reference;

    td1.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
    td2.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
    td3.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
    td4.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
    td5.className = idth5 + " " + "FP-error text-xs font-thin border border-slate-300 p-2 total";

    th1.textContent = 'Nom du produit';
    th2.textContent = 'Référence';
    th3.textContent = 'Prix';
    th4.textContent = 'Quantité';
    th5.textContent = 'Total';

    td1.textContent = produitStock.nom;
    td2.textContent = produitStock.reference;
    td3.textContent = produitStock.prix;
    
    
    td5.textContent = produitStock.prix;

    
   

    var inputQuantite = document.createElement('input');
    inputQuantite.className = "quantity";
    var ids = "quantity" + produitStock.reference;

    inputQuantite.type = 'number';
    inputQuantite.id = produitStock.reference;
    inputQuantite.name = 'quantite';
    inputQuantite.min = '1';
    inputQuantite.max = produitStock.quantite;
    inputQuantite.value = 1;
    inputQuantite.className = ids + ' ' + 'w-16 focus:outline-none quantity';
    td4.appendChild(inputQuantite);

    inputQuantite.addEventListener('input',function(event)
    {   var value = event.target.value;
        var max = event.target.max;
        var nombre = produitStock.prix * parseInt(value);
        //alert( nombre)
        if ( nombre % 1 !== 0) { // Vérifie si le nombre a une partie décimale
            td5.textContent= parseFloat( nombre.toFixed(2)); // Arrondit et convertit le nombre à un nombre à virgule flottante avec le nombre spécifié de chiffres après la virgule
        }else
        {
            td5.textContent = nombre;
    
        }
        //td5.textContent = produitStock.prix * parseInt(value);
       var total =produitStock.prix * parseInt(value);


        if(parseInt(value) > parseInt(max) )
        {   value =1;
            inputQuantite.value = value;
            td5.textContent =produitStock.prix *1;
             total =produitStock.prix * 1;

            alert('Stock insuffisant ')
        }
      var id =event.target.id,


       panier = getPanier();
       panier.forEach(function(e)
       {

         if(e.reference ==id)
         {

       e.quantite = parseInt(value);
       e.total= parseInt(total);
        savePanier(panier);
         }

       });

       calculeTotal();




    });




    tr1.appendChild(th1);
    tr1.appendChild(th2);
    tr1.appendChild(th3);
    tr1.appendChild(th4);
    tr1.appendChild(th5);

    tr2.appendChild(td1);
    tr2.appendChild(td2);
    tr2.appendChild(td3);
    tr2.appendChild(td4);
    tr2.appendChild(td5);


    divQ.className = 'm-2 mt-5';
    // Créer l'image de la corbeille
    var imgTrash = document.createElement('img');
    imgTrash.src = 'Icons/trash.png';
    imgTrash.alt = 'image';
    imgTrash.className = 'w-12 h-12 cursor-pointer'+' trash'+produitStock.reference;
    divQ.appendChild(imgTrash);

    var im ='.trash'+produitStock.reference;

    var img = document.querySelector(im);
    img.addEventListener('click', function() {
        deleteProduits(produitStock.reference)
        calculeTotal()
    });

    calculeTotal();

     }
    if(paniers.length >  0)
    {
        var total = document.querySelector('.Produit');
        var Evalue = document.querySelector('.Evalue')

        total.classList.remove('hidden');
        Evalue.classList.remove('hidden');
    }

    Panier = getPanier();
    Panier.push(Produit);
    savePanier(Panier);

}
function create() {
   

    var Produit = {
        nom: produitStock.nom,
        reference: produitStock.reference,
        prix: produitStock.prix,
        quantite: 1,
        quantiteStock: produitStock.quantiteStock,
        total: produitStock.prix,
    };

    var paniers = getPanier();
    paniers.push(Produit);
    savePanier(paniers);
    if( paniers.length <=3 )
    {
        var divP = document.querySelector('.Generates');
        var divS = document.createElement('div');
        divP.appendChild(divS);
        divS.className = "flex flex-row panierContainer w-full my-3 P" + produitStock.reference;
    
        var divT = document.createElement('div');
        var divQ = document.createElement('div');
        divS.appendChild(divT);
        divS.appendChild(divQ);
    
        var table = document.createElement('table');
        var thead = document.createElement('thead');
        var tbody = document.createElement('tbody');
        var tr1 = document.createElement('tr');
        var tr2 = document.createElement('tr');
        table.className = "border-separate border hidden md:block";
        tr1.className = "bg-[#F8FAFC]";
        divT.appendChild(table);
        table.appendChild(thead);
        table.appendChild(tbody);
        thead.appendChild(tr1);
        tbody.appendChild(tr2);
    
        var th1 = document.createElement('th');
        var th2 = document.createElement('th');
        var th3 = document.createElement('th');
        var th4 = document.createElement('th');
        var th5 = document.createElement('th');
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        var td3 = document.createElement('td');
        var td4 = document.createElement('td');
        var td5 = document.createElement('td');
    
        th1.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-2 text-xs";
        th2.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3 text-xs";
        th3.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3 text-xs";
        th4.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-1 text-xs";
        th5.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3 text-xs";
        var idth5 = 'total' + produitStock.reference;
        td1.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td2.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td3.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td4.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td5.className = idth5 + " FP-Menu text-xs font-thin border border-slate-300 p-2 total";
    
        th1.textContent = 'Nom du produit';
        th2.textContent = 'Référence';
        th3.textContent = 'Prix';
        th4.textContent = 'Quantité';
        th5.textContent = 'Total';
    
        td1.textContent = produitStock.nom;
        td2.textContent = produitStock.reference;
        td3.textContent = produitStock.prix;
        td5.textContent = produitStock.prix;
    
        var inputQuantite = document.createElement('input');
        inputQuantite.className = "quantity";
        var ids = "quantity" + produitStock.reference;
    
        inputQuantite.type = 'number';
        inputQuantite.id = produitStock.reference;
        inputQuantite.name = 'quantite';
        inputQuantite.min = '1';
        inputQuantite.max = produitStock.quantiteStock;
        inputQuantite.value = 1;
        inputQuantite.className = ids + ' w-16 focus:outline-none';
        td4.appendChild(inputQuantite);
    
        inputQuantite.addEventListener('input', function (event) {
            var value = event.target.value;
            var max = event.target.max;
            var nombre = produitStock.prix * parseInt(value);
    
            if (nombre % 1 !== 0) {
                td5.textContent = parseFloat(nombre.toFixed(2));
            } else {
                td5.textContent = nombre;
            }
    
            if (parseInt(value) > parseInt(max)) {
                value = 1;
                inputQuantite.value = value;
                td5.textContent = produitStock.prix * 1;
                total = produitStock.prix * 1;
                alert('Stock insuffisant');
            }
    
            var id = event.target.id;
            panier = getPanier();
            panier.forEach(function (e) {
                if (e.reference == id) {
                    e.quantite = parseInt(value);
                    e.total = parseInt(total);
                    savePanier(panier);
                }
            });
    
            calculeTotal();
        });
    
        tr1.appendChild(th1);
        tr1.appendChild(th2);
        tr1.appendChild(th3);
        tr1.appendChild(th4);
        tr1.appendChild(th5);
        tr2.appendChild(td1);
        tr2.appendChild(td2);
        tr2.appendChild(td3);
        tr2.appendChild(td4);
        tr2.appendChild(td5);
    
        divQ.className = 'm-2 mt-5';
        var imgTrash = document.createElement('img');
        imgTrash.src = 'Icons/trash.png';
        imgTrash.alt = 'image';
        imgTrash.className = 'w-12 h-12 cursor-pointer trash' + produitStock.reference;
        divQ.appendChild(imgTrash);
    
        var im = '.trash' + produitStock.reference;
        var img = document.querySelector(im);
        img.addEventListener('click', function () {
            deleteProduits(produitStock.reference);
            calculeTotal();
        });
    
        calculeTotal();
    
    }
 
    
    if (paniers.length > 0) {
        var total = document.querySelector('.Produit');
        var Evalue = document.querySelector('.Evalue');
        total.classList.remove('hidden');
        Evalue.classList.remove('hidden');
    }

    Panier = getPanier();
    //Panier.push(Produit);
    savePanier(Panier);
}


var tabInput = document.getElementsByName('quantite');

tabInput.forEach(function (e) {

    e.addEventListener('input', function (event) {

        if (event.target.value != '') {



            var id = event.target.id;
            var value = event.target.value;

            panier = getPanier();
            var produits = panier.find(item => item.reference === id);
            if (parseInt(produits.quantite) >= parseInt(value)) {

                produits.total = parseInt(value) * parseInt(produits.prix);
                var idInput = '.total' + id;
                var gets = document.querySelector(idInput);
                gets.textContent = produits.total;



                savePanier(panier);
            }



        }

    });
});


var first =0;

function deleteProduits(id)
{
  panier =getPanier();
  panier = panier.filter(item => item.reference != id);
  savePanier(panier);
  var ids ='.P'+id;
  var Pdiv = document.querySelector(ids);
  if(Pdiv)
    {
        Pdiv.remove();
    }

  
  calculeTotal();
  gestionStatus();
}

function deletePanier()
{
    panier =getPanier();
    panier.forEach(function(e)
    {
        deleteProduits(e.reference);
    });
    panier = []; // Vider le panier
    savePanier(panier);
}

function showListe()
{



        panier =getPanier();
        var divP = document.querySelector('.Generates');
        while (divP.firstChild) {
            divP.removeChild(divP.firstChild);
        }

        panier.forEach(function(produitStock,index)
        {
         if(index > first-1 && index < first+3 )
        {


        var divS = document.createElement('div');

        divP.appendChild(divS);
        divS.className = "flex flex-row panierContainer w-full my-3"+ ' P'+produitStock.reference;

        var divT = document.createElement('div');
        var divQ = document.createElement('div');

        divS.appendChild(divT);
        divS.appendChild(divQ);

        var table = document.createElement('table');
        var thead = document.createElement('thead');
        var tbody = document.createElement('tbody');
        var tr1 = document.createElement('tr');
        var tr2 = document.createElement('tr');

        table.className = "border-separate border  hidden md:block";
        tr1.className = "bg-[#F8FAFC]";

        divT.appendChild(table);
        table.appendChild(thead);
        table.appendChild(tbody);
        thead.appendChild(tr1);
        tbody.appendChild(tr2);

        var th1 = document.createElement('th');
        var th2 = document.createElement('th');
        var th3 = document.createElement('th');
        var th4 = document.createElement('th');
        var th5 = document.createElement('th');

        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        var td3 = document.createElement('td');
        var td4 = document.createElement('td');
        var td5 = document.createElement('td');

        th1.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-2  text-xs";
        th2.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
        th3.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";
        th4.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-1  text-xs";
        th5.className = "FP-Menu text-xs font-thin border border-slate-300 py-2 px-3  text-xs";

        var idth5 = 'total' + produitStock.reference;

        td1.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td2.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td3.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td4.className = "FP-Menu text-xs font-thin border border-slate-300 p-2";
        td5.className = idth5 + " " + "FP-Menu text-xs font-thin border border-slate-300 p-2 total";

        th1.textContent = 'Nom du produit';
        th2.textContent = 'Référence';
        th3.textContent = 'Prix';
        th4.textContent = 'Quantité';
        th5.textContent = 'Total';

        td1.textContent = produitStock.nom;
        td2.textContent = produitStock.reference;
        td3.textContent = produitStock.prix;
        td5.textContent = produitStock.prix;

        var inputQuantite = document.createElement('input');
        inputQuantite.className = "quantity";
        var ids = "quantity" + produitStock.reference;
        var panierA = getPanier();
        var produit = panierA.find(item => item.reference === produitStock.reference);

        inputQuantite.type = 'number';
        inputQuantite.id = produitStock.reference;
        inputQuantite.name = 'quantite';
        inputQuantite.min = '1';
        inputQuantite.value = produit.quantite;
        inputQuantite.className = ids + ' ' + 'w-16 focus:outline-none';
        td4.appendChild(inputQuantite);
        nombre  = produitStock.prix * produit.quantite

        if (nombre % 1 !== 0) { // Vérifie si le nombre a une partie décimale
            td5.textContent = parseFloat(nombre.toFixed(2)); // Arrondit et convertit le nombre à un nombre à virgule flottante avec le nombre spécifié de chiffres après la virgule
        }
        else
        {
            td5.textContent = nombre;
        }
        produit.total = produitStock.prix * produit.quantite;
      


        inputQuantite.addEventListener('input',function(event)
    {   var value = event.target.value;
        var max = event.target.max;
        td5.textContent = produitStock.prix * parseInt(value);
       var total =produitStock.prix * parseInt(value);


        if(parseInt(value) > parseInt(max) )
        {   value =1;
            inputQuantite.value = value;
            td5.textContent =produitStock.prix *1;
             total =produitStock.prix * 1;

            alert('Stock insuffisant ')
        }
      var id =event.target.id,


       panier = getPanier();
       panier.forEach(function(e)
       {

         if(e.reference ==id)
         {

       e.quantite = parseInt(value);
       e.total= parseInt(total);
        savePanier(panier);
         }

       });

       calculeTotal();




    });





        tr1.appendChild(th1);
        tr1.appendChild(th2);
        tr1.appendChild(th3);
        tr1.appendChild(th4);
        tr1.appendChild(th5);

        tr2.appendChild(td1);
        tr2.appendChild(td2);
        tr2.appendChild(td3);
        tr2.appendChild(td4);
        tr2.appendChild(td5);


        divQ.className = 'm-2 mt-5';
        // Créer l'image de la corbeille
        var imgTrash = document.createElement('img');
        imgTrash.src = 'Icons/trash.png';
        imgTrash.alt = 'image';
        imgTrash.className = 'w-12 h-12 cursor-pointer'+' trash'+produitStock.reference;
        divQ.appendChild(imgTrash);
        var im ='.trash'+produitStock.reference;

        var img = document.querySelector(im);
        img.addEventListener('click', function() {
            deleteProduits(produit.reference);
        });


        }


         }
        )



}
function nextPage()
{   panier =getPanier();
    if(first+3 <= panier.length)
    {
    first+=3;
    showListe();
    }

}
function prevPage()
{
    if(first-3 >= 0 )
    {
        first-=3;
        showListe();
    }

}

var vide = getPanier();

if(vide.length ===0)
{

    var div = document.querySelector('.Buttonse');
    if (div) {
        // Utilisez la propriété classList pour ajouter une classe

        div.classList.add('hidden');
      }

}

document.addEventListener('DOMContentLoaded', function() {


var elements = document.getElementsByName('quantite');
console.log(elements);

elements.forEach(function(element) {
    element.addEventListener('input', function(event) {
        console.log(event.target.value);
    });
});

});

function calculeTotal()
{
    var panier = getPanier();
    var total = 0;
    
    if(panier.length >=1)
    {
        panier.forEach(function(e){
        total += parseFloat(e.total );

        })
        var tvaa= (total*18)/100;
        var ttcc = tvaa + total;
        ttcc =parseFloat(ttcc.toFixed(2));
        var Total = document.querySelector('.Total');
        var Tva = document.querySelector('.TVA');
        var Ttc = document.querySelector('.TTC');
        var Totaux = document.querySelector('.Totaux');
        var status = document.querySelector('.Produit');
        var Evalue = document.querySelector('.Evalue');
        if(status)
        {
            status.classList.add('hidden');
        }
        if(Evalue)
        {
            Evalue.classList.remove('hidden')
            Evalue.classList.add('block'); 
        }
        if(Totaux)
            { Totaux.classList.remove('hidden')
               Totaux.classList.add('block'); 
                Total.textContent = total + ' '+'FCFA' ;
                Tva.textContent = tvaa +' '+'FCFA' ;
                Ttc.textContent = ttcc + ' FCFA' ;
            }
    }

    


    
}


