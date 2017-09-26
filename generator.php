<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

date_default_timezone_set('America/Los_Angeles');


require_once __DIR__ . '/Common/Autoloader.php';
require_once __DIR__ . '/Config/db.php';
require_once __DIR__ . '/vendor/php-activerecord/php-activerecord/ActiveRecord.php';

//use Common\Router;
use Common\DbConnection;
use Models\Review;


define('ROOT_DIR', __DIR__);
DbConnection::init($db);
$con=\ActiveRecord\Connection::instance('production');

define('DELETE', 'delete');
define('CREATE', 'create');
define('UP', 'up');
define('DOWN', 'down');



if (isset($argv[1])) {

    if(isset($argv[2])){
        $modelFile='Models\\'.$argv[2];
        $model= new $modelFile();

        if ($argv[1] == DELETE) {
            $obj = \Common\TableFactory::deleteTable($model, $con);
            $obj->exec();
        }

        if ($argv[1] == CREATE) {
            if (array_search($model::table_name(), $con->tables())) {
                throw new \Common\MyException("table " . $model::table_name() . " already exists, Try to delete this tbl ");
            }
            $obj=\Common\TableFactory::createByModel($model, $con);
            $obj->exec();
        }
    }

    if ($argv[1] == UP) {
        $files = array_diff(scandir(ROOT_DIR."/Models"), array('.', '..'));
        foreach ($files as $modelFile){
            $modelFile=str_replace(".php",'',$modelFile);
            $modelFile='Models\\'.$modelFile;
            $model= new $modelFile();

            if (array_search($model::table_name(), $con->tables())) {
                throw new \Common\MyException("table " . $model::table_name() . " already exists, Try to delete this tbl ");
            }
            $obj=\Common\TableFactory::createByModel($model, $con);
            $obj->exec();

        }
    }
}else{
    var_dump($con->tables());
}


