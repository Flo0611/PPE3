function affiche_tableaux()
{
  var name = $('#cours_detail').val();
  $.ajax({
     type: "POST",
     url: "../../traitement/affiche_tableaux_cours.php",
     data: {name: name}, // je passe la variable JS
     success: function(msg){ // je récupère la réponse dans la variable msg
      $('#tableaux_cours').empty(); //je vide le contenu de la div contenant
        $('#tableaux_cours').append(msg); //j'insere le resultat dans la div contenant
     }
   });
}
