<?php
if(isset($_SESSION["email"])) {
    
    echo '<a href="logout.php">Déconnexion</a>';
    
    //On est connecté
}
else {
    //On est pas connecté
    ?>
    <a href="login.php">Connexion</a>
    <a href="inscription.php">Inscription</a>
    <?php
}