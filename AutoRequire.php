<?php
class AutoRequire {

    public static function loadClass($class) {
        if (file_exists("Ajax/$class.php"))
        {
            require_once "Ajax/$class.php";
        }
        if (file_exists("Controleur/$class.php"))
        {
            require_once "Controleur/$class.php";
        }
        else if (file_exists("Model/Metier/$class.php"))
        {
            require_once "Model/Metier/$class.php";
        }
        else if (file_exists("Model/DAO/$class.php"))
        {
            require_once "Model/DAO/$class.php";
        }
        else if (file_exists("Vue/$class.php"))
        {
            require_once "Vue/$class.php";
        }

    }
}
spl_autoload_register('AutoRequire::loadClass');
?>