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
}
?>