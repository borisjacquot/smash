<script type='text/javascript' src='js/ajaxrequest.js'></script>

<?php 
require "class/user.class.php";
require_once "class/Session.class.php";
?>
<form method="get" name='search'>
    <input type="text" id="pseudo">
    Liste des personnes : 
	<span id="liste"></span>
</form>

<script>
    window.onload = function () {
        var request = null ;
        // Désactivation de l'envoi du formulaire
        document.forms['search'].onsubmit = function () { 
            return false;
        }

        if (request != null) {
            request.cancel() ;
        }

        // Fonction appelée lors d'une modification de la saisie
        document.forms['search'].elements['pseudo'].onkeyup = function() {
            console.log(document.getElementById("pseudo").value);
            new AjaxRequest(
            {
                url : "ajax/userAjax.php",
                method : "get",
                handleAs : "json",
                parameters : { pseudo : document.getElementById("pseudo").value},
                onSuccess : function(res) {
                    console.log(res);
                    var listePseudo = "<ul>";
                    for(var user in res){
                        console.log(user);
                        listePseudo += "<li>"+res[user]["pseudo"]+"</li>";
                    }
                    listePseudo +="<ul>";
                    document.getElementById("liste").innerHTML = listePseudo;

                }
            }
            )
        }
    }
</script>