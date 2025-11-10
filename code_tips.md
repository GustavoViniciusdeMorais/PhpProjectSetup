# Code Tips
### Usefull
#### Strings
```php
$endpoint = "resource/{id}";
print_r(str_replace(["{id}"], ["1"], $endpoint));

$value=null;
echo $value ?? "empty";

$calc = fn($a) => $a**2; echo $calc(3);
```
