<?php
/**
 * Created by PhpStorm.
 * User: 59013-76-04
 * Date: 17/07/2018
 * Time: 10:43
 */

class OutilsControleur
{
    public static function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom]))
        {
            return $tableau[$nom];
        }
        else
        {
            return '0';
        }
    }

}