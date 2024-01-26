<?php

namespace App\Sorters;

use Illuminate\Support\Collection;

class SortBySalesPerView implements ProductSortInterface
{
   public function sort($products, $order)
   {
        foreach ($products as &$product) {
            $product['sales_per_view_ratio'] = ($product['views_count'] != 0) ? $product['sales_count'] / $product['views_count'] : 0;
        }
        unset($product);

        usort($products, function ($firstValue, $secondValue) use ($order) {
            $result = $firstValue['sales_per_view_ratio'] <=> $secondValue['sales_per_view_ratio'];
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