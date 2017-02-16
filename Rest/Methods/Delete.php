<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;

class Delete extends BaseMethod
{
    public function index($model){
        if(!isset($this->getRequest['id'])){
            throw new \Exception("Require param id not found!");
        }
        $model = $model::find($this->getRequest['id']);
        echo $model->delete();
    }
}