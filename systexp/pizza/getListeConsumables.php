<?php

try {
    require_once("secure/dbConnect.php");
    $type = htmlspecialchars($_POST['type']);

    if($type == "boissons") {

        // Récupérer la liste des boissons (avec le prix)
        $request = $dbPizza->prepare("SELECT * FROM Boisson");
        $request->execute();
           

        $Output = $request->fetchAll();
    }
    else {
        $Output = "";
    }

    
}
finally {
    echo json_encode($Output, JSON_FORCE_OBJECT);
}