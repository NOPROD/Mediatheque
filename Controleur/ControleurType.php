<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:03
 */

class ControleurType
{

    private $type;
    public function __construct()
    {
        $this->type = new DaoType();
    }

    public function controle() {

        $listeTypes = json_encode($this->type->getAllTypes());
        $vue = new Vue("Type");
        $vue->generer(array('listeTypes' => $listeTypes));
    }
}