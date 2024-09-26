<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the username, password, and repassword from the form
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $username = $_POST["username"];
  $email = $_POST["email"];

  $phone_number = $_POST['number'];
  $adresse = $_POST['adresse'];

  $password = $_POST["password"];
  $repassword = $_POST["repassword"];

  // Check if the passwords match
  if ($password != $repassword) {
    $error_pass = "Passwords do not match";
  } else {
    // Connect to the database
    $conn = mysqli_connect("mysql-sepaehs.alwaysdata.net", "sepaehs", "onuq7256", "sepaehs_info");

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Check i username already exists
    $query = "SELECT * FROM alwaysdata_connection WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $error_username = "Username already exists";
    } else {
      // Insert the new user into the database
      $query = "INSERT INTO alwaysdata_connection (nom, prenom, email ,username, password, adresse, phone_number) VALUES ('$nom', '$prenom', '$email' ,'$username', '$password', '$adresse', '$phone_number')";
      if (mysqli_query($conn, $query)) {
        header("Location: extra_staf/loading_page_when_signup.html");
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    }

    mysqli_close($conn);
  }

  // Get the user's email and name from your form (adjust variable names as needed)
  $userEmail = $_POST['email'];
  $userName = $_POST['name'];
  
  // Define the subject of the email

  // Get the user's email, first name, last name, and username from your form (adjust variable names as needed)

  // Define the subject of the email
  $subject = "Welcome to Our Website, $nom $prenom!";
  
  // Create the HTML message
  $message = "
  <html>
  <head>
    <title>Welcome to Our Website!</title>
    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
      }
      .email-container {
        max-width: 600px;
        background-color: #ffffff;
        padding: 20px;
        margin: 50px auto;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      }
      .header {
        background-color: #0066cc;
        color: white;
        padding: 30px;
        border-radius: 15px 15px 0 0;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
      }
      .content {
        padding: 20px;
        color: #444;
        text-align: left;
      }
      .content p {
        line-height: 1.8;
        margin: 15px 0;
      }
      .content ul {
        padding-left: 20px;
      }
      .content ul li {
        margin: 10px 0;
      }
      .button {
        display: block;
        width: 200px;
        margin: 20px auto;
        padding: 15px;
        text-align: center;
        background-color: #0066cc;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      }
      .button:hover {
        background-color: #005bb5;
      }
      .footer {
        text-align: center;
        font-size: 12px;
        color: #888;
        padding: 15px;
        border-top: 1px solid #eee;
        margin-top: 30px;
      }
    </style>
  </head>
  <body>
    <div class='email-container'>
      <div class='header'>
        Welcome, $nom $prenom!
      </div>
      <div class='content'>
        <p>Hi $username,</p>
        <p>We're thrilled to have you join our community! You are now part of a network of amazing people, and we can’t wait for you to explore everything we offer.</p>
        <p>Here are a few things you can do next:</p>
        <ul>
          <li>Explore our content and resources.</li>
          <li>Connect with other users and expand your network.</li>
          <li>Personalize your profile and settings.</li>
        </ul>
        <p>We are here to help if you have any questions!</p>
        <a href='https://sepaehs.alwaysdata.net/www_v2' class='button'>Get Started</a>
        <p>Thank you for signing up!</p>
        <p>Best Regards,<br>The Team</p>
      </div>
      <div class='footer'>
        <p>If you did not sign up for this account, please ignore this email or contact us at sepaehs@sjb-liege.org.</p>
      </div>
    </div>
  </body>
  </html>
  ";
  
  // Define the email headers
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
  // Additional headers (adjust "From" and "Reply-To" as necessary)
  $headers .= 'From: sepaehs@sjb-liege.org' . "\r\n";
  $headers .= 'Reply-To: sepaehs@sjb-liege.org' . "\r\n";
  
  // Send the email
  if(mail($email, $subject, $message, $headers)) {
      echo "Email sent successfully!";
  } else {
      echo "Failed to send email.";
  }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>

body {
    background-image: url(html_table.jpg);
    background-size: 100%;
    background-repeat: no-repeat;
    /* font-weight: bold; */
    font-family: Arial, Helvetica, sans-serif;
}

h1 {
    margin-right: auto; margin-left: auto;
    text-align: center;
    padding-top: 50px;
    padding-bottom: 50px;
    font-weight: bold;
    color: white;

}
.email, .password {
    width: 250px;
    color: white;
    text-align: left;
    border-top-style: none;
    border-left-style: none;
    border-right-style: none;
    padding-bottom: 6px;
    border-color: rgb(197, 197, 197);
    font-size: medium;


        background: transparent;
        backdrop-filter: blur(20px) brightness(100%);
}

::placeholder {
    margin-bottom: 50px;
    padding-left: 5px;
    color: white;
}
.continer {
    width: 22.5%;
    height: 700px;
    margin-right: auto; margin-left: auto;
    border-radius: 20px;
    border-color: aliceblue;
    margin-top: 100px;
    border: 1px solid black;
    background-color: white;
    /* position: absolute; */


        background: transparent;
        backdrop-filter: blur(20px) brightness(100%);
        border: none;
}
.form {
    height: fit-content;
    width: fit-content;
    margin-right: auto; margin-left: auto;
    text-align: left;
    /* position: relative; */
}

.button {
    background-color: rgb(185, 195, 196);
    margin-top: 40px;
    width: 100%;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    color: white; /* or any other color you prefer */
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    cursor: pointer;
    border-radius: 10px;

    transition: 4s ease-in-out;
}
.button:hover {
    background-color: red;
    /* height: 60px; */
    transition: 5s;

    /* transform: 120deg; */
    transform: rotate(1440deg);
}

.Forget, a {
    margin-right: auto; margin-left: auto;
    font-size: smaller;
    margin-top: 50px;
    /* color: gray; */
    text-align: center;
    margin-bottom: 0px;
}

p {
    color: white;
}
.signup {
    margin-right: auto; margin-left: auto;
    font-size: smaller;
    text-align: center;
    margin-bottom: 0px;
}

.password_email_error {
        /* padding-left: 80px; */
        text-align: center;
        font-weight: bold;
    }


    .checkbox-show-pass {
    color: white;
    margin-top: 10px;
}

.password-verification {
    font-size: 14.5px;
}

/* ******************************************************************************************* */

@media only screen and (max-width: 500px) {

    body {
        background-image: url(background_photo.jpg);
        background-repeat:no-repeat;
        background-size:contain;
        background-position:center;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }

    h1 {
        color: white;
        font-size: 55px;
    }

    .continer {
        width: 80%;
        height: 700px;
        margin-right: auto; margin-left: auto;
        border-radius: 20px;
        border-color: aliceblue;
        margin-top: 50px;
        border: 1px solid black;
        background-color: white;
        /* position: absolute; */
        background: transparent;
        backdrop-filter: blur(3px) brightness(100%);
        border: none;
    }

    .email, .password { 
        background: transparent;
        backdrop-filter: blur(2px) brightness(100%);
        border-bottom-color: white;
    }

    ::placeholder {
        color: white;
    }

    .Forget, .signup {
        color: white;
    }

    .Forget, .signup, a {
        font-size: 15px;
    }


    .password_email_error {
        padding-left: 50px;
        font-weight: bold;
    }

}

    </style>


</head>
<body>
    <div class="continer">
        <h1>Sign Up</h1>
        <?php if (isset($error_pass)) { echo "<p class='password_email_error' style='color:red;'>$error_pass</p>"; } ?>
        <?php if (isset($error_username)) { echo "<p class='password_email_error' style='color:red;'>$error_username</p>"; } ?>

        <div class="form">
        <form action="signup.php" method="post">
            <input class="email" type="text" name="nom" placeholder="Nom" required><br><br>
            <input class="email" type="text" name="prenom" placeholder="Prénom" required><br><br>

            <input class="email" type="email" name="email" placeholder="Email" required><br><br>


            <input class="email" type="text" name="adresse" placeholder="Adresse" required><br><br>
            <input class="email" type="text" name="number" placeholder="Tel" required><br><br>

            <input class="email" type="text" name="username" placeholder="Username" required><br><br>
            <input class="password" id="password" type="password" name="password" placeholder="Password" required><br><br>
            <input class="password" id="repassword" type="password" name="repassword" placeholder="Re-enter Password" required><br><br>

                    <p class="password-verification" id="password-verification"></p>
                    

            <div class="checkbox-show-pass">
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Show password</label>
                </div>

            <input class="button" type="submit" name="submit" value="Sign Up">
        </form>
        </div>
    </div>

    <script>

const passwordInput = document.getElementById('password');
    const repasswordInput = document.getElementById('repassword');
    const showPasswordCheckbox = document.getElementById('show-password');
    const passwordVerificationElement = document.getElementById('password-verification');

    showPasswordCheckbox.addEventListener('click', () => {
      if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text';
        repasswordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
        repasswordInput.type = 'password';
      }
    });

    passwordInput.addEventListener('input', () => {
      const passwordValue = passwordInput.value;
      const repasswordValue = repasswordInput.value;
      if (passwordValue !== repasswordValue) {
        passwordVerificationElement.textContent = 'Passwords do not match';
        passwordVerificationElement.style.color = 'red';
      } else if (passwordValue.length < 8) {
        passwordVerificationElement.textContent = 'Password is too short (min 8 characters)';
        passwordVerificationElement.style.color = 'red';
      } else {
        passwordVerificationElement.textContent = 'Password is valid';
        passwordVerificationElement.style.color = 'green';
      }
    });

    repasswordInput.addEventListener('input', () => {
      const passwordValue = passwordInput.value;
      const repasswordValue = repasswordInput.value;
      if (passwordValue !== repasswordValue) {
        passwordVerificationElement.textContent = 'Passwords do not match';
        passwordVerificationElement.style.color = 'red';
      } else if (passwordValue.length < 8) {
        passwordVerificationElement.textContent = 'Password is too short (min 8 characters)';
        passwordVerificationElement.style.color = 'red';
      } else {
        passwordVerificationElement.textContent = 'Password is valid';
        passwordVerificationElement.style.color = 'green';
      }
    });


    </script>


</body>
</html>