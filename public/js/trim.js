document.addEventListener("DOMContentLoaded", function() {
    const champDeSaisie = document.getElementById("champDeSaisie");
    const quantite = document.getElementById("quantite");
    const montant = document.getElementById("prix");
    const Search = document.getElementById("search");
    const reference = document.getElementById("Rp");
    const searchInput = document.getElementById("searchInput");
    const num_facture = document.getElementById("numfacture");
    const nom = document.getElementById("nom");
    const prenom = document.getElementById("prenom");
    const n_societe = document.getElementById("n_societe");
    const address = document.getElementById("address");
    const marque = document.getElementById("marque");
    const num_ifu = document.getElementById("num_ifu");
    var montantdiv = document.querySelector('input[name="montant"]');
  

    if(nom)
        {
            nom.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[a-zA-Z0-9 /]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = nom.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                nom.value = valeur.replace(/[^a-zA-Z0-9 /]/g, '');

               
            }
            nom.value = nom.value.toUpperCase();
        });
    }
    if(marque)
        {
            marque.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[a-zA-Z]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = marque.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                marque.value = valeur.replace(/[^a-zA-Z]/g, '');
               
            }
            marque.value = marque.value.toUpperCase();
        });
    }

    if(prenom)
        {
            prenom.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[a-zA-Z]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = prenom.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                prenom.value = valeur.replace(/[^a-zA-Z]/g, '');
               
            }
            prenom.value = prenom.value.toUpperCase();
        });
    }
    if(n_societe)
     {
            n_societe.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[a-zA-Z0-9]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = n_societe.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                n_societe.value = valeur.replace(/[^a-zA-Z0-9]/g, '');
               
            }
            n_societe.value = n_societe.value.toUpperCase();
        });
    }
    if(address)
        {
              address.addEventListener("input", function() {
               // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
               const caracteresValides = /^[a-zA-Z0-9]*$/;
       
               // Obtenir la valeur actuelle de la saisie
               let valeur = address.value;
       
               // Supprimer les caractères invalides
               if (!caracteresValides.test(valeur)) {
                address.value = valeur.replace(/[^a-zA-Z0-9]/g, '');
                  
               }
               address.value = address.value.toUpperCase();
           });
       }

    if(champDeSaisie)
    {
        champDeSaisie.addEventListener("input", function() {
        // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
        const caracteresValides = /^[a-zA-Z0-9]*$/;

        // Obtenir la valeur actuelle de la saisie
        let valeur = champDeSaisie.value;

        // Supprimer les caractères invalides
        if (!caracteresValides.test(valeur)) {
            champDeSaisie.value = valeur.replace(/[^a-zA-Z0-9]/g, '');
           
        }
        champDeSaisie.value = champDeSaisie.value.toUpperCase();
    });
    }

    if( num_facture)
        {
            num_facture.addEventListener("input", function() {
                // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
                const caracteresValides = /^[0-9]*$/;
        
                // Obtenir la valeur actuelle de la saisie
                let valeur = num_facture.value;
        
                // Supprimer les caractères invalides
                if (!caracteresValides.test(valeur)) {
                    num_facture.value = valeur.replace(/[^0-9]/g, '');
                }
            });
        }

    if( quantite)
    {
        quantite.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[0-9]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = quantite.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                quantite.value = valeur.replace(/[^0-9]/g, '');
            }
        });
    }
    if(montant)
        {
            montant.addEventListener("input", function() {
                // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
                const caracteresValides = /^[0-9]*$/;
        
                // Obtenir la valeur actuelle de la saisie
                let valeur = montant.value;
        
                // Supprimer les caractères invalides
                if (!caracteresValides.test(valeur)) {
                     montant.value = valeur.replace(/[^0-9]/g, '');
                }
            });
        }

    if(montant)
            {
                montant.addEventListener("input", function() {
                    // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
                    const caracteresValides = /^[0-9]*$/;
            
                    // Obtenir la valeur actuelle de la saisie
                    let valeur = montant.value;
            
                    // Supprimer les caractères invalides
                    if (!caracteresValides.test(valeur)) {
                         montant.value = valeur.replace(/[^0-9]/g, '');
                    }
                });
    } 
    
    if(Search)
        {
            Search.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[a-zA-Z0-9]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = Search.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                Search.value = valeur.replace(/[^a-zA-Z0-9]/g, '');
               
            }
            Search.value = Search.value.toUpperCase();
        });
        } 
        
    if(reference )
    {
                reference .addEventListener("input", function() {
                // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
                const caracteresValides = /^[a-zA-Z0-9]*$/;
        
                // Obtenir la valeur actuelle de la saisie
                let valeur = reference .value;
        
                // Supprimer les caractères invalides
                if (!caracteresValides.test(valeur)) {
                    reference .value = valeur.replace(/[^a-zA-Z0-9]/g, '');
                   
                }
                reference .value = reference .value.toUpperCase();
            });
    } 
    
    if(searchInput)
    {
            searchInput.addEventListener("input", function() {
            // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
            const caracteresValides = /^[a-zA-Z0-9]*$/;
    
            // Obtenir la valeur actuelle de la saisie
            let valeur = searchInput.value;
    
            // Supprimer les caractères invalides
            if (!caracteresValides.test(valeur)) {
                searchInput.value = valeur.replace(/[^a-zA-Z0-9]/g, '');
               
            }
            searchInput.value = searchInput.value.toUpperCase();
        });
    }

    if( num_ifu)
        {
            num_ifu.addEventListener("input", function() {
                // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
                const caracteresValides = /^[0-9]*$/;
        
                // Obtenir la valeur actuelle de la saisie
                let valeur = num_ifu.value;
        
                // Supprimer les caractères invalides
                if (!caracteresValides.test(valeur)) {
                    num_ifu.value = valeur.replace(/[^0-9]/g, '');
                }
            });
        }

    if( montantdiv)
    {
                 montantdiv.addEventListener("input", function() {
                    // Définir les caractères autorisés (par exemple, uniquement alphanumériques)
                    const caracteresValides = /^[0-9]*$/;
            
                    // Obtenir la valeur actuelle de la saisie
                    let valeur = montantdiv.value;
            
                    // Supprimer les caractères invalides
                    if (!caracteresValides.test(valeur)) {
                        montantdiv.value = valeur.replace(/[^0-9]/g, '');
                    }
                });
    }    
    
    


    
});