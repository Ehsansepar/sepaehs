<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <?php
            $conn = mysqli_connect("mysql-sepaehs.alwaysdata.net", "sepaehs", "onuq7256", "sepaehs_test");

            if (isset($_GET['code'])) {
                $code = $_GET['code'];
                $sql = "SELECT id FROM users WHERE activation_code = '$code' AND is_active = 0";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $update_sql = "UPDATE users SET is_active = 1 WHERE activation_code = '$code'";
                    if (mysqli_query($conn, $update_sql)) {
                        echo "<h2 class='text-2xl font-bold mb-6 text-center'>Your account has been activated!</h2>";
                        echo "<p class='text-center'><a href='login.php' class='text-indigo-600 underline'>Login</a></p>";
                    } else {
                        echo "<h2 class='text-2xl font-bold mb-6 text-center text-red-600'>Error activating account</h2>";
                        echo mysqli_error($conn);
                    }
                } else {
                    echo "<h2 class='text-2xl font-bold mb-6 text-center text-red-600'>Invalid or expired activation code</h2>";
                }
            } else {
                echo "<h2 class='text-2xl font-bold mb-6 text-center text-red-600'>No activation code provided</h2>";
            }
            ?>
        </div>
    </div>
</body>
</html>
