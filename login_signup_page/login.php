<?php



  $username = $_POST["email"];
  $password = $_POST["password"];

$servername = "mysql-sepaehs.alwaysdata.net";
$dbname = "sepaehs_info";
$username = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli($servername, "sepaehs", "onuq7256", $dbname); 
// $query = "SELECT * FROM login_page WHERE username='$username' AND password='$password'";

$query = "SELECT * FROM alwaysdata_connection WHERE username='$username' AND password = '$password'";
$result = $conn->query($query);




if ($result->num_rows > 0) {

    // header("Location: welcome.php");
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    

    session_start();
    
    $_SESSION['username'] = $row['username'];
    
    header("Location: user_logged/index.php");
    // header("Location: user_logged/index.php?username=$username");

    exit;
}

else {
  $error = "Invalid username or password";
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <style>
        .password_email_error {
            padding-left: 50px;
            /* margin-right: auto; margin-left: auto; */
            font-weight: bold;
        }
    </style>

</head>
<body>
    <div class="continer">
        <h1>Login
        </h1>
        <?php if (isset($error)) { echo "<p class='password_email_error' style='color:red;'>$error</p>"; } ?>

        <div class="form">
        <form action="login.php" method="post">
            <!-- <label class="text" for="email">Email</label><br> -->
            <input type="text" class="email" name="email" id="email" placeholder="Username" required>
            <br><br>
            <!-- <label class="text" for="password">Password</label><br> -->
            <input type="password" class="password" name="password" id="password" placeholder="Password" required><br>


            <!-- <input type="submit" value=""> -->
            <input class="button" type="submit" value="login">
            <!-- <button type="submit" class="button">Login</button> -->


            <p class="Forget">Forget <a href="#">Password</a></p>
            <p class="signup">Don't have an account? <a style="a:active {color:white}" href="signup.php">Sign Up</a></p>
            
            
        </div>

    </div>

        </form>
</body>
</html>