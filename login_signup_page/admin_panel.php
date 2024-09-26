<?php
$username = "sepaehs";
$password = "onuq7256";
$database = "sepaehs_info";

$mysqli = new mysqli("mysql-sepaehs.alwaysdata.net", $username, $password, $database);

$query = "SELECT * FROM alwaysdata_connection";
echo "<table>";
echo "<tr><th>Username</th><th>Password</th><th>Action</th></tr>";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["username"]. "</td>";
        echo "<td>". $row["password"]. "</td>";
        echo "<td><form action='delete.php' method='post'><input type='hidden' name='username' value='".$row["username"]."'><input type='submit' class='delete_user' value='Delete'></form></td>";
        echo "</tr>";
    }
    $result->free();
}
echo "</table>";
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border: 1px solid black;
        }
        tr, td {
            border: 1px solid black;
            margin-bottom: 0px;
            margin-top: 0px;

            padding-bottom: 0px;
            padding-top: 0px;
        }
        .delete_user {
            background-color: red;
            margin-top: 10px;
            margin-bottom: 0px;
        }

    </style>

</head>
<body>
    
</body>
</html>