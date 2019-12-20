function affiche_chevaux()
{
  var name = $('#choix_chevaux').val();
  $.ajax({
     type: "POST",
     url: "../admin/afficher_chevaux.php",
     data: {name: name}, // je passe la variable JS
     success: function(msg){ // je récupère la réponse dans la variable msg
      $('#accueil').hide(); //je vide le contenu de la div contenant
        $('#affichage_chevaux').empty();
          $('#affichage_chevaux').append(msg); //j'insere le resultat dans la div contenant
     }
   });
}
