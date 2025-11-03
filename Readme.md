# Gus PHP Setup Project

### Tutorials
- [Curl Requests](./tutorials/curlRequests.md)
- [Server Session](./tutorials/serverSession.md)
- [Infrastructure](./infrastructure/main.md)
- [PHP ML](./tutorials/php_ml.md)
- [Enum example](./tutorials/enum.md)
- [Validate Attribute](./tutorials/ValidateAttribute.md)
- [Json](./tutorials/json.md)
- [Modular Engine](./images/ModularEngine.png)
- [PHP Bash File](./public/src/mybashphp)
- [Code Snippets](./snippets_php.json)

```bash
chmod u+x phpInstall.sh

./phpInstall.sh

composer.sh

composer init
```
### PHP Doc Function
Example:
```php
<?php
/**
 * A summary informing the user what the associated element does.
 *
 * A *description*, that can span multiple lines, to go _in-depth_ into
 * the details of this element and to provide some background information
 * or textual references.
 *
 * @param string $myArgument With a *description* of this argument,
 *                           these may also span multiple lines.
 *
 * @return void
 */
 function myFunction($myArgument)
 {
 }
```
Rererences:
- https://docs.phpdoc.org/guide/getting-started/what-is-a-docblock.html#example
### Url Encode
```php
// Your code here!
$url = "https://example.com?created>2015-09-01";
$encodedUrl = urlencode($url);

echo "Encoded URL: " . $encodedUrl;
```
### PHP CLI
```bash
php -r "print_r(strlen('linux'));" && echo ""
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
### Date diff for debugs
```php
$start = new \DateTime;
$end = new \DateTime;
$calc = $end->diff($start);
echo $calc->format("%H:%I:%S");
```
### Arrow func
```php
$calc = fn($a) => $a**2; echo $calc(3);
```
