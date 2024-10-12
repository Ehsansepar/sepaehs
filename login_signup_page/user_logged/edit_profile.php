<?php
// Database connection setup
include("config.php");

session_start();
$user = $_SESSION['username']; // Use session variable to get logged-in user's username

// Fetch user data
$sql = "SELECT * FROM alwaysdata_connection WHERE username = '$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $username = $result->fetch_assoc();
    $user = $username['username'];
    $nom = $username['nom'];
    $prenom = $username['prenom'];
    $email = $username['email'];
    $phone_number = $username['phone_number'];
    $adresse = $username['adresse'];
} else {
    die("User not found!");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_address = $_POST['adresse'];

    // Update the user's data
    $sql = "UPDATE alwaysdata_connection SET 
                nom = '$last_name', 
                prenom = '$first_name',
                email = '$user_email', 
                phone_number = '$user_phone', 
                adresse = '$user_address'
            WHERE username = '$user'"; // Removed the extra comma before WHERE

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success text-center'>Profile updated successfully!</div>";
        session_reset();
        header("Location: profile.php");
        
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: Arial, sans-serif;
        }
        .profile-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }
        .profile-container:hover {
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2);
        }
        .profile-header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-container">
                <div class="profile-header">
                    <h2>Edit Profile</h2>
                </div>

                <!-- Profile Edit Form -->
                <form method="POST" action="edit_profile.php">
                    <div class="row mt-4">
                        <div class="col-md-6 form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="last_name" value="<?php echo $nom; ?>" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="name">Prénom</label>
                            <input type="text" class="form-control" id="name" name="first_name" value="<?php echo $prenom; ?>" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 form-group">
                            <label for="phone">GSM</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone_number; ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="address">Adresse</label>
                            <input type="text" class="form-control" id="address" name="adresse" value="<?php echo $adresse; ?>" required>
                        </div>
                    </div>

                    <!-- <div class="row mt-4">
                        <div class="col-md-12 form-group">
                            <label for="about">About Me</label>
                            <textarea class="form-control" id="about" name="about" rows="4" required><?php echo $user_about; ?></textarea>
                        </div> -->
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-custom btn-lg">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
