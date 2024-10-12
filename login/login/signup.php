
<?php
// Connection to the database
$conn = mysqli_connect("mysql-sepaehs.alwaysdata.net", "sepaehs", "onuq7256", "sepaehs_test");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    $activation_code = bin2hex(random_bytes(16)); 
    $_SESSION['code_activate'] = $activation_code;


$password = password_hash($_POST['password'], PASSWORD_BCRYPT);


$sql = "INSERT INTO users (username, email, password, activation_code) 
        VALUES ('".$_POST['username']."', '".$_POST['email']."', '$password', '$activation_code')";
mysqli_query($conn, $sql);


$to = $_POST['email'];
$subject = "Activate Your Account";
// $activation_link = "http://sepaehs.alwaysdata.net/login/activate.php?code=" . $activation_code;
$activation_link = "http://sepaehs.alwaysdata.net/login/extra_staf/loading_page_when_signup.php?code=" . $activation_code;

$message = '
<html>
<head>
    <style>
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4f46e5;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Activate Your Account</h2>
        <p>Thank you for signing up! To activate your account, please click the link below:</p>
        <a href="' . $activation_link . '" class="btn">Activate Account</a>
        <p>If you didn\'t create this account, you can safely ignore this email.</p>
    </div>
</body>
</html>
';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: sepaehs@sjb-liege.org";

mail($to, $subject, $message, $headers);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
            <form action="signup.php" method="POST" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                    <input type="text" id="username" name="username" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                    <input type="password" id="password" name="password" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
