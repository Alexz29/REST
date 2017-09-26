<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

date_default_timezone_set('America/Los_Angeles');


//set handler for catch ActiveRecord Exception
set_exception_handler(function ($exception) {
    try {
        throw new \Common\MyException($exception->getMessage(), 200);
    } catch (\Common\MyException $e) {
        echo $e->getJsonMessage();
    }
});


define('ROOT_DIR', __DIR__);

require_once __DIR__ . '/Common/Autoloader.php';
require_once __DIR__ . '/Config/db.php';
require_once __DIR__ . '/vendor/php-activerecord/php-activerecord/ActiveRecord.php';

use Common\Router;
use Common\DbConnection;


DbConnection::init($db);
Router::run();