<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 21/08/2018
 * Time: 09:41
 */

class DaoEditeur
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    function getAllEditeur(){
        $result = $this->pdo->prepare('SELECT * FROM editeur');
        $result->execute();
        while($r = $result->fetch()) {
            $retour [] = $this->dataToEditeur($r);
        }
        return $retour;


    }

    public function getbyId($editeur) {
        $requete = "SELECT * FROM editeur where ID_EDITEUR = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $editeur);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToEditeur($r);
        }
        return $retour;
    }

    function dataToEditeur($r){
        $resultat = new Genre();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_EDITEUR']);
        return $resultat;

    }
}