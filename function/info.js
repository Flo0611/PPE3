function affiche_images_profil()
{
if (document.getElementById('images_photo_profil').style.display == 'block')
  {
    document.getElementById('images_photo_profil').style.display = 'none';
  }
  else
  {
    document.getElementById('images_photo_profil').style.display = 'block';
  }
}

function modifier_mes_images()
{
  if (document.getElementById('modifier_images').style.display == 'block')
  {
    document.getElementById('modifier_images').style.display = 'none';
  }
  else
  {
    document.getElementById('modifier_images').style.display = 'block';
  }
}
