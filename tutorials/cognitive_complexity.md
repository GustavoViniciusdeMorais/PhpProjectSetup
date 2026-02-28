# Code Complexity

- A function can not alter the value of a variable out of its scope
- A function can not have more then two if statements
- A function can not have more then one return
- A function can not have more then 3 parameters, if so, create a data transfer object
- A class can not have more then 20 methods
- A class can not have more then 200 lines of code

### Negative condition
Give preference to negative conditions.
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
