<?php

namespace gustavo\vinicius\Interfaces\Responders;

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