<?php

class Basket
{
    private $catalogue;
    private $deliveryRules;
    private $offers;
    private $items = [];

    public function __construct($catalogue, $deliveryRules, $offers)
    {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add($productCode)
    {
        if (array_key_exists($productCode, $this->catalogue)) {
            $this->items[] = $productCode;
        } else {
            throw new Exception("Product code {$productCode} is not in the catalogue.");
        }
    }

    public function total()
    {
        $totalCost = 0;
        $itemCounts = array_count_values($this->items);

        // Calculate total cost without delivery
        foreach ($itemCounts as $productCode => $quantity) {
            $price = $this->catalogue[$productCode];

            if ($productCode === 'R01' && $quantity >= 2) {
                // Apply "buy one red widget, get the second half price" offer
                $pairs = intdiv($quantity, 2);
                $remainder = $quantity % 2;
                $totalCost += $pairs * ($price + $price / 2) + $remainder * $price;
            } else {
                $totalCost += $quantity * $price;
            }
        }

        // Calculate delivery cost
        $deliveryCost = 0;
        if ($totalCost < 50) {
            $deliveryCost = $this->deliveryRules['under_50'];
        } elseif ($totalCost < 90) {
            $deliveryCost = $this->deliveryRules['under_90'];
        }

        $totalCost += $deliveryCost;

        return number_format($totalCost, 2);
    }
}
