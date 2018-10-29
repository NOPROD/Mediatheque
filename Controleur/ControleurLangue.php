<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:36
 */

class ControleurLangue
{
    private $langue;

    public function __construct()
    {
        $this->langue = new DaoLangue();
    }

    public function controle(){
        $json = json_encode($this->langue->getAllLangues());
        $vue = new Vue("Langue");
        $vue->generer(array('json' => $json));
    }

}