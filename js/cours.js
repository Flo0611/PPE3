function affiche_jour(id_jour)
{
  var name = id_jour;
  $.ajax({
     type: "POST",
     url: "../traitement/cours.trait.php",
     data: {name: name}, // je passe la variable JS
     success: function(msg){ // je récupère la réponse dans la variable msg
       $('#hide').hide();
        $('#Contenu').empty(); //je vide le contenu de la div contenant
          $('#Contenu').append(msg); //j'insere le resultat dans la div contenant
     }
   });
}
