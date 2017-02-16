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
     */
    public static function init(){
        $connections = array(
            'development' => 'mysql://invalid',
            'production' => "mysql://root:annushka000@localhost/yii_store"
        );

        // initialize ActiveRecord
        ActiveRecord\Config::initialize(function($cfg) use ($connections)
        {
            $cfg->set_model_directory('.');
            $cfg->set_connections($connections);
        });
    }

}