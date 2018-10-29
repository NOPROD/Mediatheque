<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 15:21
 */
session_start();
require 'AutoRequireAjax.php';
require 'Cryptor.php';
$user = $_POST['user'];
$password = $_POST['password'];
$mail = $_POST['email'];
$cle = 'voiciunecle';
//$serveur =  "";
$serveur =  "http://mediatheque.boucham-amine.fr/";


/**
 * @param $liena
 * @return bool
 */
function isOKForURL($lien)
{
    if (strpos($lien, '+') !== false) return 'No';
    //elseif (strpos($lien, '=') !== false) return 'No';
    return 'Yes';
}

if (is_null(DaoUtilisateur::getEmpreinte($user)))
{
    do
    {
        $liena = Cryptor::Encrypt($user, $cle);
    } while (isOKForURL($liena) == "No");


    do
    {
        $lienb = Cryptor::Encrypt($password, $cle);
    } while (isOKForURL($lienb) == "No");


    $liendate = date("Ymd");

    do
    {
        $lienc = Cryptor::Encrypt($liendate, $cle);
    } while (isOKForURL($lienc) == "No");

    $url = "$serveur/index.php?action=Confirmation&compte=$user&email=$mail&a=$liena&b=$lienb&c=$lienc";

//=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Merci de votre inscription, veuillez cliquer sur le lien suivant pour la confirmer";
    $message_html = "<html><head></head><body><b>Merci de votre inscription</b>, veuillez cliquer sur le lien suivant <i>pour la confirmer</i>.";
    $message_html .= "<p>" . $url . "</p></body></html>";
    $sujet = "Nouveau compte";

    //=====Envoi de l'e-mail.

    EnvoiMail::send($sujet, $message_html,$message_txt,"", $mail);

//==========


    echo json_encode('ok');
}
else
    echo json_encode('ko');
?>
