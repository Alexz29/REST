<?php
/**
 * Created by Alexey Diveev
 * Email: a.a.diveev@gmail.com
 */

namespace Rest\Methods;

/**
 * Class BaseMethod
 * @package Rest\Methods
 */
class BaseMethod
{
    /**
     * @var array reserved word
     */
    public static $rWords=[
        'per_page',
        'page',
        'format'
    ];

}