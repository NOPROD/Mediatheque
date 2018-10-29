<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 17:46
 */
require_once 'DaoBillet.php';
$user ="";
$password = "";
$empreinte = DaoUtilisateur::getEmpreinte($user);

echo "Login : $user<br>";
echo "Mot de passe : $password <br>";
echo "Empreinte stockée : $empreinte<br>";

echo "Calcul d'Empreinte : " . password_hash('Amine1!',PASSWORD_BCRYPT);

echo '<br>';
if (password_verify($password,$empreinte))
    echo 'Mot de passe Correct';
else
    echo 'Mot de passe Incorrect';