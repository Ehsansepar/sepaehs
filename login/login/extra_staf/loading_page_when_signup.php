<?php

// $conn = mysqli_connect("localhost", "username", "password", "database");
$conn = mysqli_connect("mysql-sepaehs.alwaysdata.net", "sepaehs", "onuq7256", "sepaehs_test");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['code'])) {

$confirmation_code = $_GET['confirmation_code'];

// SQL query to check the confirmation code and is_active status
$sql = "SELECT * FROM users WHERE confirmation_code = '$confirmation_code' AND is_active = 1 AND (bit(0) & confirmation_code) = 1 AND (bit(1) & confirmation_code) = 1";

$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
    sleep(2);
    header("Location: /activate.php");
    exit;
} else {
    sleep(5);
    header("Location: error.php");
    exit;
}

}
// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Loading Animation</title>
      <!-- <link rel="stylesheet" href="style.css"> -->
       <style>
        
        h1 {
            text-align: center;
            padding-bottom: 0px;
            margin-bottom: 0px;
        }

        body{
  margin: 0;
  padding: 0;
  font-family: montserrat;
  background: black;
}
.center{
  display: flex;
  text-align: center;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  top: 50px;
}
.ring{
  position: absolute;
  width: 300px;
  height: 300px;
  margin-top: 0px;
  border-radius: 50%;
  animation: ring 2s linear infinite;
}
@keyframes ring {
  0%{
    transform: rotate(0deg);
    box-shadow: 1px 5px 2px #e65c00;
  }
  50%{
    transform: rotate(180deg);
    box-shadow: 1px 5px 2px #18b201;
  }
  100%{
    transform: rotate(360deg);
    box-shadow: 1px 5px 2px #0456c8;
  }
}
.ring:before{
  position: absolute;
  content: '';
  left: 0;
  top: 0;
  height: 300px;
  width: 300px;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(255,255,255,.3);
}
span{
  color: #737373;
  font-size: 40px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 1px;
  line-height: 200px;
  animation: text 3s ease-in-out infinite;
}
@keyframes text {
  50%{
    color: black;
  }
}


                @media only screen and (max-width: 500px) {
                          
                }
       </style>
   </head>
   <body>
    <h2 style="color: white;text-align: center">We are waiting For Confirmation</h1>
    <h1 style="text-align: center; visibility: hidden;">Counter</h1>
      <div class="center">
         <div class="ring"></div>
         <span>loading...</span>
      </div>

      <script>
                        let counter = document.querySelector('h1');
                        let count = 1;
                        setInterval(()=>{
                            counter.innerText = count;
                            count++
                            
                            if(count > 5) location.replace('../index.php')
                            
                        },1000)
      </script>

   </body>
</html>