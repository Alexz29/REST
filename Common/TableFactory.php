<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Common;

/**
 * Class Table
 * @package Common
 */
/**
 * Class Table
 * @package Common
 */
class Table
{
    /**
     * @var string table name
     */
    private $table_name;

    /**
     * @var object model fot table
     */
    private $model;

    /**
     * @var object db connection
     */
    private $connection;

    /**
     * @var string query for db
     */
    private $query;

    /**
     * Table constructor.
     * @param $model
     * @param $connection
     * @param $query
     */
    public function __construct($model, $connection, $query){
        $this->model = $model;
        $this->connection = $connection;
        $this->table_name = $model::$table_name;
        $this->query=$query;
    }

    /**
     * Exec query
     */
    public function exec(){
        $this->connection->query($this->query);
    }
}


/**
 * Class TableFactory
 *
 * Example:
 *
 * $model=new \Models\Review(); // your model
 * $con=\ActiveRecord\Connection::instance('production');  // get connection from this version AR
 * $obj=\Common\TableFactory::createByModel($model, $con); // init create table
 * $obj->exec(); // execute sql query for create
 *
 *
 * @package Common
 */
class TableFactory
{
    /**
     * Create table by ActiveRecord model
     *
     * @param $model
     * @param $connection
     * @return Table
     */
    public static function createByModel($model, $connection){

        $_attr=null;
        foreach ($model->fields() as $key => $val) {
            $_attr .= $key . ' ' . $val . ', ';
        }
        $attr = trim($_attr, ', ');
        $query="CREATE TABLE ". $model::$table_name ."(".$attr.")";

        return new Table($model, $connection, $query);
    }

    public static function deleteTable($model, $connection){

        $query="DROP TABLE ". $model::$table_name ;
        return new Table($model, $connection, $query);
    }
}
