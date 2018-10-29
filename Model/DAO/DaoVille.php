<?php
/**
 * Created by PhpStorm.
 * User: amine
 * Date: 26/08/2018
 * Time: 23:52
 */

class DaoVille
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    public function getAllVille(){
        $result = $this->pdo->prepare('SELECT * FROM ville');
        $result->execute();
        while ($r = $result->fetch()) {
            $retour[] = $this->dataToVille($r);
        }
        return $retour;
    }

    public function getbyId($ville) {
        $requete = "SELECT * FROM ville where ID_VILLE = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $ville);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToVille($r);
        }
        return $retour;
    }

    function dataToVille($r){
        $resultat = new Ville();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_VILLE']);
        return $resultat;
    }

}