<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 21/08/2018
 * Time: 10:26
 */

class DaoGenre
{
    private $pdo;

    function __construct()
    {
        $sql = new SqlConnect();
        $this->pdo = $sql->getConnexion();
    }


    function getAllGenre()
    {
        $result = $this->pdo->prepare('SELECT * FROM genre');
        $result->execute();
        while($r = $result->fetch()) {
            $retour [] = $this->dataToGenre($r);
        }
        return $retour;

}

    public function getbyId($genre) {
        $requete = "SELECT * FROM genre where ID_GENRE = ?";
        $result =$this->pdo->prepare($requete);
        $result = $this->pdo->prepare($requete);
        var_dump($requete);

        $result->bindValue(1, $genre);
        $result->execute();

        $retour = NULL;
        while($r = $result->fetch()) {
            $retour[] = $this->dataToGenre($r);
        }
        return $retour;
    }


function dataToGenre($r){
        $resultat = new Genre();
        $resultat->setId($r[0]);
        $resultat->setNom($r['NOM_GENRE']);
        return $resultat;
}


}