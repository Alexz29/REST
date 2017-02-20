<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Common;

/**
 * Class Router
 * @package Common
 */
class Router
{
    /**
     * simple Routing function
     */
    public static function run(){

        //-------------------------------------------
        // Set request data
        //-------------------------------------------
        $PUT = null;
        $PATCH = null;
        parse_str(file_get_contents('php://input'), $$_SERVER['REQUEST_METHOD']);

        Request::setData('get', $_GET);
        Request::setData('post', $_POST);
        Request::setData('put', $PUT);
        Request::setData('patch', $PATCH);


        //-------------------------------------------
        // Routing
        //-------------------------------------------
        $path=explode("/",trim($_SERVER['PATH_INFO'], "/"));

        $pathClass='Models\\'.$path[0];
        $model=new $pathClass;

        $pathMethod='Rest\Methods\\'.ucfirst($path[1]);

        $method= new $pathMethod;
        $method->index($model);
    }
}