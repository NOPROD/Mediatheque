<?php
/**
 * Created by PhpStorm.
 * User: amine
 * Date: 26/08/2018
 * Time: 23:50
 */

class DaoActeur
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    public function getAllActeur(){
        $result = $this->pdo->prepare('SELECT * FROM acteur');
        $result->execute();
        while ($r = $result->fetch()) {
            $retour[] = $this->dataToActeur($r);
        }
        return $retour;
    }

    public function getbyId($acteur) {
        $requete = "SELECT * FROM acteur where ID_ACTEUR = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $acteur);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToActeur($r);
        }
        return $retour;
    }

    function dataToActeur($r){
        $resultat = new Acteur();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_ACTEUR']);
        return $resultat;
    }

}