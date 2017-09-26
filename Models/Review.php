<?php
namespace Models;
use ActiveRecord;

class Review  extends ActiveRecord\Model
{
    // explicit table name since our table is not "books"
    static $table_name = 'review';

    // explicit pk since our pk is not "id"
    static $primary_key = 'id';

    // explicit connection name since we always want production with this model
    static $connection = 'production';

    /**
     * method set attr for tbl generator
     * sqlite
     *
     * @return array
     */
    public function fields(){
        return [
            'id'=>'INTEGER PRIMARY KEY',
            'text'=>'varchar(255)',
            'author'=>'varchar(255)'
        ];
    }

}