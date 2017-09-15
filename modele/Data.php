<?php
/*
    Class DATABASE (Function) 
*/

Class Data{
    //Envoyer SQL.
    function sendToSQL($textarea) {
        try {
            //instancy PDO. et connect.
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=ajax-chat", "root", "tour");
            //Renvoie des erreur pour les dev.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = $pdo->prepare("INSERT INTO message(text) VALUES (:textarea)");
            // Remplace l'étiquette par la variable, bindParam = verif(avoir).
            $query->bindParam(":textarea", $textarea); 
            $query->execute();
        }catch(Exeption $exeption) {
            echo $exeption->getMessage();
        } 
    }

    //Recup SQL.
    function seekFromSQL() {
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=ajax-chat", "root", "tour");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo->prepare("SELECT * FROM message");
        $query->execute();
        //Parcours tout les lignes du tableau jusqua la fin.
        $tab = $query->fetchAll();
        //json_encode() PHP = a JSON.STRINGify() JS && json_uncode() PHP= json.parse() JS.
        $json = json_encode($tab);
        //retourne notre tableau json.
        return $json;
    }

    //Refresh data coté client.
    function interval() {
        //Faire une requete. 
    //instancier xhr.
    //succes json = json.parse(xhr.response);
    //return un tab
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controler/chat.php", true);
    xhr.onreadystatechange = function() { 
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200) {
                console.log("sucess  (a voir ligne78):" + xhr.responseText);
                //Pour le display mettre a jour.
                let json = json.parse(xhr.response);
                return json;
            }else{
                console.error("error :" + xhr.status);
                console.log(xhr.response);
            }
        }
    }
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("text=" + text);
    }
}

?>