function changement_couleur(nom_jour)
{
  var bouton = document.querySelectorAll('.w3-button')
  for (var i = 0; i < bouton.length; i++) {
  var bouton_ecoute = bouton[i]
  bouton_ecoute.addEventListener('click', function () {
    document.querySelector(nom_jour).style.setProperty("background-color", "orange")
  })
}

}
