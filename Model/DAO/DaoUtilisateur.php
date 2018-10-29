<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 15:27
 */

class DaoUtilisateur
{
    public static function getEmpreinte($user){

        require_once 'SqlConnect.php';
        $sql = new SqlConnect();
        //recup de l'instance de la classe PDO
        $pdo = $sql->getConnexion();
        $result = $pdo->prepare('SELECT motdepasse FROM utilisateur where utilisateur = :user');
        $result->bindValue(':user',"$user");
        $result->execute();
        $empreinte = $result->fetch();
        return $empreinte['motdepasse'];
    }

    public static function newCompte($user){
        require_once 'SqlConnect.php';
        //Recup de l'instance classe PDO
        $sql = new SqlConnect();
        $pdo = $sql->getConnexion();
        $result = $pdo->prepare('INSERT INTO utilisateur (utilisateur, email, motdepasse) VALUES (:compte, :email, :password)');
        $result-> bindValue(':compte', "$user->login");
        $result->bindValue(':email', "$user->email");
        $result->bindValue(':password', "$user->password");
        $result->execute();
    }

    public static function listeComptes($mail)
    {
        require_once 'SqlConnect.php';
        $sql = new SqlConnect();
        // Récupération de l'instance de la classe PDO
        $pdo = $sql->getConnexion();
        $result = $pdo->prepare('SELECT utilisateur FROM utilisateur where email = :email');
        $result->bindValue(':email', "$mail");
        $result->execute();

        while ($r = $result->fetch())
        {
            $retour[] = $r['utilisateur'];
        }
        return $retour;
    }

    public static function getEmail($user)
    {
        require_once 'SqlConnect.php';
        $sql = new SqlConnect();
        // Récupération de l'instance de la classe PDO
        $pdo = $sql->getConnexion();
        $result = $pdo->prepare('SELECT email FROM utilisateur where utilisateur = :user');
        $result->bindValue(':user', "$user");
        $result->execute();
        $empreinte = $result->fetch();
        $retour = $empreinte['email'];
        return $retour;
    }

    public static function modifPassword($user)
    {
        try
        {
            $login = $user->login;
            $empreinte = $user->password;
            require_once 'SqlConnect.php';
            $sql = new SqlConnect();
            // Récupération de l'instance de la classe PDO
            $pdo = $sql->getConnexion();
            $result = $pdo->prepare('UPDATE utilisateur SET motdepasse = :mdp where utilisateur = :user');
            $result->bindValue(':user', $login);
            $result->bindValue(':mdp', $empreinte);
            $result->execute();
            return 'ok';
        } catch (PDOException $exception)
        {
            return 'ko';
        }
    }


}

?>