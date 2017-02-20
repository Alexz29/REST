<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Common;

/**
 * Class MyException custom exception
 * @package Common
 */
class MyException extends \Exception
{
    public function __construct($message, $code = 0) {
        parent::__construct($message, $code);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * get error
     *
     * @return string
     */
    public function getJsonMessage(){
        return json_encode([
            'code'=>$this->code,
            'message'=>$this->message
        ]);
    }
}

