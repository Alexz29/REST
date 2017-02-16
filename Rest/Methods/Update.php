<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;
use Common\Request;
use Rest\Serializer;

class Update extends BaseMethod
{
    public function index($model)
    {
        $request=Request::getData('get');

        //require get param id
        if(!isset($request['id']))
            throw new \Exception("Require param id not found!");

        $data = (Request::getData('post') ? Request::getData('post') : Request::getData('put'));
        unset($data[$model::$primary_key]);

        $model=$model::find($request['id']);
        $model->attributes=$data;
        $model->save();

        echo Serializer::model($model);
    }
}