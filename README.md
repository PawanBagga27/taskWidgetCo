# taskWidgetCo

## Overview

The Acme Widget Co Sales System is a PHP-based application for managing product sales, special offers, and delivery charges in an e-commerce store. It calculates the total cost of a basket of products, incorporating applicable discounts and delivery charges.

## Features

- **Product Management:** Add and manage products by code, name, and price.
- **Special Offers:** Define and apply special offers (e.g., "Buy one red widget, get the second half price").
- **Delivery Charges:** Compute delivery charges based on the basket's total value.
- **Unit Testing:** Includes PHPUnit tests to verify the accuracy of basket calculations.

## Requirements

- PHP 8.0 or higher
- Composer

## Installation

1. **Clone the Repository**

   Clone the repository to your local machine:

   ```bash
   git clone https://github.com/PawanBagga27/taskWidgetCo.git
   cd taskWidgetCo


Install Dependencies
composer install


Usage
To run the application and calculate the total cost of a basket, execute the following command:

php tests/testScript.php

This script demonstrates how to create a product catalog, define delivery rules, and apply special offers to compute the basket's total cost.


Running Tests
Execute the PHPUnit tests to ensure the application functions correctly:
vendor/bin/phpunit --bootstrap vendor/autoload.php tests/BasketTest.php


Project Structure
src/ - Contains the main application classes:

Product: Represents a product.
Basket: Manages the basket of products and calculates totals.
Offer: Defines special offers.
DeliveryChargeRule: Calculates delivery charges based on the total spend.
tests/ - Contains test scripts and PHPUnit tests:

BasketTest.php: Tests for the Basket class.
vendor/ - Contains Composer dependencies.

Example

Define a Product Catalog
Create a catalog with product codes, names, and prices.

Define Delivery Rules
Specify delivery rules with minimum spend, maximum spend, and charge.

Define Special Offers
Set up offers with product codes, required quantities, and discount amounts.

Calculate Total Cost
Create a basket, add products, and calculate the total cost including discounts and delivery charges.
