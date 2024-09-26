
<?php

$taille = $_POST['taille'] / 100;
$poids = $_POST['kg'];

$IMC = round(($poids / $taille**2),1);

// $IMC = ceil($IMC * 10000);

// echo 'votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc votre  IMC est de  = ' . ($calcul);
// echo ("<img src='/image/imc.png'>"); 



    if ($IMC < 19)
{
    echo "<br><p>Votre poids insuffisant de votre taille. Mangez plus!!</p> ";
    echo 'votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc <p  class="blue"> votre  IMC est de  = ' . ($IMC) . '</p>';
    
    // echo ("<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ob%C3%A9sit%C3%A9_et_IMC.png/800px-Ob%C3%A9sit%C3%A9_et_IMC.png'>");
}
elseif ($IMC < 25)
{
    echo "<br><p>Votre poids est bien. </p>";
    echo '<br><p>votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc <p  class="bien"> votre  IMC est de  = ' . ($IMC) . '</p></p>';

    // echo ("<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ob%C3%A9sit%C3%A9_et_IMC.png/800px-Ob%C3%A9sit%C3%A9_et_IMC.png'>");

    }
elseif ($IMC < 30)
{
    echo "<br><p>Votre poids modérément excessif de votre taille. C'est pas grave.</p>";
    echo '<p>votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc <p  class="jean"> votre  IMC est de  = ' . ($IMC) . '</p>';
    
    // echo ("<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ob%C3%A9sit%C3%A9_et_IMC.png/800px-Ob%C3%A9sit%C3%A9_et_IMC.png'>");

}
elseif ($IMC < 35)
    {
    echo "<p><br>Votre poids est excessif compte de votre taille. Faites attention!</p>";
    echo '<p>votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc votre <p  class="jean_desert"> IMC est de  = ' . ($IMC) . '</p>';
    
    // echo ("<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ob%C3%A9sit%C3%A9_et_IMC.png/800px-Ob%C3%A9sit%C3%A9_et_IMC.png'>");

}

elseif ($IMC < 41)
    {
    echo "<p><br>Votre poids est beaucoup compte de votre taille. Faites attention!</p>";
    echo '<p>votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc votre <p  class="jean_desert_trop"> IMC est de  = ' . ($IMC) . '</p>';
    
    // echo ("<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ob%C3%A9sit%C3%A9_et_IMC.png/800px-Ob%C3%A9sit%C3%A9_et_IMC.png'>");

}

else
{
    // echo ("<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Ob%C3%A9sit%C3%A9_et_IMC.png/800px-Ob%C3%A9sit%C3%A9_et_IMC.png'>");
    echo "<br><p>Votre poids est beaucoup trop important de votre taille. Vous souffrez d’obésité.</p>";
    echo '<p>votre poids est de ' . ($poids) . 'kg' .  ' et votre la taille est de ' . ($taille) . 'cm'. ' donc votre  <p  class="trop"> IMC est de  = ' . ($IMC) . '</p>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        p {
            font-size: 50px;
            font-weight: bold;
            margin: 10 10;
        }
        body {
            text-align: center;
        }
        .image {
            width: 650px;
            height: 350px;
        }
        .bien {
            color: green;
        }
        .jean {
            color:yellow;
        }
        .jean_desert {
            color: rgb(250, 196, 20);
        }
        .jean_desert_trop {
            color: rgb(255, 123, 14);
        }
        .trop {
            color:red;
        }
        .blue {
            color: blue;
        }
    </style> 
</head>
<body>
    <br><img class="image" src="https://coeuretsanteblois.fr/wp-content/uploads/2021/08/roue-calcul-imc.png" alt="">
</body>
</html>

