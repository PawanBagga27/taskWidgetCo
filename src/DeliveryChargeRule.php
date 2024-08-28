<?php

namespace AcmeWidgetCo;

class DeliveryChargeRule
{
    private float $minSpend; // Minimum spend for the rule
    private float $maxSpend; // Maximum spend for the rule
    private float $charge; // Delivery charge

    // Constructor to initialize the rule
    public function __construct(float $minSpend, float $maxSpend, float $charge)
    {
        $this->minSpend = $minSpend;
        $this->maxSpend = $maxSpend;
        $this->charge = $charge;
    }

    // Check if the rule applies based on total spend
    public function applies(float $total): bool
    {
        return $total >= $this->minSpend && $total < $this->maxSpend;
    }

    // Get the delivery charge
    public function getCharge(): float
    {
        return $this->charge;
    }
}