<?php

require_once __DIR__ . '/../Basket.php';

function assertEquals($expected, $actual, $message)
{
    if ($expected === $actual) {
        echo "✔️  Test Passed: {$message}" . "</br>";
    } else {
        echo "❌  Test Failed: {$message}" . "</br>";
        echo "   Expected: {$expected}, Got: {$actual}" . "</br>";
    }
}

// Test the Basket functionality
function runTests()
{
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

    // Test Case 1: B01, G01
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    $basket->add('B01');
    $basket->add('G01');
    assertEquals('37.85', $basket->total(), "Basket total for [B01, G01]");

    // Test Case 2: R01, R01
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    $basket->add('R01');
    $basket->add('R01');
    assertEquals('54.37', $basket->total(), "Basket total for [R01, R01]");

    // Test Case 3: R01, G01
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    $basket->add('R01');
    $basket->add('G01');
    assertEquals('60.85', $basket->total(), "Basket total for [R01, G01]");

    // Test Case 4: B01, B01, R01, R01, R01
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    $basket->add('B01');
    $basket->add('B01');
    $basket->add('R01');
    $basket->add('R01');
    $basket->add('R01');
    assertEquals('98.27', $basket->total(), "Basket total for [B01, B01, R01, R01, R01]");

    // Test Case 5: Empty Basket
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    assertEquals('0.00', $basket->total(), "Basket total for an empty basket");

    // Test Case 6: Only delivery cost (B01)
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    $basket->add('B01');
    assertEquals('12.90', $basket->total(), "Basket total for [B01]");

    // Test Case 7: High value order with free delivery
    $basket = new Basket($catalogue, $deliveryRules, $offers);
    $basket->add('R01');
    $basket->add('R01');
    $basket->add('G01');
    $basket->add('G01');
    assertEquals('115.80', $basket->total(), "Basket total for [R01, R01, G01, G01]");
}

// Run all tests
runTests();
