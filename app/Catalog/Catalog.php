<?php

namespace App\Catalog;

use App\Sorters\ProductSortInterface;
class Catalog
{
    private $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function getProducts(ProductSortInterface $sorter, string $order): array
    {
        return $sorter->sort($this->products, $order);
    }
}