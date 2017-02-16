<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;
use Common\Request;
use Rest\Serializer;

/**
 * Class Update
 * @package Rest\Methods
 */
class Update extends BaseMethod
{
    /**
     * Update Item
     * Available POST & PUT Methods
     * Require id - get param
     *
     * @param $model
     * @throws \Exception
     */
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