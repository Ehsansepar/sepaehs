<?php

$base = $_POST['base'];
$hauteur = $_POST['hauteur'];
$surface = $base * $hauteur / 2;

    echo('La somme du triangle <br>'.
    $base. ' X '.$hauteur. ' = '.$surface);

?>