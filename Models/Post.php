<?php
namespace Models;
use ActiveRecord;

class Post  extends ActiveRecord\Model
{
    // explicit table name since our table is not "books"
    static $table_name = 'yii_post';

    // explicit pk since our pk is not "id"
    static $primary_key = 'id';

    // explicit connection name since we always want production with this model
    static $connection = 'production';

    // explicit database name will generate sql like so => db.table_name
//    static $db = 'test';

}