<?php
    if(isset($_POST['nom'])) {
        //Valider le formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['mail']);
        $message = htmlspecialchars($_POST['message']);

        try {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Email invalide");
            
            $to = "sepaehs@sjb-liege.org"; 
            $subject = "Nouveau message de contact - Pizza";
            $message_content = "De: $nom\n";
            $message_content .= "Email: $email\n\n";
            $message_content .= "Message:\n$message";
            $headers = "From: $email";

            if(mail($to, $subject, $message_content, $headers)) {
                echo "<p style='color: green;'>Votre message a été envoyé avec succès!</p>";
            } else {
                throw new Exception("Erreur d'envoi");
            }
        }
        catch(Exception $e) {
            echo "<p style='color: red;'>Une erreur est survenue. Veuillez réessayer.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Pizzzzzzzza</title>
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
            background-color: #ff6347;
            color: white;
        }

        /* Formulaire de contact */
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
        }

        h1 {
            color: #ff6347;
            text-align: center;
            margin-bottom: 30px;
        }

        .contact-form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            background-color: #ff6347;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #e5533d;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="menu.php">Menu</a>
        <a href="contact.php" class="active">Contact</a>
        <?php 
        session_start();
        if (isset($_SESSION['email'])) : ?>
            <a href="logout.php" style="float: right;">Déconnexion</a>
        <?php else : ?>
            <a href="login.php" style="float: right;">Connexion</a>
        <?php endif; ?>
    </div>

    <!-- Contenu principal -->
    <div class="container">
        <h1>Contactez-nous</h1>
        <form method="post" action="" class="contact-form">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $_POST['nom'] ?? "";?>" required>
            </div>
            
            <div class="form-group">
                <label for="mail">Email :</label>
                <input type="email" id="mail" name="mail" value="<?php echo $_POST['mail'] ?? "";?>" required>
            </div>
            
            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" required><?php echo $_POST['message'] ?? "";?></textarea>
            </div>
            
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>
