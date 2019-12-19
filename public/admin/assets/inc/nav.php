<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">



            <li>
                <a href="index_admin.php" ><i class="fa fa-desktop "></i>Tableau de bord</a>
            </li>


            <li>
                <a href="stats.php"><i class="fas fa-chart-pie"></i>Statistiques</a>
            </li>
            <li>
                <a href="form_contact.php"><i class="fa fa-edit "></i>Formulaire de contat
                <?php
                $un_contact = new contact(" ", " ", " ", " ", " ");
                 $req = $un_contact->compte_nb_msg_non($conn);
                 $nombre = $req->fetch();
                 if ($nombre['nb'] != 0)
                 {
                   ?>
                   <span class="badge" style="background-color:red"><?php echo $nombre['nb'] ?></span></a>
                   <?php
                 }
                ?>
            </li>


            <li>
                <a href="archives_msg.php"><i class="fa fa-inbox "></i>Messages archivés</a>
            </li>
            <li>
                <a href="membres_admin.php"><i class="fa fa-users"></i>Utilisateurs</a>
            </li>

            <li>
                <a href="ajout_chevaux.php"><i class="fas fa-horse"></i>Ajouter des chevaux</a>
            </li>

            <li>
                <a href="news_letter.php"><i class="fa fa-comments-o"></i>Mails</a>
            </li>

            <li>
                <a href="ajout_race.php"><i class="fa fa-tasks"></i>Gestion des races</a>
            </li>

            <li>
                <a href="actualites.php"><i class="fas fa-newspaper"></i>Actualités</a>
            </li>

            <li>
                <a href="balades.php"><i class="fas fa-walking"></i>Gérer les balades</a>
            </li>

            <li>
                <a href="ajout_stages.php"><i class="fas fa-tasks"></i>Gérer les stages</a>
            </li>

            <li>
                <a href="ajout_membre_equipe.php"><i class="fas fa-plus-circle"></i>Ajouter des membres d'équipe</a>
            </li>

            <li>
                <a href="gestion_cours.php"><i class="fas fa-briefcase"></i>Gestion de cours</a>
            </li>

            <li>
                <a href="../info.php"><i class="fa fa-user "></i>Mon compte</a>
            </li>
             <li>
                <a href="../../index.php"><i class="fa fa-arrow-circle-left"></i>Retourner au site</a>
            </li>

            <li>
                <a href="../../traitement/deco.trait.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
            </li>

        </ul>
                    </div>

</nav>
<!-- /. NAV SIDE  -->
