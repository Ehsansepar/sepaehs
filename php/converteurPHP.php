<?php 

$metre = $_GET['metre'];
$foot = $_GET['foot'];

$metretofoot = ($metre / 3.28084);

echo '<section>';
echo '<div class="form-box">';

echo '' . round($metre, 2) . ' Mètre' . '<br>';
echo '' . round($metretofoot, 2) . ' pied';

echo '</div>';
echo '</section>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume de la Pyramide</title>

    <style>
            p{
            position: fixed;
            top: 120px;
            text-align: center;
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
            font-size: 30px;
        }
    
    * {
    margin: 0;
    padding: 0;
    font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
            color: white;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    background: url("/html/les_pages_exercices/images/html_table.jpg") no-repeat fixed center;
    background-position: center;
    background-size: cover;
}

.form-box {
    padding-right: 30px;
    padding-left: 30px;
    border: 1px solid white;
    position: relative;
    width: 6+50px;
    height: 200px;
    background: transparent;
    border: none;
    border-radius: 20px;
    backdrop-filter: blur(15px) brightness(80%);
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40px;
}
    </style>
</head>
<body>
    
</body>
</html>