<?php

namespace App\Helpers;

/**
 * Class to parse JSON
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class JsonParser
{
    /**
     * Encode an array to JSON format
     * 
     * @param array $array An array of data
     * @return string 
     */
    public static function encode($array, $show = 'ugly')
    {
        if ($show == 'nice') {
            return json_encode($array, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        } else {
            return json_encode($array, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
    }
}