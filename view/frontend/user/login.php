<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="frontend/css/posts.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/BootstrapBoutonSeulement.css">
    <link rel="stylesheet" type="text/css" href="frontend/css/Redaction.css">
</head>
<body>

<?php include("frontend/Menu.php"); ?>

<h1 class="Titre"> Se connectessr </h1>
<div id="contenupage">

<form action="index.php?action=login" method="post">
    <p><?php if (isset($error)) { echo htmlspecialchars($error); } ?></p>
    <div>
        <label for="nickname">Pseudo :</label><br />
        <input type="text" id="nickname" name="nickname" />
    </div>
    <div>
        <label for="password">Mot de passe :</label><br />
        <input type="password" id="password" name="password" />
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Se connecter" />
    </div>
</form>
</div>

</body>
</html>
