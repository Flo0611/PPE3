function affiche_images_profil()
{
if (document.getElementById('images_photo_profil').style.display == 'none')
  {
    document.getElementById('images_photo_profil').style.display = 'block';
  }
  else
  {
    document.getElementById('images_photo_profil').style.display = 'none';
  }
}

function modifier_mes_images()
{
  if (document.getElementById('modifier_images').style.display == 'none')
  {
    document.getElementById('modifier_images').style.display = 'block';
  }
  else
  {
    document.getElementById('modifier_images').style.display = 'none';
  }
}
