<div class="images_photo_profil" id="images_photo_profil">
  <h1>Choisir une image</h1>
  <div style="padding: 5% 10% 5% 10%;">
    <?php
      $req_photo_profil = $une_photo_profil->select_all_photo_profil($conn);
      while ($res_photo_profil = $req_photo_profil->fetch())
      {
        $id_image = $res_photo_profil['id_images_profil'];
        $lib_image = $res_photo_profil['lib_images_profil'];
        ?>
          <a href="../traitement/changement_photo_profil.trait.php?id_membre=<?php echo $id_membre ?>&id_photo=<?php echo $id_image ?>&photo=avatar"><img src="../images/images-profil/<?php echo $lib_image ?>" style="margin-bottom:3%;" class="img_choix_profil"></a>
        <?php
      }
      $req_count = $une_images_membre->count_all_images_membre($id_membre, $conn);
      $res_count = $req_count->fetch();
      $nb_images = $res_count['nb'];
      if ($nb_images != 0)
      {
        ?>
        <h1>Mes images : </h1><br>
        <?php
        $req_select_all_images = $une_images_membre->select_all_images_membre($id_membre, $conn);
        while ($res_select_all_images = $req_select_all_images->fetch())
        {
          $lib_images_membre = $res_select_all_images['lib_images_membre'];
          $id_images_membre = $res_select_all_images['id_images_membre'];
          ?>
          <a href="../traitement/changement_photo_profil.trait.php?id_membre=<?php echo $id_membre ?>&id_photo=<?php echo $id_images_membre ?>&photo=perso"><img src="../images/images-profil/<?php echo $lib_images_membre ?>" style="margin-bottom:3%;" class="img_choix_profil"></a>
          <?php
        }
      }
    ?>

  </div>
  <div style="font-size:0.8em">
    <form action="../traitement/ajout_images_membre.php?id_membre=<?php echo $id_membre ?>" method="post" enctype="multipart/form-data">
      <input type="file" name="fileToUpload" id="fileToUpload"><br>
      <button type="submit" name="valider" class="btn-valider-photo btn-success">Valider</button>
    </form>
  </div>
</div>
