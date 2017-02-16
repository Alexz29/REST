<?php
/**
* Created by Alexey Diveev
* Email: a.a.diveev@gmail.com
*/

namespace Rest\Methods;
use Rest\Serializer;
use Common\Request;

/**
 * Class Search
 * @package Rest\Methods
 */
class Search
{
    /**
     * Search item by param
     * Available only GET method
     * param1 = val and param2 = val and param3 = val etc.
     *
     * @param $model
     */
    public static function index($model)
    {
        $queryString='';
        $queryValue=[];

        $request=Request::getData('get');

        foreach($model->attributes() as $key=>$val){
            if(isset($request[$key])){
                $queryString.=" $key = ? and";
                array_push($queryValue, $request[$key]);
            }
        }

        array_unshift($queryValue, trim($queryString, "and"));
        $model = $model::find('all',[
            'conditions' => $queryValue
        ]);

        echo Serializer::model($model);
    }

}