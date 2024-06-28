document.addEventListener("DOMContentLoaded", function() {
    const champDeSaisie = document.getElementById("champDeSaisie");
    const quantite = document.getElementById("quantite");
    const montant = document.getElementById("prix");
    const Search = document.getElementById("search");
    const reference = document.getElementById("reference");

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
    
});