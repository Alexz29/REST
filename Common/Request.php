<?php
namespace Common;
/**
 * Request registry
 */
class Request{

    /**
     * @var array
     */
    protected static $data=array();

    /**
     * Get value by key
     *
     * @param $key
     * @return mixed|null
     */
    public static function getData($key)
    {
        return isset(self::$data[$key]) ? self::$data[$key] : null;
    }

    /**
     * Add value
     *
     * @param $key
     * @param $value
     */
    public static function setData($key,$value)
    {
        self::$data[$key] = $value;
    }

    /**
     * Delete value by key
     *
     * @param string $key
     * @return void
     */
    final public static function removeProduct($key)
    {
        if (array_key_exists($key, self::$data)) {
            unset(self::$data[$key]);
        }
    }

}