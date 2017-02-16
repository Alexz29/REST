<?php
/**
 * Created by Diveev Alexey
 * Email: Alexz29@yandex.ru
 */
namespace Rest\Adapters;
use Rest\Serializer;

class Xml extends Serializer
{
    public function convert($model){
        return 'xml not support, use json';
    }
}