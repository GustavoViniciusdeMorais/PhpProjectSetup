## Conditionals
#### In the context of validating object attribute
##### This is too much
```php
if (isset($object->attribute)) {
    // business rules
}
```
##### Ternary is better
```php
$value = isset($object->attribute) ? $object->attribute : $fallback;
```
##### Even better
```php
$value = $object->attribute ?? $fallback;
```
##### Even better with framweork function
```php
$value = data_get($object, 'attribute', $fallback);
```
##### Native language lighter
```php
$value = $object?->attribute;
```
