<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 19/07/2018
 * Time: 17:39
 */

class ControleurErreur
{
    public function controle($msgErreur) {
        var_dump($msgErreur);
        $vue = new Vue("Accueil");
        $vue->generer(array('msgErreur' => $msgErreur));
    }


}