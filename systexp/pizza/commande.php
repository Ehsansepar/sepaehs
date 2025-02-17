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
        "userID" => $_SESSION['userID']
    ));
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
?>

<table id="pizzas"></table>

<table id=boissns>
    <thead>
        <tr>
            <th>Boissons</th>
            <th>Qty</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody></tbody>

    <tfoot>
        <tr>
            <td colspan="100%">
                <button onclick="getListeConsumables('boissons')">+</button>
            </td>
        </tr>
    </tfoot>
</table>

<!-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script> -->
<script>

    function getListeConsumables(type) {
        // alert(type);
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
            processData: false
        });

        request.done(function(output_success){
            alert(output_success);
        });
    }

</script>