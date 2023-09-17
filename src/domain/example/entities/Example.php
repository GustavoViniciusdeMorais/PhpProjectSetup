<?php

class Example
{

    public function test($num, $secNum)
    {
        $result = 0;
        if (
            isset($num)
            && is_numeric($num)
            && isset($secNum)
            && is_numeric($secNum)
        ) {
            $result = $num + $secNum;
        }
        return $result;
    }

}
