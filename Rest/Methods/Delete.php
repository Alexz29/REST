<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;

/**
 * Class Delete
 * @package Rest\Methods
 */
class Delete extends BaseMethod
{
    /**
     * Delete item by id
     * Available POST & GET request
     * Require id param
     *
     * @param $model
     * @throws \Exception
     */
    public function index($model)
    {
        $request = (Request::getData('post') ? Request::getData('post') : Request::getData('get'));

        if(!isset($request['id']))
            throw new \Exception("Require param id not found!");

        $model = $model::find($request['id']);

        echo $model->delete();
    }
}