<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

require_once __DIR__ . '/Common/Autoloader.php';
require_once __DIR__ . '/Config/db.php';
require_once __DIR__ . '/vendor/php-activerecord/php-activerecord/ActiveRecord.php';

use Common\Router;
use Common\DbConnection;
//use Models\Review;

define('ROOT_DIR', __DIR__);

DbConnection::init($db);



$model=new Review();
$con=\ActiveRecord\Connection::instance('production');
$obj=\Common\TableFactory::createByModel($model, $con);
$obj->exec();