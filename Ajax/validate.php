<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 13:04
 */
session_start();
require 'AutoRequireAjax.php';
$_SESSION['user'] = $_POST['user'];
$_SESSION['password'] = $_POST['password'];

if (password_verify($_POST['password'], DaoUtilisateur::getEmpreinte($_POST['user']) ))
    echo json_encode('ok');
else
    echo json_encode('ko');
