<?php
session_start();
require("menu.php");
require_once("secure/dbConnect.php");

if(isset($_GET['id'])) {
    //Regarder si la commande nous appartient
    $request = $dbPizza->prepare("SELECT * FROM Commandes
                                  WHERE id = :id AND user_id = :userID");
    $request->execute(array(
        ":id" => $_GET['id'],
        ":userID" => $_SESSION['userID']
    ));
    if($request->rowCount() != 1) {
        header("Location: index.php");
        die();
    }
}
else {
    //La commande n'existe pas encore --> Créer une nouvelle commande
    // SQL -> Inserte dans Commandes
    $request = $dbPizza->prepare("INSERT INTO Commandes(user_id) VALUES(:id)");
    $request->execute(array(":id" => $_SESSION["userID"]));
    // Recupérer l'id créé
    $commande_id = $dbPizza->lastInsertId();
    //Rediriger vers commande.php?id=....
    header("Location: commande.php?id=".$commande_id);
    die();
}


//
?>

<table id="pizzas"></table>

<table id="boissons">
    <thead>
        <tr>
            <th>Boisson</th>
            <th>Qty</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody></tbody>
    <tfoot>
        <tr>
            <td colspan="100%">
                <button onclick="getListConsumables('boissons')">+</button>
            </td>
        </tr>
    </tfoot>
</table>

<div id="listeConsommable" style="display: none; border: 1px solid;">Coucou</div>

<script>
    function getListConsumables(type) {
      
        let Datas = new FormData();
        Datas.append("type", type);

        let request = $.ajax({
            url: 'getListeConsumables.php',
            type: 'POST',
            data: Datas,
            dataType: 'json',
            timeout: 5000,
            cache: false,
            contentType: false,
            processData: false,
        });

        request.done(function(output_success) {
            console.log('clicker')
            //Récupérer le div
            let listeConsommable = document.getElementById("listeConsommable");

            //Créer une table avec la liste des consommables
            let table = `<table>
                            <tr>
                                <th>Boisson</th>
                                <th>Prix</th>
                                <th>Ajouter</th>
                            </tr>
                            `;
            
            for(i in output_success) {
                let element = output_success[i];
                table += `  <tr>
                                <td>${element["nom"]}</td>
                                <td>${element["prix"]}</td>
                                <td><button type="button" onclick="addToCart('${element["nom"]}')">Click Me!</button></td>

                            </tr>`;
            }               

            table += `</table>`;            

            listeConsommable.innerHTML = table;

            //Afficher le div
            listeConsommable.style.display = "block";


        });

    
    }

    const addToCart = (item)=>{
        console.log("item: " + item);

let form = new FormData();
form.append("item", item);

$.ajax({
    url: 'addToCart.php',
    type: 'POST',
    data: form,
    dataType: 'json',
    timeout: 5000,
    cache: false,
    contentType: false,
    processData: false,
    success: function(response) {
        console.log("Added to cart:", response);
        // maybe show a success message
    },
    error: function(xhr, status, error) {
        console.error("Error adding to cart:", error);
    }
});

        } 
</script>