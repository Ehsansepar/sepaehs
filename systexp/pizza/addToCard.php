

<?php
 require_once("secure/dbConnect.php");
 $item = htmlspecialchars($_POST['item']);


 if($item != "") {
    

    make a select to the  boisson to get the id of the item sended and put iot in the variable

    get the user id from session

    insert in the table command user_id,boisson_id

    if the inser is success full

    send respond 
    
    ok
 }


?>