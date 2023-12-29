# Gus PHP Setup Project

```
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
### TryCatch
```sh
try {
  # code ...
} catch (\Exception $e) {
   $response = [
       'message' => $e->getMessage(),
       'file' => $e->getFile(),
       'line' => $e->getLine(),
       'Details' => $e->getTrace(),
   ];
}
```
