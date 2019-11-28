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

<div id="Lundi" class="w3-container jour">
  <h2 style="margin:2%"><span class="pink">Lundi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
    </tr>
  </table>
</div>

<div id="Mardi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%"><span class="pink">Mardi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#FFB5E8, #FF9CEE);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
    </tr>
  </table>
</div>

<div id="Mercredi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%"><span class="pink">Mercredi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#FFABAB, #FFBEBC);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
    </tr>
  </table>
</div>

<div id="Jeudi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%"><span class="pink">Jeudi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#BFFCC6, #DBFFD6);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
    </tr>
  </table>
</div>

<div id="Vendredi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%"><span class="pink">Vendredi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#FF6961, #FE1B00);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
    </tr>
  </table>
</div>

<div id="Samedi" class="w3-container jour" style="display:none">
  <h2 style="margin:2%"><span class="pink">Samedi</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
    </tr>
  </table>
</div>
<div id="Dimanche" class="w3-container jour" style="display:none">
  <h2 style="margin:2%"><span class="pink">Dimanche</span></h2>
  <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto; background-image: linear-gradient(#B5B9FF, #6EB5FF);">

    <!--***************************Matin******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Matin</td>
      <td>7h - 8h</td>
      <td>Nourrir les chevaux <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>11h - 12h</td>
      <td>Courte balade <br><b> (Sur inscription préalable)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>10h - 12h</td>
      <td>Balade longue <br><b> (Sur inscription préalable)</b></td>
    </tr>

    <!--***************************Après midi******************************* -->

    <tr style="height: 50px;">
      <td rowspan="3" style="width:20%;" >Après midi</td>
      <td>14h - 15h</td>
      <td>Balade <br><b> (Ouvert à tous)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>15h - 17h</td>
      <td>Entrainement <br><b> (Galop 1, 2)</b></td>
    </tr>
    <tr style="height: 50px;">
      <td>17h - 19h</td>
      <td>Entrainement <br><b> (Galop 3, 4)<b/></td>
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
