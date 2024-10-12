<?php
// Database credentials
define('DB_SERVER', 'mysql-sepaehs.alwaysdata.net');
define('DB_USERNAME', 'sepaehs');
define('DB_PASSWORD', 'onuq7256');
define('DB_NAME', 'sepaehs_info');

// Create a connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn->connect_error){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>
