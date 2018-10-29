<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 11/07/2018
 * Time: 08:59
 */

class SqlConnect
{

    private $connexion_bdd;

    public function __construct()
    {
        try
        {
            $this->connexion_bdd = new PDO('mysql:host=;dbname=', '','', array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
            $this->connexion_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception)
        {
            var_dump($exception);
        }
    }

    public function getConnexion()
    {
        return $this->connexion_bdd;
    }


}