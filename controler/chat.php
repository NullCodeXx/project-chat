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
//Pour envoyer a SQL.
include_once "../modele/database.php";
$db = new Data();

//Récup post de ajax.
$textarea = $_POST["text"];

$db->sendToSQL($textarea);

?> 