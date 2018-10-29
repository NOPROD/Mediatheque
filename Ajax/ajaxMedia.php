<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:28
 */
session_start();
require 'AutoRequireAjax.php';
// on créé une instance de la classe DAO
$maDao = new DaoMedia();
// On créé un objet recherche
$recherche = new stdClass();
// On récupère les différents critères de recherche dans le tableau associatif $_POST


$recherche->acteur = OutilsControleur::getParametre($_POST,'acteur');
$recherche->genre = getParametre($_POST, 'genre');
$recherche->langue = OutilsControleur::getParametre($_POST,'langue');
$recherche->format = getParametre($_POST, 'format');
$recherche->type = OutilsControleur::getParametre($_POST,'type');
$recherche->statut = getParametre($_POST, 'statut');
$recherche->centre = OutilsControleur::getParametre($_POST,'centre');



$recherche->lignesParPages =max(10, getParametre($_POST, 'lignesParPages'));
$recherche->numPage = getParametre($_POST, 'numPage');
// On récupère les enregistrements correspondants aux critères dans le tableau $retour
$retour = $maDao->getMediaByExample($recherche);
// On ajoute à la fin du tableau, le nombre total d'enregistrements correspondants aux critères
$retour[] = $recherche->total;
// on met à jour la variable de session lignesParPage
$_SESSION['lignesParPages'] = $recherche->lignesParPages;
// on encode le tableau $retour au format JsON
$json = json_encode($retour);
// On envoie
echo $json;

function getParametre($tableau, $nom)
{
    if (isset($tableau[$nom])) {
        return $tableau[$nom];
    } else
        return 0;
}
?>