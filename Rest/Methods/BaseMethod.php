<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;
use Common\Request;

/**
 * Class BaseMethod
 * @package Rest\Methods
 */
class BaseMethod
{
    /**
     * @var array reserve word
     */
    public static $rWords=[
        'per_page',
        'page',
        'format'
    ];

//    /**
//     * BaseMethod constructor.
//     */
//    public function __construct()
//    {
////        $this->postRequest=$_POST;
//
//        foreach ($this->getRequest=$_GET as $key=>$value){
//            if (in_array($key, $this->rWords)) {
//
//                $this->{$key}=$value;
//                unset($this->getRequest[$key]);
//            }
//        }
//
//        if(!isset($this->format))
//            $this->format='json';
//    }
}