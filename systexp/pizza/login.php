<?php
if(isset($_POST['mail'])) {
    session_start();
    $email = htmlspecialchars($_POST['mail']);
    $password = hash('sha256', htmlspecialchars($_POST['mdp']));

    require_once("secure/dbConnect.php");
    $request = $dbPizza->prepare("SELECT * FROM Utilisateurs
                       WHERE email = :email AND password = :password");
    $request->execute(array(
        ":email" => $email,
        ":password" => $password
    ));
    $results = $request->fetchAll();
    echo $results;
    echo count($results);
    if(count($results) == 1) {
        //Ok pour la connexion
        $_SESSION["email"] = $email;
        header('Location: index.php');
        die();
    }
    echo "Mauvaise combinnaison de login et mot de passe";

}

?>

<form method="post" action="">
    Mail : <input type="email" name="mail" value="<?php echo $_POST['mail'] ?? "";?>"><br>
    Mot de passe: <input type="password" name="mdp" value="<?php echo $_POST['mdp'] ?? "";?>"><br>
    <button type="submit">Inscription</button>
</form>