function request(texte)
{
  var min_length = 2; // nombre de caractère avant lancement recherche
	var keyword = $('#barre_recherche').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
  if (keyword.length >= min_length) {
    var name = document.getElementById('barre_recherche').value;
    $.ajax({
       type: "POST",
       url: "../traitement/barre_chevaux.trait.php",
       data: {name: name}, // je passe la variable JS
       success: function(msg){ // je récupère la réponse dans la variable msg
        $('#contenant').empty(); //je vide le contenu de la div contenant
          $('#contenant').append(msg); //j'insere le resultat dans la div contenant
            $('.affiche_tout').hide();//je cache tout les éléments de la requete de base
       }
     });
   }
   else
   {
 		$('#contenant').empty(); //Je cache la div contenant(qui contient la recherche)
      $('.affiche_tout').show();//j'affiche comme avant
 	}
}
