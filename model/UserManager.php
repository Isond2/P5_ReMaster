<?php

require_once("Manager.php");

class UserManager extends Manager
{
    public function addNewUser($nickname, $password, $email)
    {
        $nickname=htmlspecialchars($nickname);
        $password=htmlspecialchars($password);
        $email=htmlspecialchars($email);

        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
        $database = $this->dbConnect();
        $req = $database->prepare('INSERT INTO users SET nickname = ?, password =?, email =?, registration_date =NOW(), admin =false');
        $req->execute(array($nickname, $pass_hache, $email));

        return $req;
    }


    public function logUser($nickname, $password)
    {
        $database = $this->dbConnect();
        $req = $database->prepare('SELECT * FROM users WHERE nickname = ?');
        $req->execute(array($nickname));
        $user = $req->fetch();

        $isPasswordCorrect = password_verify($password, $user['password']);
        if (!$user) {
            $error = 'Mauvais identifiant ou mot de passe !';
        } else {
            if ($isPasswordCorrect) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['nickname'] = $user['nickname'];
                $_SESSION['role'] = $user['admin'];
            } else {
                $error = 'Mauvais identifiant ou mot de passe !';
            }
        }

        return $user;
    }
}
