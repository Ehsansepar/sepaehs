<?php

// Récupération des données saisies dans le formulaire d'inscription
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['naissance'];
$email = $_POST['email'];

$sexe = $_POST['sexe'];

// Adresse
$rue = $_POST['rue'];
$codePostal = $_POST['code_postal'];
$ville = $_POST['localite'];

// Expéditeur de l'e-mail de confirmation
$expéditeur = "Ehsan Separ <sepaehs@sjb-liège.org>";

// Objet et message de l'e-mail de confirmation
$sujet = "Confirmation d'inscription";
$message = "
    Cher(e) $nom $prenom,\n\n
    
    Merci de vous être inscrit(e) sur notre site web ! Votre compte a été créé avec succès.\n\n
    Vos identifiants de connexion sont les suivants :\n
    Nom d'utilisateur : $nom $prenom\n
    Adresse e-mail : $email\n\n
    
    Connectez-vous avec ces identifiants et n'oubliez pas de nous contacter si vous avez besoin d'aide.\n\n
    Cordialement,\n
    Ehsan Separ
";

// Envoi de l'e-mail de confirmation
mail($email, $sujet, $message, $expéditeur);

?>