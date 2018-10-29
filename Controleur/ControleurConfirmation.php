<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 17/07/2018
 * Time: 11:17
 */

class ControleurConfirmation
{

    private $param;

    public function __construct($get)
    {
        $this->param = new stdClass();
        $this->param->login = OutilsControleur::getParametre($get, 'compte');
        $this->param->user = OutilsControleur::getParametre($get, 'a');
        $this->param->email = OutilsControleur::getParametre($get, 'email');
        $this->param->password = OutilsControleur::getParametre($get, 'b');
        $this->param->date = OutilsControleur::getParametre($get, 'c');
    }
    public function controle()
    {

        $cle = 'voiciunecle';
        $user1 = $this->param->login;
        $user2 = Cryptor::Decrypt($this->param->user, $cle);
        $mail = $this->param->email;
        $password = Cryptor::Decrypt($this->param->password, $cle);
        $date = Cryptor::Decrypt($this->param->date, $cle);

        $jour = date("Ymd") - $date;

        if ($user1 != $user2) {
            $message = '<h2>Le lien n\'est pas valide, veuillez réitérer votre demande !</h2>';
        } else if ($jour > 2) {
            $message = '<h2>Le lien n\'est plus valide, veuillez réitérer votre demande !</h2>';
        } else if (!is_null(DaoUtilisateur::getEmpreinte($user1)))
            $message = '<h2>Le compte a déjà été validé !</h2>';
        else {
            $compte = new stdClass();
            $compte->login = $user1;
            $compte->email = $mail;
            $compte->password = password_hash($password, PASSWORD_BCRYPT);
            DaoUtilisateur::newCompte($compte);
            $message = '<h2><br><br>Votre compte est maintenant activé !!! Bienvenue sur notre site !</h2>';
        }
        $vue = new Vue("Confirmation");
        $vue->generer(array('message' => $message));

            }


}