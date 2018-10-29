<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 21/08/2018
 * Time: 09:41
 */

class DaoFormat
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    function getAllFormat(){
        $result = $this->pdo->prepare('SELECT * FROM format');
        $result->execute();
        while($r = $result->fetch()) {
            $retour [] = $this->dataToFormat($r);
        }
        return $retour;

    }
    public function getbyId($format) {
        $requete = "SELECT * FROM format where ID_FORMAT = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $format);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToFormat($r);
        }
        return $retour;
    }

    function dataToFormat($r){
        $resultat = new Genre();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_FORMAT']);
        return $resultat;

    }

}