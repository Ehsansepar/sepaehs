<?php
session_start(); // Start the session

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

include("user_logged/config.php");


// Simple query without using prepared statements
$sql = "DELETE FROM alwaysdata_connection WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "Account deleted successfully!";
        header("Location: extra_staf/loading_page_when_delete_account.php");
        exit;
    } else {
        echo "Error deleting account: No matching records found.";
    }
} else {
    echo "Error deleting account: " . mysqli_error($conn);
}

mysqli_close($conn);
session_destroy();
session_destroy();
?>
