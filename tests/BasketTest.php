<?php

use PHPUnit\Framework\TestCase;
use AcmeWidgetCo\{Product, DeliveryChargeRule, Offer, Basket};

class BasketTest extends TestCase
{
    private array $catalogue;
    private array $deliveryChargeRules;
    private array $offers;

    // Set up test data
    protected function setUp(): void
    {
        $this->catalogue = [
            new Product('R01', 'Red Widget', 32.95),
            new Product('G01', 'Green Widget', 24.95),
            new Product('B01', 'Blue Widget', 7.95)
        ];

        $this->deliveryChargeRules = [
            new DeliveryChargeRule(0, 50, 4.95),     // Charge for spend < $50
            new DeliveryChargeRule(50, 90, 2.95),    // Charge for spend $50 - $90
            new DeliveryChargeRule(90, PHP_FLOAT_MAX, 0) // Free delivery above $90
        ];

        $this->offers = [
            new Offer('R01', 2, 32.95 / 2) // Offer: Buy 1 Red Widget, get the 2nd half price
        ];
    }

    // Test basket calculations
    public function testBasketCalculations()
    {
        $basket = new Basket($this->catalogue, $this->deliveryChargeRules, $this->offers);

        // Test Case 1: Add Blue and Green Widget
        $basket->add('B01');
        $basket->add('G01');
        $this->assertEquals(37.85, $basket->total());

        // Test Case 2: Add two Red Widgets
        $basket = new Basket($this->catalogue, $this->deliveryChargeRules, $this->offers);
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(54.37, $basket->total());

        // Test Case 3: Add one Red and one Green Widget
        $basket = new Basket($this->catalogue, $this->deliveryChargeRules, $this->offers);
        $basket->add('R01');
        $basket->add('G01');
        $this->assertEquals(60.85, $basket->total());

        // Test Case 4: Add two Blue and three Red Widgets
        $basket = new Basket($this->catalogue, $this->deliveryChargeRules, $this->offers);
        $basket->add('B01');
        $basket->add('B01');
        $basket->add('R01');
        $basket->add('R01');
        $basket->add('R01');
        $this->assertEquals(98.27, $basket->total());
    }
}