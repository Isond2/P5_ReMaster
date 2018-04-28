<!DOCTYPE html>
<html>
<head>

    <title>Liste des posts</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link href="frontend/css/posts.css" rel="stylesheet"/>
</head>
<body>


<?php include("Menu.php"); ?>

<h1 class="Titre"> Liste des posts </h1>

<div id="contenupage">


            <table>
        <?php while ($a = $posts->fetch()) { ?>
  <tr class="Tableau">
    <th><a href="index.php?action=post&amp;id=<?= $a['id'] ?>" ><h2><?= $a['title'] ?></h2></a>
    <p><?= $a['chapo'] ?> <i>(<?= $a['creation_date_fr'] ?>)</i></p>
    </th>

  </tr>


        <?php } ?>
</table>
</div>

</body>
</html>
