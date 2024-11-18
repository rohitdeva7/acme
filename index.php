<?php

require_once 'Basket.php';

$catalogue = [
    'R01' => 32.95,
    'G01' => 24.95,
    'B01' => 7.95,
];

$deliveryRules = [
    'under_50' => 4.95,
    'under_90' => 2.95,
    'over_90' => 0,
];

$offers = [
    'R01' => 'buy_one_get_second_half',
];

$basket = new Basket($catalogue, $deliveryRules, $offers);

// Add items
$basket->add('B01');
$basket->add('G01');
echo "Total: $" . $basket->total() . "\n";
