<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 21/08/2018
 * Time: 09:41
 */

class DaoMedia
{

    private $pdo;

    function __construct() {
        $sql = new SqlConnect();
        // Récupération de l'instance de la classe PDO
        $this->pdo = $sql->getConnexion();
    }

    // Récupère toutes les Media
    public function getMediaByExample($recherche) {
        // Préparation de la requête

        $acteur = $recherche->acteur;
        $genre = $recherche->genre;
        $langue = $recherche->langue;
        $format = $recherche->format;
        $type = $recherche->type;
        $statut = $recherche->statut;
        $centre = $recherche->centre;

        $fetch = $recherche->lignesParPages;
        $offset = max(0, $recherche->numPage  * $fetch);

        $order = " order by ISBN_MEDIA limit $offset ,$fetch";

        $clauseWhere = " where NOM_MEDIA LIKE :nom";
        if ($acteur != 0)
            $clauseWhere .= " and ID_ACTEUR = $acteur";
        if ($genre != 0)
            $clauseWhere .= " and ID_GENRE = $genre";
        if ($langue != 0)
            $clauseWhere .= " and ID_LANGUE = $langue";
        if ($format != 0)
            $clauseWhere .= " and ID_FORMAT = $format";
        if ($type != 0)
            $clauseWhere .= " and ID_TYPE = $type";
        if ($statut != 0)
            $clauseWhere .= " and ID_STATUT = $statut";
        if ($centre != 0)
            $clauseWhere .= " and ID_CENTRE = $centre";

        $nom = "";
        $result = $this->pdo->prepare("select count(*) from media" . $clauseWhere);
        $result->bindValue(':nom', '%' . $nom . '%');
        // Exécution de la requête
        $result->execute();
        if ($result) {
            $row = $result->fetch();
            $total = $row[0];
            $result = $this->pdo->prepare("SELECT * FROM media" . $clauseWhere . $order);
            $result->bindValue(':nom', '%' . $nom . '%');
            // Exécution de la requête
            $result->execute();
            $media = array ();
            while ($r = $result->fetch()) {
                $media[] = $this->dataToMedia($r);
            }
        }
        $retour['media'] = $media;
        $recherche->total = $total;
        return $retour['media'];
    }

// Convertit en une instance de notre Modèle
    function dataToMedia($r) {
        $resultat = new Media();
        $resultat->setId($r["ISBN_MEDIA"]);
        $resultat->setNom($r["NOM_MEDIA"]);
        return $resultat;
    }

}
?>