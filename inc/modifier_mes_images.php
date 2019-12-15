<div class="modifier_photo_profil" id="modifier_images">
  <?php
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
          <img src="../images/images-profil/<?php echo $lib_images_membre ?>" style="margin-bottom:3%;" class="img_modif_profil">
          <a href="../traitement/changement_photo_profil.trait.php?photo=suppression&id_photo=<?php echo $id_images_membre ?>"><img src="../images/suppr.png" class="supprimer"></a>
          <?php
        }
      }
    ?>

  </div>
