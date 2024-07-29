<?php
$servername = "mysql-sepaehs.alwaysdata.net";
$dbname = "sepaehs_alwaysdata_conn";
$dbusername = "sepaehs"; // Change to your database username
$dbpassword = "onuq7256"; // Change to your database password

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM sepaehs_alwaysdata_conn WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>
