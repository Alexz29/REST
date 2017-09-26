<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */
namespace Common;
/**
 * Class Autoloader
 */
class Autoloader
{
    /**
     * Load method require Classes from Common dir
     *
     * @param $class
     * @throws MyException
     */
    public static  function load($class){

        $class = str_replace('\\','/', $class);

        if(!file_exists(ROOT_DIR.'/'.$class.'.php'))
            throw new MyException("Incorrect request $class Example {model}/{create|delete|index|search|update}", 500);

        require $class . '.php';

        if(!class_exists($class))
            throw new MyException("Class `$class` does not exist", 500);

    }
}

//register load method like __autoload()
spl_autoload_register('Common\Autoloader::load');