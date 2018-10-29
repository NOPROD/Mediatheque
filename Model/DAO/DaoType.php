<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 12:57
 */

class DaoType
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    public function getAllTypes(){
        $result = $this->pdo->prepare('SELECT * FROM type');
        $result->execute();
        while ($r = $result->fetch()) {
            $retour[] = $this->dataToType($r);
        }
        return $retour;
    }

    public function getbyId($type) {
        $requete = "SELECT * FROM type where ID_TYPE = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $type);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToType($r);
        }
        return $retour;
    }

    function dataToType($r){
        $resultat = new Type();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_TYPE']);
        return $resultat;
    }

}