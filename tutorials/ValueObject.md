# Value Object

### Percent
```bash
php public/src/Percentage.php
```
```php
class Percent
{
    public float $value;
    public string $formatted;

    public function __construct(float $value)
    {
        $this->value = $value;

        if ($value === null) {
            $this->formatted = "";
        } else {
            $this->formatted = number_format($value * 100, 2) . '%';
        }
    }

    public static function from(float $value): self
    {
        return new self($value);
    }
}
```
