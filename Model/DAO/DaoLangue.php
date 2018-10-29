<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:37
 */

class DaoLangue
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    public function getAllLangues(){
        $result = $this->pdo->prepare('SELECT * FROM langue');
        $result->execute();
        while ($r = $result->fetch()) {
            $retour[] = $this->dataToLangue($r);
        }
        return $retour;
    }

    public function getbyId($langue) {
        $requete = "SELECT * FROM langue where ID_LANGUE = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $langue);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToLangue($r);
        }
        return $retour;
    }

    function dataToLangue($r){
        $resultat = new Langue();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_LANGUE']);
        return $resultat;
    }

}