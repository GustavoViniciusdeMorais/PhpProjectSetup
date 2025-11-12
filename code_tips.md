# Code Tips
### PHP CLI
```bash
php -r "print_r(strlen('linux'));" && echo ""
```
### Usefull
```php
$endpoint = "resource/{id}";
print_r(str_replace(["{id}"], ["1"], $endpoint));
```
```php
$value=null;
echo $value ?? "empty";
```
```php
$calc = fn($a) => $a**2; echo $calc(3);
```
```php
$start = new \DateTime;
$end = new \DateTime;
$calc = $end->diff($start);
echo $calc->format("%H:%I:%S");
```
```php
public static function sum(
  int $a = 0,
  int $b = 0
): int {
  return $a + $b;
}
```
```php
$pattern="/[^\w\d]/i"; $replace = "";
$subject = "+55(62)98457-1233";
$r = preg_replace($pattern, $replace, $subject);
```
### TryCatch
```sh
use Throwable;

try {
  # code ...
} catch (Throwable $e) {
   $response = [
       'message' => $e->getMessage(),
       'file' => $e->getFile(),
       'line' => $e->getLine(),
       'Details' => $e->getTrace(),
   ];
}
```
