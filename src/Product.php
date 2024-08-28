<?php

namespace AcmeWidgetCo;

class Product
{
    private string $code; // Product code
    private string $name; // Product name
    private float $price; // Product price

    // Constructor to initialize product
    public function __construct(string $code, string $name, float $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }

    // Get the product code
    public function getCode(): string
    {
        return $this->code;
    }

    // Get the product name
    public function getName(): string
    {
        return $this->name;
    }

    // Get the product price
    public function getPrice(): float
    {
        return $this->price;
    }
}