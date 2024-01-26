<?php

namespace App\Sorters;

use Illuminate\Support\Collection;

class SortByPrice implements ProductSortInterface
{
   public function sort(array $products, string $order): array
   {
        usort($products, function ($firstValue, $secondValue) use ($order) {
            $result = $firstValue['price'] <=> $secondValue['price'];
            switch ($order){
                case 'asc':
                    return $result;
                default:
                    return -$result;
            }
        });
        return $products;
   }
}