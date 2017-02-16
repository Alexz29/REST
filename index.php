<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

date_default_timezone_set('America/Los_Angeles');

require_once __DIR__ . '/Common/Autoloader.php';
require_once __DIR__ . '/Config/db.php';
require_once __DIR__ . '/Modules/php-activerecord/ActiveRecord.php';

use Common\Router;
use Common\DbConnection;


DbConnection::init();
Router::run();



