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
        try{
            if(isset($_SERVER['PATH_INFO']))
                $path=explode("/",trim($_SERVER['PATH_INFO'], "/"));
            else
                throw new MyException("Request is empty", 500);

            $pathClass='Models\\'.@$path[0];
            $pathMethod='Rest\Methods\\'.ucfirst(@$path[1]);

            $method= new $pathMethod;
            $method->index($pathClass);

        }catch (MyException $e){
            http_response_code($e->getCode());
            echo $e->getJsonMessage();
        }

    }

}