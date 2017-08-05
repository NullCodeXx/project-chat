console.log("fichier script.js charger");


    "use Strict";

    //Tableau pour tester (fausse donnée) et plus tard les donné seront recup du serveur.
    let message = ["Ajouter du contenus", "Encore du contenus..."]
//gros noob sur ULTRA Street Fighter IV //
    function display() {
        let div = document.querySelector(".div02");
        //Pour écraser suprimer toutes les ancienne données .
        div.innerHTML = "";
        //La boucle for of est l'équivalent du foreach en php.
        for( let m of message) {
            let p = document.createElement('p');
            p.classList.add("col-md-12");
            p.textContent += m ;
            div.appendChild(p);
        }
    }
    

    //Recup data in textarea.
    let regroup = document.querySelector("#btnSend")
        .addEventListener("click", function(e) {
        e.preventDefault();
        let text = document.querySelector("#text").value;        
        console.log("Text que je récupère : " + text);
        //recuper value input.
        // let input = document.querySelector("#btnSend");
        // console.log(input.value);
    

    //Envoyer tout sa au serveur AJAX.
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../controler/chat.php", true); //Pour dire que c'est asynchrum
    xhr.onreadystatechange = function() { //situation de la requete.
        //si la situation est = a la requete effectuer.
        /*
        0 (non initialisée) ou (requête non initialisée)
        1 (en cours de chargement) ou (connexion établie avec le serveur)
        2 (chargée) ou (requête reçue)
        3 (en cours d’interaction) ou (traitement de la requête)
        4 (terminée) ou (requête est terminée et la réponse est prête)
        */
        if(xhr.readyState === XMLHttpRequest.DONE)

        {
            if(xhr.status === 200) {
                console.log("sucess  (a voir ligne78):" + xhr.responseText);
                //Pour le display mettre a jour.
                message.push(text);
                display();
            }else{
                console.error("error :" + xhr.status);
                console.log(xhr.response);
            }
        }
    }
    //On précise le type de ce que on envoie a php.
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("text=" + text);
});

setInterval(function() {
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
}, 500);


//Function display.
// function display() {
//     let tableau = [];
//     let message = document.querySelector(".display");
//     message.textContent = xhr.text;
// }