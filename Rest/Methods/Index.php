<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Methods;
use Rest\Serializer;

class Index extends BaseMethod
{
    public function index($model){
        $model=$model::first()->all();
        echo Serializer::model($model, $this->format);
    }

}