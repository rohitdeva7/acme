# Acme Widget Co Sales Basket

## Description

This project is a proof-of-concept sales system for Acme Widget Co. It calculates the total cost of items in a basket, including:

- Product prices.
- Delivery charges based on total spend.
- Special offers such as "buy one red widget, get the second half price."

## Features

- Flexible configuration for product catalogue, delivery rules, and offers.
- Easy-to-update PHP code.
- Tested with multiple scenarios.

## How It Works

- Add Products: Use the add($productCode) method to add items to the basket.
- Calculate Total: Use the total() method to calculate the basket's total, including delivery and offers.

## Assumptions

- Special offers apply only to the specified product.
- Delivery charges are based on the pre-offer total cost.

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/yourusername/acme-widget-basket.git
   ```
