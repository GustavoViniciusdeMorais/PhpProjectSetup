<?php

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

$percent = Percent::from(0.2);
print_r(json_encode([
    "value" => $percent->value,
    "formatted" => $percent->formatted
]));echo "\n\n";
