<?php
/**
 * Created by PhpStorm.
 * User: amine
 * Date: 26/08/2018
 * Time: 23:50
 */

class DaoCentre
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }

    public function getAllCentre(){
        $result = $this->pdo->prepare('SELECT * FROM centre');
        $result->execute();
        while ($r = $result->fetch()) {
            $retour[] = $this->dataToCentre($r);
        }
        return $retour;
    }

    public function getbyId($centre) {
        $requete = "SELECT * FROM centre where ID_CENTRE= ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $centre);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToCentre($r);
        }
        return $retour;
    }

    function dataToCentre($r){
        $resultat = new Genre();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_CENTRE']);
        return $resultat;
    }

}