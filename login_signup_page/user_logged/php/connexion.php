<?php

    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    
    mail($mail, "Confirmation inscription", "Bonjour" .$nom." tu es bien inscript");
    
    ?>