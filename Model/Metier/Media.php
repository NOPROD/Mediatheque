<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:29
 */

class Media implements JsonSerializable

{
    private $id;
    private $nom;

    public function __construct()
    {
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    function jsonSerialize(){
        // TODO: Implement jsonSerialize() method.
        $vars = get_object_vars($this);
        return $vars;
    }

}