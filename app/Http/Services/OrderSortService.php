<?php

namespace App\Http\Services;

class OrderSortService
{
    //this might work too just trying to think out of the box
    public function sort(array $products, $key, $order): array
    {
        if ($key == 'sales per view') {
            $updatedProductsArray = $this->addSalesPerViewRatioToArray($products);
            $key = 'sales_per_view_ratio';
            $products = $updatedProductsArray;
        }
        usort($products, function ($firstValue, $secondValue) use ($key, $order) {
            $result = $firstValue[$key] <=> $secondValue[$key];
            switch ($order){
                case 'asc':
                    return $result;
                case 'desc':
                    return -$result;
                default:
                    return $result;
            }
        });
        return $products;
    }

    private function addSalesPerViewRatioToArray(array $products): array
    {
        foreach ($products as &$product) {
            $product['sales_per_view_ratio'] = ($product['views_count'] != 0) ? $product['sales_count'] / $product['views_count'] : 0;
        }
        unset($product);
        return $products;
    }
}