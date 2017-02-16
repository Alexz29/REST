<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest;

/**
 * Class Serializer
 * @package Rest
 */
abstract class Serializer
{
    /**
     * !Require function "convert" for adapters!
     * @param $model object ActiveRecord
     * @return mixed
     */
     abstract public function convert($model);

    /**
     * Function forward model to adapter for convert
     * @param $model  object ActiveRecord
     * @param $format string REST\Adapters\* - adapters json or xml, etc. json by default
     * @return mixed  string output
     * @throws \Exception
     */
    public static function model($model, $format='json'){
        $adapterClass = static::load_adapter_class($format);

        if(!method_exists($adapterClass, "convert"))
            throw new \Exception("Method convert() in your adapter not found!");

        $adapterClass=new $adapterClass();
        return $adapterClass->convert($model);
    }

    /**
     * @param $adapter string Name of Adapter Class
     * @return string  namespace Adapter Class(path)
     * @throws \Exception
     */
    private static function load_adapter_class($adapter){
        $class = ucwords($adapter);
        $fqclass = 'Rest\Adapters\\' . $class;
        $source = __DIR__ . "/Adapters/$class.php";
        if (!file_exists($source))
            throw new \Exception("$fqclass not found!");

        require_once($source);
        return $fqclass;
    }
}