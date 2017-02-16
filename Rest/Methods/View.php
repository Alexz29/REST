<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;
use Common\Request;
use Rest\Serializer;

class View extends BaseMethod
{
    /**
     * View one item by id
     * Available only GET request
     *
     * @param $model
     * @throws \Exception
     */
    public function index($model)
    {
        $request=Request::getData('get');

        if(!isset($request['id']))
            throw new \Exception("Require param id not found!");

        echo Serializer::model($model::find($request['id']));
    }
}