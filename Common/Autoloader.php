<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

/**
 * Class Autoloader
 */
class Autoloader
{
    /**
     * Load method require Classes from Common dir
     * @param $class
     */
    public static  function load($class){

        $class = str_replace('\\','/', $class);
        require $class . '.php';
    }
}

//register load method like __autoload()
spl_autoload_register('Autoloader::load');