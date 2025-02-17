<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzzzzzzza</title>
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

        /* Contenu principal */
        .container {
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #ff6347; /* Couleur tomate */
            font-size: 3em;
            margin-top: 50px;
        }

        .welcome-message {
            font-size: 1.5em;
            color: #333;
            margin-top: 20px;
        }

        /* Bouton de déconnexion */
        .logout-btn {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #e5533d;
        }
    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <div class="navbar">
        <a href="index.php" class="active">Accueil</a>
        <a href="menu.php">Menu</a>
        <a href="contact.php">Contact</a>
        <?php if (isset($_SESSION['email'])) : ?>
            <a href="logout.php" style="float: right;">Déconnexion</a>
        <?php else : ?>
            <a href="login.php" style="float: right;">Connexion</a>
        <?php endif; ?>
    </div>

    <!-- Contenu principal -->
    <div class="container">
        <?php if (isset($_SESSION['email'])) : ?>
            <div class="welcome-message">
                Bienvenue <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> !
                <br><?php echo '<a href="commande.php"> <button> Nouvelle Commande </button> </a>'; ?>
            </div>
            <button class="logout-btn" onclick="window.location.href='logout.php'">Déconnexion</button>
        <?php else : ?>
            <h1>Hello World !!</h1>
            <p>Connectez-vous pour accéder à votre espace personnel.</p>
        <?php endif; ?>
    </div>
</body>
</html>