<?php

require_once 'vendor/autoload.php';

use AcmeWidgetCo\{Product, DeliveryChargeRule, Offer, Basket};

// Initialize the product catalog
$catalogue = [
    new Product('R01', 'Red Widget', 32.95),
    new Product('G01', 'Green Widget', 24.95),
    new Product('B01', 'Blue Widget', 7.95),
];

// Define delivery charge rules
$deliveryChargeRules = [
    new DeliveryChargeRule(0, 50, 4.95),
    new DeliveryChargeRule(50, 90, 2.95),
    new DeliveryChargeRule(90, PHP_FLOAT_MAX, 0), // Free delivery over $90
];

// Define special offers
$offers = [
    new Offer('R01', 2, 32.95 / 2), // "Buy one red widget, get the second half price"
];

// Initialize the basket with catalog, delivery rules, and offers
$basket = new Basket($catalogue, $deliveryChargeRules, $offers);

// Add products to the basket
$basket->add('B01');
$basket->add('G01');

// Output the total cost for manual verification
echo "Total cost: $" . number_format($basket->total(), 2) . PHP_EOL; // Expected output: Total cost: $37.85

//  test case 2
$basket = new Basket($catalogue, $deliveryChargeRules, $offers);
$basket->add('R01');
$basket->add('R01');
echo "Total cost: $" . number_format($basket->total(), 2) . PHP_EOL; // Expected output: Total cost: $54.37

//  test case 3
$basket = new Basket($catalogue, $deliveryChargeRules, $offers);
$basket->add('R01');
$basket->add('G01'); 
echo "Total cost: $" . number_format($basket->total(), 2) . PHP_EOL; // Expected output: Total cost: $54.37

//  test case 4
$basket = new Basket($catalogue, $deliveryChargeRules, $offers);
$basket->add('B01');
$basket->add('B01'); 
$basket->add('R01'); 
$basket->add('R01'); 
$basket->add('R01');  
echo "Total cost: $" . number_format($basket->total(), 2) . PHP_EOL; // Expected output: Total cost: $54.37
