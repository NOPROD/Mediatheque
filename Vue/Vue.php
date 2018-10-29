<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 11/07/2018
 * Time: 08:19
 */

class Vue
{
    private $fichier;
    private $titre;
    private $script;

    /**
     * Vue constructor.
     * @param $action
     */
    public function __construct($action)
    {
        $this->fichier = "Vue/vue" . $action . ".php";

    }

    public function generer($donnees)
    {
        $contenu = $this->genererFichier($this->fichier, $donnees);

        try {
            $vue = $this->genererFichier('Vue/gabarit.php',
                array('titre' => $this->titre, 'contenu' => $contenu, 'script' => $this->script));

        } catch (Exception $e) {
        }
        echo $vue;

    }
    /**
     * @param $fichier
     * @param $donnees
     * @return string
     * @throws Exception
     */
    private function genererFichier($fichier, $donnees){
        if (file_exists($fichier)) {
            extract($donnees);
            ob_start();
            require $fichier;

            return ob_get_clean();
        }
        else
            {
            throw new Exception("Fichier '$fichier' introuvable");
        }

    }


}