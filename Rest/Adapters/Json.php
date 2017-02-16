<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */

namespace Rest\Adapters;
use Rest\Serializer;

/**
 * Class Json
 * @package Rest\Adapters
 */
class Json extends Serializer
{
    /**
     * Default function in Adapter "Convert"  model to json
     * @param $model object ActiveRecord model
     * @return null|string
     */
    public function convert($model){
        $response = null;
        $count = 0;

        if(is_array($model)){
            foreach ($model as $item) {
                foreach ($item->attributes() as $key => $value) {
                    $response[$count][$key] = self::escapeJsonString($value);
                }
                $count++;
            }
        }else{
            foreach ($model->attributes() as $key => $value) {
                $response[$key] = self::escapeJsonString($value);
            }
        }
        $response = json_encode($response);
        if (!$response) {
            $response = json_encode([
                "error" => self::escapeJsonString(json_last_error_msg())
            ]);
        }

        header('Content-Type: application/json');
        return $response;
    }

    /**
     * Escape spec charset
     * @param $value string  input str
     * @return string string output str
     */
    public static function escapeJsonString($value){
        $result=htmlentities($value);
        return $result;
    }
}