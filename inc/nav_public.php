<?php
session_start();
?>
<html>
    <head>
      <link rel="stylesheet" href="../css/menu.css">
    </head>
    <body>

<nav id="haut">
  <ul>
    <li><a class="navbar-brand px-0 mx-0" href="../index.php">CEBG <img src="../images/logo.png" style="width : 70px; height: 50px; margin-top:-5%;">
        </a></li>

    <li><a href="presentation.php">Présentation</a></li>

    <li><a href="galerie.php">Galerie</a></li>

    <li class="deroulant"><a href="#">Cavalerie &ensp;</a>
      <ul class="sous">
        <li><a href="chevaux.php">Chevaux</a></li>
        <li><a href="pension.php">Pensionnat</a></li>
      </ul>
    </li>

    <li class="deroulant"><a href="#">Activités &ensp;</a>
      <ul class="sous">
        <li><a href="stage.php">Stages</a></li>
        <li><a href="planning.php">Planning</a></li>
        <li><a href="balades.php">Balades</a></li>
      </ul>
    </li>

    <li><a href="contact.php">Contact</a></li>

    <li class="deroulant"><a href="#"><i class="fas fa-user"></i> &ensp;</a>
      <ul class="sous">
        <?php if (isset($_SESSION['membre_connecter']))
        { // si on est connecté
          ?>
          <li><a href="info.php">Mon compte</a></li>
          <li><a href="../traitement/deco.trait.php">Déconnexion</a></li>
          <?php
        }
        else if (isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
        { //si on est déconnecter
          ?>
          <li><a href="admin/index_admin.php">Admin</a></li>
          <li><a href="../traitement/deco.trait.php">Déconnexion</a></li>
          <?php
        }
        else
        {
          ?>
          <li><a href="connexion.php">Connexion</a></li>
          <li><a href="inscription.php">Inscription</a></li>
          <?php
        }
        ?>
      </ul>
    </li>
  </ul>
</nav>
</body>
</html>


<!--
<html>
    <head>
      <link rel="stylesheet" href="../css/menu.css">
    </head>
    <body>


<div id="home">

    <div class="top_w3pvt_main container">

        <header class="nav_w3pvt text-center ">

          <nav class="wthree-w3ls">
              <div id="logo">
                  <h1> <a class="navbar-brand px-0 mx-0" href="index.php">CEBG <img src="./images/logo.png" style="width : 70px; height: 50px; margin-top:-5%;">
                      </a>
                  </h1>
              </div>

              <ul class="menu mr-auto">
                  <li><a href="index.php">Accueil</a></li>
                  <li class="deroulant"><a href="about.php">Présentation</a>

                  <ul class="sous">


                      <li class="active"><a href="" class="drop-text">Qui somme-nous</a></li>

                      <li><a href="" class="drop-text">Équipes</a></li>

                  </ul>

              </li>
              <li class="deroulant"><a href="about.php">Cavalerie</a>

              <ul class="sous">

                  <li><a href="" class="drop-text">Chevaux</a></li>

                  <li><a href="" class="drop-text">Poneys</a></li>

                  <li><a href="" class="drop-text">Pensionnat</a></li>

              </ul>
          </li>

              <li class="deroulant"><a href="index.php">Activité</a></li>
              <ul class="sous">

                  <li><a href="" class="drop-text">Cours</a></li>

                  <li><a href="" class="drop-text">Stages</a></li>

                  <li><a href="" class="drop-text">Planning</a></li>


              </ul>
          </li>

                  <li><a href="contact.php">Contact</a></li>
                  <li class="deroulant"><a href="#">Espace Membre  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                      <ul class="sous">

                          <li style="margin-right: 50px"><a href="connexion/login_v3" class="drop-text">Connexion</a></li>

                          <li><a href="inscription/Login_v13" class="drop-text">Inscription</a></li>

                      </ul>
                  </li>
              </ul>
          </nav>

        </header>

    </div>

</div>
</body>
</html>
-->
