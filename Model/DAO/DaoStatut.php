<?php
/**
 * Created by PhpStorm.
 * User: amine
 * Date: 26/08/2018
 * Time: 23:52
 */

class DaoStatut
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    public function getAllStatut(){
        $result = $this->pdo->prepare('SELECT * FROM statut');
        $result->execute();
        while ($r = $result->fetch()) {
            $retour[] = $this->dataToStatut($r);
        }
        return $retour;
    }

    public function getbyId($statut) {
        $requete = "SELECT * FROM statut where ID_STATUT = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $statut);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToStatut($r);
        }
        return $retour;
    }

    function dataToStatut($r){
        $resultat = new Statut();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_STATUT']);
        return $resultat;
    }

}