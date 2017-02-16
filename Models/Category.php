<?php
namespace Models;
use ActiveRecord;


class Category  extends ActiveRecord\Model
{
    static $table_name = 'yii_category';

    // explicit pk since our pk is not "id"
    static $primary_key = 'id';

    // explicit connection name since we always want production with this model
    static $connection = 'production';
}