<?php
if(isset($_POST['email'])) {
    session_start();
    $email = htmlspecialchars($_POST['email']);
    $password = hash('sha256', htmlspecialchars($_POST['password']));

    require_once("secure/dbConnect.php");
    $request = $dbPizza->prepare("SELECT * FROM Utilisateurs
                       WHERE email = :email AND password = :password");
    $request->execute(array(
        ":email" => $email,
        ":password" => $password
    ));
    $results = $request->fetchAll();
    echo $results;
    echo count($results);
    if(count($results) == 1) {
        //Ok pour la connexion
        $_SESSION["email"] = $email;
        header('Location: index.php');
        die();
    }
    echo "Mauvaise combinnaison de login et mot de passe";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>

    <style>
        body {
    background-image: url(image/background.jpg);
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
        backdrop-filter: blur(100px) brightness(50%);
}

a:active {
    color: white;
}

::placeholder {
    margin-bottom: 50px;
    padding-left: 5px;
    color: white;
}
.continer {
    width: 22.5%;
    height: 500px;
    margin-right: auto; margin-left: auto;
    border-radius: 20px;
    border-color: aliceblue;
    margin-top: 100px;
    border: 1px solid black;
    background-color: white;
    /* position: absolute; */


        background: transparent;
        backdrop-filter: blur(100px) brightness(50%);
        border: 1px solid white;
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
    /* padding-left: 50px; */
    font-weight: bold;
    text-align: center;
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
        height: 600px;
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
        <h1>Login
        </h1>
        <div class="form">
        <form method="post">
            <!-- <label class="text" for="email">Email</label><br> -->
            <input type="email" class="email" name="email" id="email" placeholder="Email" required>
            <br><br>
            <!-- <label class="text" for="password">Password</label><br> -->
            <input type="password" class="password" name="password" id="password" placeholder="Password" required><br>

                    <p class="password-verification" id="password-verification"></p>

                    <div class="checkbox-show-pass">
                    <input type="checkbox" id="show-password">
                    <label for="show-password">Show password</label>
                    </div>


            <!-- <input type="submit" value=""> -->
            <input class="button" type="submit" value="login">
            <!-- <button type="submit" class="button">Login</button> -->

            <p class="Forget">Forget <a href="#">Password</a></p>
            <p class="signup">Don't have an account? <a style="::active {color:white}" href="signup.php">Sign Up</a></p>
        </div>

    </div>

        </form>


        <script>
                // const passwordInput = document.getElementById('password');
                // const showPasswordCheckbox = document.getElementById('show-password');
                // const passwordVerificationElement = document.getElementById('password-verification');

                // showPasswordCheckbox.addEventListener('click', () => {
                // if (showPasswordCheckbox.checked) {
                //     passwordInput.type = 'text';
                // } else {
                //     passwordInput.type = 'password';
                // }
                // }); 

                passwordInput.addEventListener('input', () => {
                const passwordValue = passwordInput.value;
                if (passwordValue.length < 8) {
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