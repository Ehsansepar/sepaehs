<?php
if (isset($_POST['mail'])) {
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

    if (count($results) == 1) {
        $_SESSION["email"] = $email;
        $_SESSION["nom"] = $results[0]['nom'];
        $_SESSION["prenom"] = $results[0]['prenom'];
        header('Location: index.php');
        die();
    } else {
        $error_message = "Mauvaise combinaison de login et mot de passe";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Pizzzzzzzza</title>
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 10px 20px;
        }

        .navbar a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar a.active {
            background-color: #ff6347; /* Couleur tomate */
            color: white;
        }

        /* Formulaire de connexion */
        .container {
            padding: 50px;
            text-align: center;
        }

        h1 {
            color: #ff6347;
            font-size: 2.5em;
        }

        .login-form {
            display: inline-block;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #e5533d;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="menu.php">Menu</a>
        <a href="contact.php">Contact</a>
    </div>

    <!-- Formulaire de connexion -->
    <div class="container">
        <h1>Connexion</h1>
        <form method="post" action="" class="login-form">
            <input type="email" name="mail" value="<?php echo $_POST['mail'] ?? ''; ?>" placeholder="Email" required>
            <input type="password" name="mdp" id="password" value="<?php echo $_POST['mdp'] ?? ''; ?>" placeholder="Mot de passe" required>
            <label for="show-password">Voir<input type="checkbox" onclick="showmdp()" name="show-password" id="show-password"></label>
            <button type="submit">Se connecter</button>

            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </form>
    </div>

    <script>
           function showmdp() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


                
        </script>
</body>

</html>
