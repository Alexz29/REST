<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;
use Rest\Serializer;

/**
 * Class Index
 * @package Rest\Methods
 */
class Index extends BaseMethod
{
    /**
     * Get all items from db
     *
     * @param $model
     */
    public function index($model){

        $model=$model::first()->all();

        echo Serializer::model($model);
    }

}