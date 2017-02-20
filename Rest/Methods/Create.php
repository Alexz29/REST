<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;
use Common\MyException;
use Rest\Serializer;
use Common\Request;

/**
 * Class Create
 * @package Rest\Methods
 */
class Create extends BaseMethod
{
    /**
     * Create item
     * Available methods POST & PATCH
     *
     * @param $model
     * @throws \Exception
     */
    public function index($model)
    {
        $newModel = new $model();

        $data = (Request::getData('post') ? Request::getData('post') : Request::getData('patch'));

        if(!isset($data))
            throw new MyException("Data is empty. Please use methods: POST, PATCH", 500);

        //delete primary key from request
        unset($data[$newModel::$primary_key]);
        $newModel->attributes=$data;
        $newModel->save();

        echo Serializer::model($newModel);
    }
}