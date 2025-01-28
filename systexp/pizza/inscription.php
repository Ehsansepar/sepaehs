<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>

<h2>Formulaire d'inscription</h2>

<form action="" method="post">
    <label for="nom">Nom:</label><br>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="prenom">Prénom:</label><br>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="tel">Téléphone:</label><br>
    <input type="tel" id="tel" name="tel" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Mot de passe:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Soumettre">
</form>

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Collecte des données du formulaire
    

//     // Affichage des données (pour vérification)
//     echo "<h3>Données soumises :</h3>";
//     echo "Nom : $nom<br>";
//     echo "Prénom : $prenom<br>";
//     echo "Téléphone : $tel<br>";
//     echo "Email : $email<br>";
//     // Ne pas afficher le mot de passe pour des raisons de sécurité
//     echo "Mot de passe : ********<br>";
// }


    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    //     $nom = $_POST['nom'];
    //     $prenom = $_POST['prenom'];
    //     $telephone = $_POST['tel'];
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     // echo $nom;<br>
    
    
    //     require_once("secure/dbConnect.php");
    //     $request = $dbPizza->prepare("INSERT INTO Utilisateurs (nom, prenom, telephone, email, password) VALUE (:nom, :prenom, :telephone, :email, :password");

    //     $request->execute(array(
    //         ":nom" => $nom,
    //         ":prenom" => $prenom,
    //         ":telephone" => $telephone,
    //         ":email" => $email,
    //         ":password" => $password
    //     ));
    // }




    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nom = htmlspecialchars($_POST['nom']);
        // echo $_POST['nom']."<br>";
        echo htmlspecialchars($_POST['nom'])."<br>";
        $prenom = htmlspecialchars($_POST['prenom']);
        $telephone = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);
        $password = hash('sha256', htmlspecialchars($_POST['password']));


        require_once("secure/dbConnect.php");


        try {
        $request = $dbPizza->prepare("INSERT INTO Utilisateurs (nom, prenom, telephone, email, password) VALUES (:nom, :prenom, :telephone, :email, :password)");


        $request->execute(array(
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":telephone" => $telephone,
            ":email" => $email,
            ":password" => $password
        ));
        header('Location: login.php');
        die();
        }
        catch (Exception $e) {
            echo "Veuillez resseayer <br>";
        }


    }






?>

</body>
</html>
</body>
</html>