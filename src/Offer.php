<?php

namespace AcmeWidgetCo;

class Offer
{
    private string $productCode; // Product code for the offer
    private int $requiredQuantity; // Quantity required for the offer
    private float $discount; // Discount amount

    // Constructor to initialize the offer
    public function __construct(string $productCode, int $requiredQuantity, float $discount)
    {
        $this->productCode = $productCode;
        $this->requiredQuantity = $requiredQuantity;
        $this->discount = $discount;
    }

    // Check if the offer applies based on product quantities
    public function applies(array $products): bool
    {
        $count = array_reduce($products, function ($carry, Product $product) {
            return $carry + ($product->getCode() === $this->productCode ? 1 : 0);
        }, 0);

        return $count >= $this->requiredQuantity;
    }

    // Get the discount amount
    public function getDiscount(): float
    {
        return $this->discount;
    }
}