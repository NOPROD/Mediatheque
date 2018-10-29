<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 18:00
 */
session_start();
require 'AutoRequireAjax.php';
$mail = $_POST['email'];

$liste = DaoUtilisateur::listecomptes($mail);

if(count($liste) > 0)
{
    $message_html = "Comptes :";
    $message_html .= "<html><head></head><body>Message de renvoi Login";
    $message_txt = "Voici la liste des comptes rattachés à votre adresse mail :";
    foreach ($liste as $compte)
    {
        $message_html .= "<p> Login :$compte</p>";
        $message_txt .= "\n$compte";
    }

    $message_html .= "</body></html>";

    //= def du sujet.
    $sujet = "Vos comptes";
    $piecejointe = "../Contenu/Cgv.pdf";

}
    echo json_encode(EnvoiMail::send($sujet, $message_html,$message_txt,$piecejointe, $mail));

?>