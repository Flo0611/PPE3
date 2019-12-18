<!DOCTYPE html>
<html>
<title>Centre équestre - Planning</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/planning.css">
<body>
<?php include'../inc/nav_public.php'; ?>

<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Lundi')">Lundi</button>
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Mardi')">Mardi</button>
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Mercredi')">Mercredi</button>
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Jeudi')">Jeudi</button>
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Vendredi')">Vendredi</button>
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Samedi')">Samedi</button>
  <button class="w3-bar-item w3-button" onclick="ouvre_jour('Dimanche')">Dimanche</button>
</div>
<div id="conteneur" style="margin-bottom:10%;">
<h2 style="text-align:center"><span class="pink">Planning Cours</span></h2>
<div id="Lundi" class="w3-container jour">
  <h2 style="margin:2%;text-align:center"><span class="pink">Lundi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->
    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>

    <!--***************************Après midi******************************* -->
    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>
  </table>
</div>

<div id="Mardi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%;text-align:center"><span class="pink">Mardi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->
    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>
  </table>
</div>

<div id="Mercredi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%;text-align:center"><span class="pink">Mercredi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->
    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>
  </table>
</div>

<div id="Jeudi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%;text-align:center"><span class="pink">Jeudi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->
    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>
  </table>
</div>

<div id="Vendredi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%;text-align:center"><span class="pink">Vendredi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->
    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>
  </table>
</div>

<div id="Samedi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%;text-align:center"><span class="pink">Samedi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->

    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>
  </table>
</div>

<div id="Dimanche" class="w3-container jour" style="display:none">
  <h2 style="margin:2%;text-align:center"><span class="pink">Dimanche</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->

    <tr style="height:  50px;">
      <td>horaire</td>
      <td>Cours</td>
      <td>Professeur</td>
    </tr>
    <tr style="height: 150px;">
      <td>8h - 12h</td>
      <td> Galops 5+ <br><b> (Equitation)</b></td>
      <td> jeanne ausecours</td>
    </tr>


    <!--***************************Après midi******************************* -->

    <tr style="height: 150px;">
      <td>14h - 18h</td>
      <td> Galops 1+ <br><b> (Equitation/attelage)</b></td>
      <td>Jean rennet/Ali baba</td>
    </tr>

  </table>
</div>
</div>

<script>
function ouvre_jour(nom_jour) {
  var i;
  var x = document.getElementsByClassName("jour");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(nom_jour).style.display = "block";
}



</script>
<?php include'../inc/footer_public.php'; ?>

</body>
</html>