
<?php 
session_start();

$username = $_SESSION['username'];

if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit;
}



$servername = "mysql-sepaehs.alwaysdata.net";
$dbname = "sepaehs_info";

$conn = new mysqli($servername, "sepaehs", "onuq7256", $dbname);

$query = "SELECT nom, prenom FROM alwaysdata_connection WHERE username='$username'";

$result = $conn->query($query);


if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nom = $row['nom']; // Fetch the 'nom' value
  $prenom = $row['prenom']; // Fetch the 'nom' value
} else {
  $nom = "No user found"; // If no result, show this message
    if (isset($nom)) {
      header("Location: ../index.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>HTML css</title>


    <style>
      body {
        background-image: url(html_table.jpg); 
        
      }
                  /*Responsive for Desktop*/ 
                  @media only screen and (min-width: 992px) {
                    
                    .connexion-btn-mobile {
                      display: none;
                    }
                    .inscription-btn-mobile {
                      display: none;
                    }
                  
                    .dropdown_menu {
                    display: none;
                  }


                  .links {
                    /* text-align: center; */
                    /* padding: 50px; */
                    margin-left: 200px;
                    margin-right: auto;
                    /* padding-left: 50%; */
                    display: inline;
                  }

                  .connexion_ins_btn {
                    background-color: rgb(255, 123, 14);
                    color: white;
                    margin-left: 20px;
                    border-radius: 15px;
                    padding: 6px 6px 6px 6px;
                  }

                  .connexion_ins_btn:hover {
                    background-color: rgb(255, 123, 14);
                    color: white;
                    cursor: pointer;
                    background-color: rgb(255, 174, 108);
                    transition: 0.9s;

                  }

                  .txt {
                        /* border-radius: 50px; */
                        font-family: 'Pacifico', cursive;
                        color: white;
                        position: relative;
                        /* padding: 50px 50px; */
                        margin: auto;
                        text-align: center;
                        top: 10px;
                        width: 530px;
                        height: 120px;
                        background: rgba(255, 255, 255, 0.158);
                        backdrop-filter: blur(5px);
                        border-radius: 20px;
                        /* margin-bottom: 10px; */
                        /* overflow: hidden; */
                        padding: 0.7rem;
                        display: flex;
                        font-weight: bold;
                        font-size: 30px;
                        align-items: center;
                        justify-content: center;
                      }

                      .txt_en_haut {
                        font-family: 'Pacifico', cursive;
                        color: white;
                        position: relative;
                        padding: 50px 50px;
                        margin: auto;
                        text-align: center;
                        top: 10px;
                        width: 330px;
                        background: rgba(255, 255, 255, 0.158);
                        backdrop-filter: blur(5px);
                        border-radius: 50px;
                        margin-bottom: 10px;
                        overflow: hidden;
                        padding: 0.7rem;
                        display: flex;
                        font-weight: bold;
                        font-size: 18px;
                        align-items: center;
                        justify-content: center;
                      }

                      .paragraph {
                        font-family: 'Pacifico', cursive;
                        color: white;
                        font-size: large;
                        background: rgba(255, 255, 255, 0.158);
                        backdrop-filter: blur(2px);
                        border-radius: 10px;
                        width: auto;
                        padding: 0.7rem;
                        margin-top: 100px;
                        margin-left: 100px;
                        margin-right: 100px;
                      }
                      /* .txt_in_paragraph {
                        background: rgba(255, 255, 255, 0.062);
                        backdrop-filter: blur(2px);
                        border: none;
                        width: fit-content;
                        position: relative;
                        padding: 0%;
                        margin: auto;
                      } */
                      strong {
                        background: rgba(255, 255, 255, 0.153);
                        /* backdrop-filter: blur(10px); */
                        border-radius: 20px;
                        padding: 5px;
                      }

                }

    @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');



                          /* @media (min-width:480px)  { smartphones, Android phones, landscape iPhone } { */
                            @media (max-width:500px) and (min-width: 6px)  { /* smartphones, portrait iPhone, portrait 480x320 phones (Android) */ 

                              .inscription-btn-mobile {
                                padding-left: 10px;
                                padding-right: 10px;
                                background: rgba(255, 255, 255, 0.158);
                                backdrop-filter: blur(5px);
                                border-radius: 50px;

                                
                              }

                              .connexion-btn-mobile {
                                padding-left: 10px;
                                padding-right: 10px;
                                background: rgba(255, 255, 255, 0.158);
                                backdrop-filter: blur(5px);
                                border-radius: 50px;                 
                              }

                    .dropdown_menu {
                      position: absolute;
                      /* text-align: center; */
                      /* right: 2rem; */
                      top: 204px;
                      width: 330px;
                      background: rgba(255, 255, 255, 0.158);
                      backdrop-filter: blur(5px);
                      border-radius: 20px;
                      overflow: hidden;
                    }

                    .dropdown_menu li {
                      padding: 0.7rem;
                      display: flex;
                      font-weight: bold;
                      font-size: larger;
                      align-items: center;
                      justify-content: center;
                    }

                    .dropdown_menu .action_btn {
                      width: 100%;
                      display: flex;
                      justify-content: center;
                    }
                    h2 {
                      color: white;
                      position: relative;
                      padding: 40px 40px;
                      text-align: center;
                    }
                    
                    .txt {
                      border-radius: 20px;
                      font-family: 'Pacifico', cursive;
                      color: white;
                      position: relative;
                      /* padding: 50px 50px; */
                      margin: auto;
                      text-align: center;
                      top: 10px;
                      width: 330px;
                      background: rgba(255, 255, 255, 0.158);
                      backdrop-filter: blur(5px);
                      overflow: hidden;
                      padding: 0.7rem;
                      display: flex;
                      font-weight: bold;
                      font-size: 18px;
                      align-items: center;
                      justify-content: center;

                    }
                    .txt_en_haut {
                      border-radius: 20px;
                      font-family: 'Pacifico', cursive;
                      color: white;
                      position: relative;
                      /* padding: 50px 50px; */
                      margin: auto;
                      text-align: center;
                      top: 10px;
                      width: 330px;
                      background: rgba(255, 255, 255, 0.158);
                      backdrop-filter: blur(5px);
                      border-radius: 100px;
                      overflow: hidden;
                      margin-bottom: 10px;
                      padding: 0.7rem;
                      display: flex;
                      font-weight: bold;
                      font-size: 18px;
                      align-items: center;
                      justify-content: center;
                    }

                    .paragraph {
                      display: none;
                    }
                  }
                  
                  .container {
                    font-size: 20px;
                    width: fit-content;
                    background-color: #a8a8a8;
                    color: white;
                    line-height: 2;
                    text-align: center;
                    font-family: Helvetica, Arial, sans-serif;
                    font-weight: bold;
                    cursor: pointer;
                    position: relative;
                    border-radius: 30px;
                  }

                  .link {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    z-index: 1;
                    color: rgb(255, 123, 14);
                  }


                  .btn_connexion {
                    margin: auto;
                    margin-left: auto;
                    margin-right: auto;
                  }

                  .btn_connexion:hover {
                    
                    cursor: pointer;
                    margin: auto auto;
                    background-color: black;
                    transition: 1s;

                    }

                  .btn_inscription:hover {
                    cursor: pointer;
                    margin: auto auto;
                    background-color: black;
                    transition: 1s;
                  }





                  /* click at the name and after the dropmenu option */

            .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
          margin-top: 20px;
          width: fit-content;
          display: none;
            position: absolute;
            /* background-color: #f1f1f1; */
            background-color: transparent;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.5);
            min-width: 160px;
            color: white;
            font-weight: bold;
            z-index: 1;
            border-radius: 30px;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 30px;
        }

        .show {
            display: block;
        }



    </style>

  </head>


    <header>
      <div class="navbar">

      <div class="dropdown">
        <a style="font-weight:bold;
                  font-size:25px;" 
                  href="#" onclick="toggleDropdown()"><?php  echo strtoupper($nom);echo " ".$prenom?></a>


        <!-- Dropdown content with profile, logout, and add idea options -->
        <div id="myDropdown" class="dropdown-content">
            <a href="profile.php">Show Profile</a>
            <a href="logout.php">Logout</a>
            <a href="#">Add Idea</a>
        </div>
    </div>

    <script>
      function toggleDropdown() {
            var dropdown = document.getElementById("myDropdown");
            dropdown.classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown a')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>


        <ul class="links">
          <li><a href="#">Accueil</a></li>
          <li><a href="./html/introduction.html">Introduction</a></li>
          <li><a href="html/documantation.html">Documentation</a></li>
          <li><a href="html/les_pages_exercices/index.html">Exercices</a></li>
          <li><a href="html/les_pages_exercices/index.html">Evaluation</a></li>
          <li><a href="html/tableurs.html">Tableurs</a></li>
        </ul>

        <!-- <a class="connexion_ins_btn" href="login_signup_page/index.php">Connexion</a>
        <a class="connexion_ins_btn" href="login_signup_page/signup.php">Inscription</a> -->

        
        
      
      <div class="dropdown_menu">
        <h2>BONJOUR ET BIENVENUE</h2>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Introduction</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="http://sepaehs.alwaysdata.net//html/les_pages_exercices/index.html">Exercices</a></li>
        <li><a href="http://sepaehs.alwaysdata.net//html/les_pages_exercices/index.html">Evaluation</a></li>
        <li><a href="html/tableurs.html">Tableurs</a></li>
        <li style="background-color: rgb(255, 120, 120);"><a href="test.html">New Updatate is coming click to check it</a></li>
        <li><a class="connexion-btn-mobile" href="html/connexion_03.html">Connexion</a></li>
        <li><a class="inscription-btn-mobile" href="html/all_exercices/inscription.html">Inscription</a></li>
      </div>
    </header>



    <div class="txt_en_haut">Initiation à HTML et CSS</div>
    <div class="txt">Voici une Brève introduction au HTML5 et CSS3</div>
    <div class="paragraph">
      
      <p></p>Salut ! Ceci est mon site de test personnel, où j'expérimente des choses sympas et les partage avec vous.  🚀<br>

      <br><strong>🎨 À l'Intérieur : </strong><br>
      
      <br><strong>· Expérimentations :</strong> Découvrez mes expérimentations en codage et en design. <br>
      
      <br><strong>· Derniers Projets :</strong> Restez informé sur ce sur quoi je travaille en ce moment. <br>
      
      <br><strong>· Participez :</strong> Interagissez avec certaines des choses intéressantes et faites-moi savoir ce que vous en pensez ! <br>
    
    </div>
  </body>
</html>