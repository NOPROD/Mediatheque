<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 17/07/2018
 * Time: 11:19
 */

class ControleurReinitialisation
{
    private $param;

    public function __construct($get)
    {
        $this->param = new stdClass();
        $this->param->user = OutilsControleur::getParametre($get, 'compte');
        $this->param->a = OutilsControleur::getParametre($get, 'a');
        $this->param->email = OutilsControleur::getParametre($get, 'email');
        $this->param->b = OutilsControleur::getParametre($get, 'b');
        $this->param->c = OutilsControleur::getParametre($get, 'c');
    }

    public function controle() {

        try
        {
            $cle = 'voiciunecle';
            $user1 = $this->param->user;
            $user2 = Cryptor::Decrypt($this->param->a, $cle);
            $mail = $this->param->email;
            $password = Cryptor::Decrypt($this->param->b, $cle);
            $date = Cryptor::Decrypt($this->param->c, $cle);
            $compte = json_encode($this->param);

            $jour = date("Ymd") - $date;

            if ($user1 != $user2 or $jour > 2)
            {
                $message = '<h2>Le lien n\'est pas valide, veuillez réitérer votre demande !</h2>';
            }
            else
            {
                $message = "<h2><br><br>Changement de mot de Passe !</h2>\n<script>changePass($compte)</script>";
            }
        }
        catch (Exception $e)
        {
            $message = '<h2>Lien invalide, veuillez réitérer votre demande !</h2>';
        }
        $vue = new Vue("Reinitialisation");
        $vue->generer(array('message' => $message));
    }


}