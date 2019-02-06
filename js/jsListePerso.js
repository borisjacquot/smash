window.onload = function () {
    var request = null ;
    // Désactivation de l'envoi du formulaire
    document.forms['search'].onsubmit = function () { 
        return false;
    }
    if (request != null) {
        request.cancel() ;
    }
    new AjaxRequest(//requete affichage des personnaes suivant la barre de recherche
        {
            url : "ajax/personnagesAjax.php",
            method : "get",
            handleAs : "json",
            parameters : { nom : document.getElementById("nom").value},
            onSuccess : function(res) {
                console.log(res);
                var listePerso = "<table><tr> <td>Nom</td>";
                for(var user in res){ //ecriture ligne tableau du personnage
                    //affiche nom du perosnnage
                    listePerso +="<tr>"+"<td>"+res[user]["nom"]+"</td>";
                }
                listePerso +="<table>";
                document.getElementById("liste").innerHTML = listePerso;
            }
        });
    // Fonction appelée lors d'une modification de la saisie
    document.forms['search'].elements['nom'].onkeyup = function() {
        new AjaxRequest(//requete affichage des personnaes suivant la barre de recherche
        {
            url : "ajax/personnagesAjax.php",
            method : "get",
            handleAs : "json",
            parameters : { nom : document.getElementById("nom").value.replace(" ","")},
            onSuccess : function(res) {
                console.log(res);
                var listePerso = "<table><tr> <td>Nom</td>";
                for(var user in res){ //ecriture ligne tableau du personnage
                    //affiche nom du perosnnage
                    listePerso +="<tr>"+"<td>"+res[user]["nom"]+"</td>";
                }
                listePerso +="<table>";
                document.getElementById("liste").innerHTML = listePerso;
            }
        });
    }
}