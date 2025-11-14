# Json with php
```php
<?php

$a = ['a'=>'z','b'=>'z'];
echo "array: ";
var_dump($a);

$j = json_encode($a);
echo "json: ";
var_dump($j);

$obj = json_decode($j);
echo "object: ";
var_dump($obj);

$arrayAgain = json_decode($j, true);
echo "array again: ";
var_dump($arrayAgain);

```
```php
<?php

$s = '{"os": "linux"}';
$obj = json_decode($s);
$a = json_decode($s, true);
$sagain = json_encode($obj);

print_r($obj);
print_r($a);
print_r($sagain);
print_r(gettype($sagain));
```
