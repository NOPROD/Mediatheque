<?php
session_start();
require 'AutoRequireAjax.php';
require 'Cryptor.php';
$user = $_POST['user'];
$cle = 'voiciunecle';
//$serveur = "";
$serveur =  "http://mediatheque.boucham-amine.fr/";

function isOKForURL($lien)
{
    if (strpos($lien, '+') !== false) return 'No';
    //elseif (strpos($lien, '=') !== false) return 'No';
    return 'Yes';
}

$mail = DaoUtilisateur::getEmail($user);
$empreinte =DaoUtilisateur::getEmpreinte($user);

if (!is_null($mail))
{
    do
    {
        $liena = Cryptor::Encrypt($user, $cle);
    } while (isOKForURL($liena) == "No");


    $liendate = date("Ymd");

    do
    {
        $lienb = Cryptor::Encrypt($empreinte, $cle);
    } while (isOKForURL($lienb) == "No");
    do
    {
        $lienc = Cryptor::Encrypt($liendate, $cle);
    } while (isOKForURL($lienc) == "No");


    $url = "$serveur/Project/index.php?action=Reinitialisation&compte=$user&email=$mail&a=$liena&b=$lienb&c=$lienc";

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
//=====Déclaration des messages au format texte et au format HTML.
    $message_txt = "Réinitialisation de votre mot de passe !";
    $message_html = "<html><head></head><body><b>Vous avez demandé la réinitialisation de votre mot de passe</b>, veuillez cliquer sur le lien suivant :";
    $message_html .= "<p>" . $url . "</p></body></html>";
//==========
    $piecejointe="";

    EnvoiMail::send("Réinitialisation de votre mot de passe", $message_html,$message_txt,"", $mail);

    echo json_encode('ok');
}
else
    echo json_encode('ko');
?>
