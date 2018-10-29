<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 11/07/2018
 * Time: 08:01
 */

class Routeur
{



    private $controleur;

    public function __construct()
    {
        if (OutilsControleur::getParametre($_SESSION, 'lignesParPages') == 0)
        {
            $_SESSION['lignesParPages'] = 10;
        }

    }




    public function routeurRequete()
    {
        $user = OutilsControleur::getParametre($_SESSION, 'user');
        $password = OutilsControleur::getParametre($_SESSION, 'password');
        if (!isset($_GET['action'])) $_GET['action'] = 'Accueil';
        $param = "";
        if (password_verify($password, DaoUtilisateur::getEmpreinte($user)))
        {
            try
            {
                $controleur = 'Controleur' . $_GET['action'];
                $param = $_GET;
            } catch (Exception $e)
            {
                $controleur = 'ControleurErreur';
                $param = $this->erreur($e->getMessage());
            }
        }
    else
            {
            if (in_array($_GET['action'] , array('Confirmation','Reinitialisation')))
            {
                $controleur = 'Controleur' . $_GET['action'];
                $param = $_GET;
            }
            else $controleur='ControleurIdentification';
            }
            $this->controleur = new $controleur($param);

            $this->controleur->controle();

}



}



?>