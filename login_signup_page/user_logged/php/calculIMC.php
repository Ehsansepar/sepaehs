<?php

$taille = $_POST['taille'];
$kg = $_POST['kg'];

$calcul = $kg / ($taille * $taille);

echo ($calcul) . ' Vous êtes bon santé';

?>