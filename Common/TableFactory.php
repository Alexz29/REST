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
    private $tabel_name;

    /**
     * @var object model fot table
     */
    private $model;

    /**
     * @var object db connection
     */
    private $connection;

    /**
     * @var string attributes for query
     */
    private $_attr;

    /**
     * Table constructor.
     * @param $model
     * @param $connection
     */
    public function __construct($model, $connection){
        $this->model = $model;
        $this->connection = $connection;
        $this->tabel_name=$model::$table_name;
    }

    /**
     * Create table in db
     */
    public function exec(){
        foreach ($this->model->fields() as $key => $val)
            $this->_attr.= $key . ' ' . $val . ', ';

        $attr = trim($this->_attr, ', ');
        $this->connection->query("CREATE TABLE $this->table_name ($attr)");

        return true;
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
        return new Table($model, $connection);
    }
}
