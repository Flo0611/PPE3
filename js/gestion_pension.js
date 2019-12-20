function affiche_pension()
{
  var name = $('#pension_detail').val();
  $.ajax({
     type: "POST",
     url: "../admin/afficher_pension.php",
     data: {name: name}, // je passe la variable JS
     success: function(msg){ // je récupère la réponse dans la variable msg
      $('#voir_pension').empty(); //je vide le contenu de la div contenant
        $('#voir_pension').append(msg); //j'insere le resultat dans la div contenant
     }
   });
}
