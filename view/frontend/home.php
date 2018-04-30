<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="frontend/css/Style.css">
<link rel="stylesheet" type="text/css" href="frontend/css/CoolBouton.css">
<link rel="stylesheet" type="text/css" href="frontend/css/Coolform.css">
<link rel="stylesheet" type="text/css" href="frontend/css/Coolliens.css">
    <title>P5</title>
</head>
<body id="LeBody">







<!-- BOUTON SOCIAL PARTIE 1 !-->
<input type="checkbox" id="SocialBoutonControl"/>
<!-- BANDEAUX NOIRS DROIT ET GAUCHE !-->
<div class="BandeauDroit">
<!-- BOUTON RESEAUX SOCIAUX !-->

<!-- BOUTON SOCIAL PARTIE 2 ? Ca fontionne pas si on met l'input dans la div ???? !-->
    </label>
  <div class="CarreDroit">
     <label for="SocialBoutonControl">
      <div class="SocialBoutonclass"><img class="contactt" src="frontend/img/contact.png" alt="Bonhomme contact"></div>
    </label>
  </div>
</div>


<?php include("Menu.php"); ?>



<!-- BOUTON FORMULAIRE DE CONTACT !-->
<input type="checkbox" id="FormOuvre" class="fairemonterleformulaire" />
    <label for="FormOuvre">
      <div class="BoutonFormDiv"><a class="CoolBoutonLien BoutonForm1"><span class="CoolBoutonSpan"></span>Me contacter</a></div>
    </label>


<!-- PARTIE ICONES RESEAUX SOCIAUX !-->

<!-- Les 3 liens vers Facebook Linkedin et Github !-->

<div id="SocialIcons">
<a href="https://www.facebook.com/profile.php?id=100002242871188"><img src="frontend/img/fb.png" onmouseover="this.src='frontend/img/fbhover.png'" onmouseout="this.src='frontend/img/fb.png'" alt="Facebook"/></a>
<a href="https://github.com/Isond2/P5_ReMaster"><img src="frontend/img/gh.png" onmouseover="this.src='frontend/img/ghhover.png'" onmouseout="this.src='frontend/img/gh.png'" alt="Github"/></a>
<a href="https://www.linkedin.com/in/gomez-jos%C3%A9-adrian-455250140/"><img src="frontend/img/in.png" onmouseover="this.src='frontend/img/inhover.png'" onmouseout="this.src='frontend/img/in.png'" alt="Linkedin"/></a>
</div>



<div class="Messageresponsive"> <h3>Bienvenue sur mon blog <br/><br/>GOMEZ José-Adrian <br/><br/> Voici un formulaire si ous souhaitez me contacter :</h3></div>

<!-- PARTIE FORMULAIRE DE CONTACT !-->

<div id="Contact">
<div class="row">
<form name="formcontact" action="frontend/user/contactEmail.php" method="post" >
  <span>
    <input class="slider" name="nom" id="name" type="text" />
    <label for="name">NOM</label>
  </span>
  <span>
    <input class="slider" name="telephone" id="phone" type="text" />
    <label for="phone">PRENOM</label>
  </span>
  <span>
    <input class="slider" name="email" id="email" type="text" />
    <label for="email">EMAIL</label>
  </span>
  <span>
    <input class="slider" name="msg" id="msg" type="textarea" />
    <label for="msg">MESSAGE</label>
  </span>
  <span>
    <input type="submit" id="Envoyer" value="Envoyer" />
  </span>
  </form>
</div>
</div>


<!-- NOM PRENOM !-->


<div class="nomprenom">
  <h2 class="PRENOM1">JOSE - ADRIAN</h2>
  <h1 class="NOMDEFAMILLE">GOMEZ</h1>
  <h6>Développeur d'application<br />PHP Symfony</h6>
</div>














</body>
</html>
