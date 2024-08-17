### Introduction to PHP Enums

Enums, short for "enumerations," are a special kind of class in PHP that represent a fixed set of possible values. They are useful when you have a variable that can only take one out of a small set of possible values. PHP 8.1 introduced enums, making it easier to work with these kinds of values.

- [Official documentation](https://www.php.net/manual/en/language.enumerations.backed.php)
- [Code example](../public/src/EnumExample.php)

### Basic Enum Structure

In PHP, you define an enum using the `enum` keyword. Here's a simple example:

```php
enum OrderStatus: string
{
    case Draft = 'draft';
    case Done = 'done';
}
```

This defines an enum named `OrderStatus` with two possible values: `Draft` and `Done`. Each case has an associated string value (`'draft'` and `'done'`, respectively).

### Adding Methods to Enums

PHP enums can have methods, allowing you to add behavior directly to your enum. In the following code, we add a method called `createStatus()` to the `OrderStatus` enum:

```php
enum OrderStatus: string
{
    case Draft = 'draft';
    case Done = 'done';

    public function createStatus(): Status
    {
        return match ($this) {
            self::Draft => new DraftStatus(),
            self::Done => new DoneStatus(),
        };
    }
}
```

### Explanation of the Code

1. **Enum Declaration:**
   - `enum OrderStatus: string`: This declares an enum named `OrderStatus` with a backing type of `string`. The backing type is optional, but here it's used to associate each enum case with a specific string value.

2. **Cases:**
   - `case Draft = 'draft';`: Defines an enum case named `Draft` with a value of `'draft'`.
   - `case Done = 'done';`: Defines an enum case named `Done` with a value of `'done'`.

3. **Method:**
   - `public function createStatus(): Status`: This method will return a `Status` object based on the current enum case. The `match` expression is used to match the current enum case (`$this`) with its corresponding action.

   - `match ($this)`: This checks which case is currently in use (`Draft` or `Done`) and returns a corresponding object (`DraftStatus` or `DoneStatus`).

### Using the Enum

To use this enum and method, you can create a status based on the enum value like this:

```php
$status = OrderStatus::from('draft')->createStatus();
print_r(json_encode(['rules' => $status->getRules()]));
```

### Explanation of Usage

1. **OrderStatus::from('draft'):**
   - This method converts the string `'draft'` into the corresponding enum case (`OrderStatus::Draft`).

2. **createStatus():**
   - Calls the `createStatus()` method on the enum case. Since the case is `Draft`, the method will return a `DraftStatus` object.

3. **json_encode(['rules' => $status->getRules()]):**
   - Converts the result of `$status->getRules()` into a JSON string. The method `getRules()` is assumed to return an array of rules associated with the status.

4. **Output:**
   - The final output will be `{"rules":["draft"]}`, showing that the rules associated with the `DraftStatus` were retrieved and encoded into JSON.

### Conclusion

Enums in PHP offer a clean and powerful way to represent and manage a set of related values. By associating methods and logic directly with enum cases, you can keep your code organized and make it easy to work with these values in a type-safe manner.

This example shows how you can extend enums with methods to return different objects or perform specific actions based on the current enum value. This can be especially useful in scenarios like handling order statuses, as shown in the example.