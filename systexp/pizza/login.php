
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" id="email" require>
        <input type="password" name="password" id="password" require>
    </form>
</body>
</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST['email']);
    $password = hash('sha256', htmlspecialchars($_POST['password']));


    require_once("secure/dbConnect.php");

    try {

    }
    catch (Exception $e) {
        echo "Veuillez resseayer <br>";
    }

// Récupere les données du formulaire si il a ete rempli

// Verifier que le login correspond au mot de passe

// si ok, rediriger vers index.php
// si pas ok => message d erreur mais afficher quand meme le formulaire de connexion


//Formulaire de connexion
?>