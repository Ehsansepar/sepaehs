<?php
    if(isset($_POST['nom'])) {
        //Valider le formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $telephone = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['mail']);
        $password = hash('sha256', htmlspecialchars($_POST['mdp']));

        try {

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception();
            require_once("secure/dbConnect.php");
            //Creer l'utilisateur (ne pas oublier de crypter le password)
            $request = $dbPizza->prepare("INSERT into Utilisateurs (nom, prenom, telephone, email, password)
                                        VALUES(:nom, :prenom, :telephone, :email, :password)");


            $request->execute(array(
                ":nom" => $nom,
                ":prenom" => $prenom,
                ":telephone" => $telephone,
                ":email" => $email,
                ":password" => $password
            ));

            //Si tout est ok ==> rediriger vers la page index
            header('Location: login.php');
            die();
        }
        catch(Exception $e) {
            echo "Veuillez resseayer<br>";
        }

        
    }


    //if(isset($_POST['nom'])) echo $_POST['nom']
    // echo $_POST['nom'] ?? ""
?>

<form method="post" action="">
    Nom : <input type="text" name="nom" value="<?php echo $_POST['nom'] ?? "";?>"><br>
    Prénom : <input type="text" name="prenom" value="<?php echo $_POST['prenom'] ?? "";?>"><br>
    Téléphone : <input type="text" name="tel" value="<?php echo $_POST['tel'] ?? "";?>"><br>
    Mail : <input type="email" name="mail" value="<?php echo $_POST['mail'] ?? "";?>"><br>
    Mot de passe: <input type="password" name="mdp" value="<?php echo $_POST['mdp'] ?? "";?>"><br>
    <button type="submit">Inscription</button>



