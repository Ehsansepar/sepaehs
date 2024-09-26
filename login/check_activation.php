<?php
// Database connection
$conn = mysqli_connect("mysql-sepaehs.alwaysdata.net", "sepaehs", "onuq7256", "sepaehs_test");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the account is activated
    $sql = "SELECT is_active FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && $user['is_active'] == 1) {
        echo 'activated'; // return 'activated'
    } else {
        echo 'not_activated'; // return 'not_activated'
    }
}
?>
