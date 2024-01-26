<?php

namespace App\Sorters;

interface ProductSortInterface
{
    public function sort(array $products, string $order): array;
}