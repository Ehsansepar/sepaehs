<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
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
                    margin-left: 270px;
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




    </style>

  </head>


    <header>
      <div class="navbar">
        <!-- <div class="logo"><a href="#"></a></div> -->
        <ul class="links">
          <li><a href="#">Accueil</a></li>
          <li><a href="./html/introduction.html">Introduction</a></li>
          <li><a href="html/documantation.html">Documentation</a></li>
          <li><a href="html/les_pages_exercices/index.html">Exercices</a></li>
          <li><a href="html/les_pages_exercices/index.html">Evaluation</a></li>
          <li><a href="html/tableurs.html">Tableurs</a></li>
        </ul>

        <a class="connexion_ins_btn" href="login_signup_page/index.php">Connexion</a>
        <a class="connexion_ins_btn" href="login_signup_page/signup.php">Inscription</a>

        
        
      
      <div class="dropdown_menu">
        <h2>BONJOUR ET BIENVENUE</h2>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Introduction</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="http://sepaehs.alwaysdata.net//html/les_pages_exercices/index.html">Exercices</a></li>
        <li><a href="http://sepaehs.alwaysdata.net//html/les_pages_exercices/index.html">Evaluation</a></li>
        <li><a href="html/tableurs.html">Tableurs</a></li>
        <!-- <li style="background-color: rgb(255, 120, 120);"><a href="test.html">New Updatate is coming click to check it</a></li> -->
        <!-- <li><a class="connexion-btn-mobile" href="html/connexion_03.html">Connexion</a></li> -->
        <!-- <li><a class="inscription-btn-mobile" href="html/all_exercices/inscription.html">Inscription</a></li> -->
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

      <!-- <li style="background-color: rgb(0, 0, 0);"><a href="test.html">New Updatate is coming click to see it letssssssssssss goooooooooo herry uppppppppppp</a></li> -->
      
      
      <!-- <br><strong class="btn_connexion" onclick='window.open("html/connexion_03.html")'>Connexion</strong> -->
      <!-- <strong class="btn_inscription" onclick='window.open("html/all_exercices/inscription.html")'>Inscription</strong> -->

    
    </div>
  </body>
</html>