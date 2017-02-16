<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;
use Rest\Serializer;

class Update extends BaseMethod
{
    public function index($model){
        if(!isset($this->getRequest['id'])){
            throw new \Exception("Require param id not found!");
        }

        $model=$model::find($this->getRequest['id']);
//        $model->attributes=$this->postRequest;
        $model->attributes=$this->getRequest;
        $model->save();

        echo Serializer::model($model, $this->format);
    }
}