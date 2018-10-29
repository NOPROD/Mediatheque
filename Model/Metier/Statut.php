<?php
/**
 * Created by PhpStorm.
 * User: amine
 * Date: 27/08/2018
 * Time: 00:27
 */

class Statut implements JsonSerializable

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
        $vars = get_object_vars($this);
        return $vars;
    }
}