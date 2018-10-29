<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 20/08/2018
 * Time: 13:29
 */

class ControleurAccueil {
    public function __construct($recherche)
    {
        $this->acteur = new DaoActeur();
        $this->genre = new DaoGenre();
        $this->langue = new DaoLangue();
        $this->format = new DaoFormat();
        $this->type = new DaoType();
        $this->statut = new DaoStatut();
        $this->centre = new DaoCentre();
        $this->recherche = $recherche;
        $this->litParametres($recherche);
    }

    public function controle()
    {
        $acteur = json_encode($this->acteur->getAllActeur());
        $genre = json_encode($this->genre->getAllGenre());
        $langue = json_encode($this->langue->getAllLangues());
        $format = json_encode($this->format->getAllFormat());
        $type = json_encode($this->type->getAllTypes());
        $statut = json_encode($this->statut->getAllStatut());
        $centre = json_encode($this->centre->getAllCentre());


        $vue = new Vue("Accueil");
        $vue->generer(array('acteur' => $acteur, 'genre' => $genre, 'langue' => $langue, 'format' => $format, 'type' => $type, 'statut' => $statut, 'centre' => $centre,  'recherche' => json_encode($this->recherche)));
    }

    private function litParametres($post)
    {
        $this->recherche = new stdClass();
        $this->recherche->acteur = OutilsControleur::getParametre($post, 'acteur');
        $this->recherche->genre = OutilsControleur::getParametre($post, 'genre');
        $this->recherche->langue = OutilsControleur::getParametre($post, 'langue');
        $this->recherche->format = OutilsControleur::getParametre($post, 'format');
        $this->recherche->type = OutilsControleur::getParametre($post, 'type');
        $this->recherche->statut = OutilsControleur::getParametre($post, 'statut');
        $this->recherche->centre = OutilsControleur::getParametre($post, 'centre');

        $temp = OutilsControleur::getParametre($post, 'lignesParPages');

        if ($temp != 0)
            $_SESSION['lignesParPages'] = $temp;
        $this->recherche->lignesParPages = OutilsControleur::getParametre($_SESSION, 'lignesParPages');
        $this->recherche->numPage = OutilsControleur::getParametre($post, 'numPage');
    }

}