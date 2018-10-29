<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 15:23
 */

session_start();
require 'AutoRequireAjax.php';
require 'Cryptor.php';
try {
    $cle = 'voiciunecle';
    $user = Cryptor::Decrypt($_POST['a'], $cle);
    $empreinte = Cryptor::Decrypt($_POST['b'], $cle);

    $password = $_POST['password'];
    $empreinte2 = DaoUtilisateur::getEmpreinte($user);

    if ($empreinte == $empreinte2) {
        $compte = new stdClass();
        $compte->login = $user;
        $compte->password = password_hash($password, PASSWORD_BCRYPT);
        echo json_decode(DaoUtilisateur::modifPassword($compte));
    }
    else echo json_decode('ko');
}
catch (Exception $e)
{
    echo json_decode('ko');
}
