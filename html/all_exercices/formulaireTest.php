<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    if ($age < 18) {
        echo "<p style='color:red;'>Désolé, vous ne pouvez pas accéder à ce site.</p>";
        echo "<a style='color:red' href='formulaireTest.html'>Page Connexion</p></a>";
    } else {
        
        echo "<p style='color:green;'>Bonne visite !</p>";
    }
}
?>
