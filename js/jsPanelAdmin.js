window.onload = function () {
    var request = null ;
    // Désactivation de l'envoi du formulaire
    document.forms['search'].onsubmit = function () { 
        return false;
    }
    if (request != null) {
        request.cancel() ;
    }
    new AjaxRequest(//requete affichage des utilisateur suivant la barre de recherche
        {
            url : "../ajax/userAjax.php",
            method : "get",
            handleAs : "json",
            parameters : { pseudo : document.getElementById("pseudo").value.replace(" ","")},
            onSuccess : function(res) {
                var listePseudo = "<table><tr> <td>Id</td> <td>Pseudo</td> <td>Rang</td> <td>Mail</td> <td>Date création</td> <td>Ban?</td>";
                for(var user in res){ //ecriture ligne tableau de l'utilisateur
                    //affiche id du compte
                    listePseudo +="<tr>"+"<td>"+res[user]["idUser"]+"</td>";
                    //affiche pseudo
                    listePseudo +="<td>"+res[user]["pseudo"]+"</td>";
                    //affiche rang
                    listePseudo +="<td>";
                    listePseudo += generateSelectRang(res[user]["idUser"],res[user]["rang"]);
                    listePseudo +="</td>";
                    // affiche mail
                    listePseudo +="<td>"+res[user]["mail"]+"</td>"; 
                    // affiche la date de création du compte
                    listePseudo +="<td>"+res[user]["dateCreation"]+"</td>"; 
                   
                    var idSelectBan = "ban"+res[user]["idUser"];
                    if(res[user]['ban']==0){
                    listePseudo +="<td><select id='"+idSelectBan+"' onchange='changementBan("+res[user]["idUser"]+")'> <option value='0'>NON</option> <option value='1'>OUI</option> </select></td> </tr>";//si ban affiche cette ligne
                    }else listePseudo +="<td><select id='"+idSelectBan+"' onchange='changementBan("+res[user]["idUser"]+")'> <option value='1'>OUI</option> <option value='0'>NON</option> </select></td> </tr>";//sinon celle ci
                }
                listePseudo +="<table>";
                document.getElementById("liste").innerHTML = listePseudo;
            }
        });
    // Fonction appelée lors d'une modification de la saisie
    document.forms['search'].elements['pseudo'].onkeyup = function() {
        new AjaxRequest(//requete affichage des utilisateur suivant la barre de recherche
        {
            url : "../ajax/userAjax.php",
            method : "get",
            handleAs : "json",
            parameters : { pseudo : document.getElementById("pseudo").value.replace(" ","")},
            onSuccess : function(res) {
                var listePseudo = "<table><tr> <td>Id</td> <td>Pseudo</td> <td>Rang</td> <td>Mail</td> <td>Date création</td> <td>Ban?</td>";
                for(var user in res){ //ecriture ligne tableau de l'utilisateur
                    //affiche id du compte
                    listePseudo +="<tr>"+"<td>"+res[user]["idUser"]+"</td>";
                    //affiche pseudo
                    listePseudo +="<td>"+res[user]["pseudo"]+"</td>";
                    //affiche rang
                    listePseudo +="<td>";
                    listePseudo += generateSelectRang(res[user]["idUser"],res[user]["rang"]);
                    listePseudo +="</td>";
                    // affiche mail
                    listePseudo +="<td>"+res[user]["mail"]+"</td>"; 
                    // affiche la date de création du compte
                    listePseudo +="<td>"+res[user]["dateCreation"]+"</td>"; 
                   
                    var idSelectBan = "ban"+res[user]["idUser"];
                    if(res[user]['ban']==0){
                    listePseudo +="<td><select id='"+idSelectBan+"' onchange='changementBan("+res[user]["idUser"]+")'> <option value='0'>NON</option> <option value='1'>OUI</option> </select></td> </tr>";//si ban affiche cette ligne
                    }else listePseudo +="<td><select id='"+idSelectBan+"' onchange='changementBan("+res[user]["idUser"]+")'> <option value='1'>OUI</option> <option value='0'>NON</option> </select></td> </tr>";//sinon celle ci
                }
                listePseudo +="<table>";
                document.getElementById("liste").innerHTML = listePseudo;
            }
        });
    }
}
function changementBan(id) {
    var idSelectBan = "ban"+id;
    new AjaxRequest(
        {
            url        : "../ajax/userAjax.php",
            method     : 'get',
            handleAs   : 'text',
            parameters : { ban : document.getElementById(idSelectBan).value, idUser : id},
            onSuccess  : function(res) {
                //suppression des options 
                var select = document.getElementById(idSelectBan);
                    select.options.remove(0) ;
                    select.options.remove(0) ;
                //ajout des bonnes option du select en fonction du res
                if(res=='0'){
                    //changer le select en select avec en premier choix NON
                    var option = document.createElement("option");
                        option.text = "NON";
                        option.value = "0";
                        select.add(option);
                    var option = document.createElement("option");
                        option.text = "OUI";
                        option.value = "1";
                        select.add(option);
                }
                else{
                    //changer le select en select avec en premier choix OUI
                    var option = document.createElement("option");
                        option.text = "OUI";
                        option.value = "1";
                        select.add(option);
                    var option = document.createElement("option");
                        option.text = "NON";
                        option.value = "0";
                        select.add(option);

                }
            }
        }) ;
}
function generateSelectRang(id,rangUser){
    listeRang = ["Administrateur","Modérateur","Certifié","VIP","Membre"];
    for( var i = 0; i < listeRang.length-1; i++){ 
        if ( listeRang[i] === rangUser) {
            listeRang.splice(i, 1);
        }
    }
    var html = "<select id='rang"+id+"' onchange='changementRang("+id+")'>";
    html+="<option value='"+rangUser+"'>"+rangUser+"</option>";
    listeRang.forEach(function(rang) {
        html+="<option value='"+rang+"'>"+rang+"</option>";
    });
    html+="</select>";
    return html;
}

function changementRang(id){
    var idSelectRang = "rang"+id;
    new AjaxRequest(
        {
            url        : "../ajax/userAjax.php",
            method     : 'get',
            handleAs   : 'text',
            parameters : { rang : document.getElementById(idSelectRang).value, idUser : id},
            onSuccess  : function(res) {
                //suppression des options 
                var select = document.getElementById(idSelectRang);
                //ajout des bonnes option du select en fonction du res
                select.innerHTML = generateSelectRang(id,res);
            }
        }) ;
}

