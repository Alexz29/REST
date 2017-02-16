<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;
use Rest\Serializer;

class Create extends BaseMethod
{

    public function index($model){
        $newModel = new $model();

        unset($this->getRequest[$newModel->primary_key[0]]);

//        $model->attributes=$this->postRequest;

        $newModel->attributes=$this->getRequest;

        $newModel->save();

        echo Serializer::model($newModel, $this->format);
    }
}