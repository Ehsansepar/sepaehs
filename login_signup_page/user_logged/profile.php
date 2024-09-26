
<?php 

session_start();


// detabase conn
include('config.php');

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
}

$sql = "SELECT * FROM alwaysdata_connection WHERE username = '$username'";
$result = $conn->query($sql); // Execute the query

if ($result->num_rows > 0) {
    $username = $result->fetch_assoc();  // Fetch user details as an associative array

    $nom =  $username['nom'];

} else {
    echo "User not found!";
        if (!isset($nom)) {
            header("Location: ../index.php");
        
        }
}


?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #343a40;
            margin-top: -80px;
            background-color: white;
        }
        .profile-info {
            margin-top: 15px;
        }
        .profile-info h5 {
            font-size: 18px;
            font-weight: 600;
            color: #343a40;
        }
        .profile-info p {
            font-size: 16px;
            color: #6c757d;
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
        .btn-logout {
            background-color: #dc3545;
            border-color: #dc3545;
            color: white;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }

        .profile-picture {
            border-radius: 50%;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-container">
                    <div class="profile-header">
                        <h2>User Profile</h2>
                    </div>
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture">
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <div class="profile-info">
                                <h5>Nom: <?php echo strtoupper($username['nom'])?></h5>
                                <h5>Prénom: <?php echo $username['prenom']?></h5>
                                <p>Email: <?php echo $username['email']?></p>
                                <p>Phone: <?php echo $username['phone_number']?></p>
                                <p>Address: <?php echo $username['adresse']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="profile-info text-center">
                                <h5>Joined Date</h5>
                                <p><?php echo $username['created_at']?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-info text-center">
                                <h5>Role</h5>
                                <p>Admin</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <div class="profile-info">
                                <h5>About Me</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent suscipit urna eget felis scelerisque, ut bibendum eros gravida.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 text-center">
                            <a href="edit_profile.php" class="btn btn-custom btn-lg">Edit Profile</a>
                        </div>
                        <div class="col-md-6 text-center">
                            <a href="logout.php" class="btn btn-logout btn-lg">Logout</a>
                        </div>
                        <!-- Add Delete Button Here -->
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#confirmationModal">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    Are you sure you want to permanently delete your account?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="../delete_account.php" method="POST">
                        <button type="button" class="btn btn-danger" onclick="submitDeleteForm()">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function submitDeleteForm() {
            // Submit the form
            document.getElementById('deleteForm').submit();
            
            // Optionally hide the modal after submission
            $('#confirmationModal').modal('hide');
        }
    </script>
</body>
</html>
