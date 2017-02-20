<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;
use Common\MyException;
use Common\Request;

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
            throw new MyException("Require param id not found!", 500);

        $model = $model::find($request['id']);

        echo $model->delete();
    }
}