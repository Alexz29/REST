<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Common;
use ActiveRecord;

/**
 * Class DbConnection
 * @package Common
 */
class DbConnection
{
    /**
     * Connect to db use Active record
     *
     * @param $connections
     */
    public static function init($connections){

        // initialize ActiveRecord
        ActiveRecord\Config::initialize(function($cfg) use ($connections)
        {
            $cfg->set_model_directory('.');
            $cfg->set_connections($connections);
        });
    }

}