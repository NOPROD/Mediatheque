<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 16/07/2018
 * Time: 13:05
 */

class AutoRequireAjax
{
    public static function loadClass($class) {

        if (file_exists("$class.php"))
        {
            require_once "$class.php";
        }
        else if (file_exists("../$class.php"))
        {
            require_once "../$class.php";
        }
        else if (file_exists("../Controleur/$class.php"))
        {
            require_once "../Controleur/$class.php";
        }
        else if (file_exists("../Model/Metier/$class.php"))
        {
            require_once "../Model/Metier/$class.php";
        }
        else if (file_exists("../Model/DAO/$class.php"))
        {
            require_once "../Model/DAO/$class.php";
        }
        else if (file_exists("../Vue/$class.php"))
        {
            require_once "../Vue/$class.php";
        }
        else if (file_exists("../phpmailer/$class.php"))
        {
            require_once "../phpmailer/$class.php";
        }
    }

}
spl_autoload_register('AutoRequireAjax::loadClass');
?>
