 <?php
 //Si erreur applique ce qu'il y a dans !empty sinon continue 
if(empty($_POST["text"])) {
    http_response_code(400);
    //change le header que l'on renvoie au client donc du text.
    header("content-type: text/plain");
    //test page.
    echo "Erreur pas de contenue récupérer";
    //Quitte ici / sort de cette function.
    exit(1);
}

//Récup post de ajax.
$textarea = $_POST["text"];


//Pour envoyer a SQL.
include_once "../modele/Data.php";
$db = new Data();
//Récup function de la Class Data.php
$db->sendToSQL($textarea);
$db->seekFromSQL();
?> 