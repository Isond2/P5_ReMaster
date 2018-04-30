<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">
</head>
<body>

<?php include("frontend/Menu.php"); ?>

<h1 class="Titre"> S'inscrire </h1>
<div id="contenupage">

<form method="post">
    <div>
        <label for="nickname">Pseudo :</label><br />
        <input type="text" id="nickname" name="nickname" />
    </div>
    <div>
        <label for="password">Mot de passe :</label><br />
        <input type="password" id="password" name="password" />
    </div>
    <div>
        <label for="email">Email :</label><br />
        <input type="email" id="email" name="email" />
    </div>
    <div>
        <input type="submit" class="btn btn-success"/>
    </div>
</form>
</div>

</body>
</html>
