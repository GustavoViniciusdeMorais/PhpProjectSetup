# Code Complexity

### Negative condition
```php
if (!$hasPermission) {
    throw new CustomException("system.default.error");
}
```

### Only one return
```php
public function getProducts(): Collection
{
    $products = null;
    if ($this->loggedUserHasPermission()) {
        $products = Products::all();
    }

    return $products;
}
```
