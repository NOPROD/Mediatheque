<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 09:38
 */

class ControleurIdentification
{
    public function controle()
    {
        $vue = new Vue("Identification");
        $vue->generer(array());

    }

}