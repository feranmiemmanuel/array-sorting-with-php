<?php

namespace App\Sorters;

interface ProductSortInterface
{
    public function sort($products, $order);
}