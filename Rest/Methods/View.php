<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;
use Common\Request;
use Rest\Serializer;

class View extends BaseMethod
{
    public function index($model)
    {
        $request=Request::getData('get');

        if(!isset($request['id']))
            throw new \Exception("Require param id not found!");

        echo Serializer::model($model::find($request['id']));
    }
}