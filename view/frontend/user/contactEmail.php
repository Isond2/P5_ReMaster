<?php
if (isset($_POST['nom'], $_POST['email'], $_POST['telephone'], $_POST['msg'])) {
    echo "Mail à envoyer :";
    $emailvers='j.gomez.17.j@gmail.com';

    $nom=htmlspecialchars($_POST['nom']);
    $email=htmlspecialchars($_POST['email']);
    $tel=htmlspecialchars($_POST['telephone']);
    $msg=htmlspecialchars($_POST['msg']);

    $messagecomplet='Nom : '.$nom.'</br>
	Prénom : '.$tel.'</br>
	Email :'.$email.' </br>

	Message : '.$msg.'';

    mail($emailvers, 'Projet 5', $messagecomplet);

    echo $messagecomplet;
} else {
    echo "Vous n'avez pas remplit tout les champs";
}
