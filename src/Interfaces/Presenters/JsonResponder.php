<?php

namespace gustavo\vinicius\Interfaces\Presenters;

class JsonResponder
{
    protected static $formattedResponse = [
        'message' => 'Success',
        'data' => []
    ];

    public static function response($data = null)
    {
        self::$formattedResponse['data'] = $data;
        return json_encode(self::$formattedResponse);
    }
}