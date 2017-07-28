 <?php
 //Si erreur applique ce qu'il y a dans !empty sinon continue 
if(!empty($_POST["text"])) {
    //test page.
    echo "Erreur pas de contenue récupérer";
    http_response_code(400);
    //change le header que l'on renvoie au client donc du text.
    header("content-type: text/plain");
    //Quitte ici / sort de cette function.
    exit(1);
}
echo "Super ! Bienvenus sur chat.php, contenus recuperer : " . $_POST["text"];

?> 