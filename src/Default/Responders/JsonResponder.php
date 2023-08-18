<?php

namespace gustavo\vinicius\Default\Responders;

class JsonResponder
{
    protected static $formattedResponse = [
        'message' => 'Success',
        'data' => []
    ];

    public static function response($data)
    {
        self::$formattedResponse['data'] = $data;
        return json_encode(self::$formattedResponse);
    }
}
