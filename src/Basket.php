<?php

namespace AcmeWidgetCo;

class Basket
{
    private array $products = []; // Holds basket products
    private array $catalogue; // Product catalogue
    private array $deliveryChargeRules; // Delivery charge rules
    private array $offers; // Special offers

    // Constructor to initialize catalogue, rules, and offers
    public function __construct(array $catalogue, array $deliveryChargeRules, array $offers)
    {
        $this->catalogue = $catalogue;
        $this->deliveryChargeRules = $deliveryChargeRules;
        $this->offers = $offers;
    }

    // Add a product to the basket
    public function add(string $productCode): void
    {
        foreach ($this->catalogue as $product) {
            if ($product->getCode() === $productCode) {
                $this->products[] = $product;
                return;
            }
        }
        throw new \InvalidArgumentException("Product code {$productCode} not found in catalogue.");
    }

    // Calculate total cost of the basket
    public function total(): float
    {
        $subtotal = array_reduce($this->products, fn($carry, Product $product) => round($carry + $product->getPrice(), 2), 0);
        $discount = 0.0;

        // Apply discounts based on offers
        foreach ($this->offers as $offer) {
            if ($offer->applies($this->products)) {
                $discount += round($offer->getDiscount(), 2);
            }
        }

        $total = round($subtotal - $discount, 2);
        $deliveryCharge = $this->getDeliveryCharge($total);
        return round($total + $deliveryCharge, 2); 
    }

    // Determine the delivery charge based on total cost
    private function getDeliveryCharge(float $total): float
    {
        foreach ($this->deliveryChargeRules as $rule) {
            if ($rule->applies($total)) {
                return $rule->getCharge();
            }
        }
        return 0.0;
    }
}
