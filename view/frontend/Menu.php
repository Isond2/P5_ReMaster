<?php
if(!isset($_SESSION))
    {
        session_start();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="frontend/css/Style.css">
    <?php if ($_GET['action'] == 'home') { ?>
        <link rel="stylesheet" type="text/css" href="frontend/css/homeLogo.css">
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="frontend/css/CoolBouton.css">



</head>
<body id="LeBody">
  <div class="connect">
    <?php if (isset($_SESSION['id']) and isset($_SESSION['nickname'])) {?>
        <div class="BoutonConnexion"><p>Connecté en tant que <strong><?php echo $_SESSION['nickname']?></strong></p></div>
        <div class="BoutonInscription"><a class="CoolBoutonLien" href="index.php?action=disconnection"><span class="CoolBoutonSpan"></span>Se déconnecter</a></div>
    <?php } else { ?>
        <div class="BoutonInscription"><a class="CoolBoutonLien" href="index.php?action=addUser"><span class="CoolBoutonSpan"></span>S'inscrire</a></div>
        <div class="BoutonConnexion"><a class="CoolBoutonLien" href="index.php?action=login"><span class="CoolBoutonSpan"></span>Se connecter</a></div>
    <?php } ?>
  </div>

<!-- Input du bouton pour faire sortir le menu / Ne fonctionne pas si placé dans la div "carrédroit" !-->
<input type="checkbox" id="SideBarControl"/>


<!-- Bandeau noir !-->
<div class="BandeauGauche">

    <!-- Carré = flèche au milieu du bandeau !-->
    <div class="CarreGauche">

            <!--  Bouton pour faire sortir le menu !-->
            <label for="SideBarControl">
                <div class="SideBarBouton"></div>
            </label>


    </div>


</div>




    <!-- Menu !-->
        <nav id="SideBar">

            <div class="Bouton1"><a class="CoolBoutonLien" href="index.php?action=home"><span class="CoolBoutonSpan"></span>Accueil</a></div>

            <div class="Bouton2"><a class="CoolBoutonLien" href="index.php?action=listPosts"><span class="CoolBoutonSpan"></span>Posts</a></div>

            <div class="Bouton3"><a class="CoolBoutonLien" href="index.php?action=addPost"><span class="CoolBoutonSpan"></span>Ajouter un post</a></div>

            <div class="Bouton5"><a class="CoolBoutonLien" href="#" download="doc/Cv.pdf" ><span class="CoolBoutonSpan"></span>CV PDF</a></div>

        </nav>





<!-- Menu responsive !-->
<div class="BarreResponsive">


<!-- ICONES -->
<div class="Iconesmenu">
    <a href="https://www.facebook.com/profile.php?id=100002242871188"><img src="frontend/img/fb.png" onmouseover="this.src='frontend/img/fbhover.png'" onmouseout="this.src='frontend/img/fb.png'" alt="Facebook"/></a>
    <a href="https://github.com/Isond2/P5_ReMaster"><img src="frontend/img/gh.png" onmouseover="this.src='frontend/img/ghhover.png'" onmouseout="this.src='frontend/img/gh.png'" alt="Github"/></a>
    <a href="https://www.linkedin.com/in/gomez-jos%C3%A9-adrian-455250140/"><img src="frontend/img/in.png" onmouseover="this.src='frontend/img/inhover.png'" onmouseout="this.src='frontend/img/in.png'" alt="Linkedin"/></a>
</div>

<?php if (isset($_SESSION['id']) and isset($_SESSION['nickname'])) {?>
        <div class="BoutonConnexionResponsivee"><p>Connecté en tant que <strong><?php echo $_SESSION['nickname']?></strong></p></div>
<?php } ?>


<!-- Si on veut mettre un titre au menu responsive (au milieu) -->
<span class="Titreacceuil"> </span>

<!-- MENU -->
<span class="dropdown">
  <button>Menu</button>
  <label>
    <input id="Inputresponsive" type="checkbox">
    <ul>
      <li><a href="index.php?action=home">Accueil</a></li>
      <li><a href="index.php?action=listPosts">Articles</a></li>
      <li><a href="index.php?action=addPost">Ajouter un article</a></li>
      <li><a download="doc/Cv.pdf" href="#">CV PDF</a></li>
        <?php if (isset($_SESSION['id']) and isset($_SESSION['nickname'])) {?>
        <li><a href="index.php?action=disconnection">Se déconnecter</a></li>
        <?php } else { ?>
        <li><a href="index.php?action=addUser">S'inscrire</a></li>
        <li><a href="index.php?action=login">Se connecter</a></li>
        <?php } ?>
    </ul>
  </label>
  </span>


</div>





</body>
</html>
