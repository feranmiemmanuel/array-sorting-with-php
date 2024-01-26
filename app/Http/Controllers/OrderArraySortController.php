<?php

namespace App\Http\Controllers;

use App\Catalog\Catalog;
use App\Sorters\SortByPrice;
use Illuminate\Support\Collection;
use App\Sorters\SortBySalesPerView;

class OrderArraySortController extends Controller
{
    public $products;
    public function __construct()
    {
        $this->products = [
            [
            'id' => 1,
            'name' => 'Alabaster Table',
            'price' => 12.99,
            'created' => '2019-01-04',
            'sales_count' => 32,
            'views_count' => 730,
            ],
            [
            'id' => 2,
            'name' => 'Zebra Table',
            'price' => 44.49,
            'created' => '2012-01-04',
            'sales_count' => 301,
            'views_count' => 3279,
            ],
            [
            'id' => 3,
            'name' => 'Coffee Table',
            'price' => 10.00,
            'created' => '2014-05-28',
            'sales_count' => 1048,
            'views_count' => 20123,
            ]
        ];
    }
    public function sortOrder(): array
    {
        $catalog = new Catalog($this->products);
        $productPriceSorter = new SortByPrice();
        $productSalesPerViewSorter = new SortBySalesPerView();

        $productsSortedByPriceAsc = $catalog->getProducts($productPriceSorter, 'asc');
        $productsSortedByPriceDesc = $catalog->getProducts($productPriceSorter, 'desc');

        $productsSortedBySalesPerViewAsc = $catalog->getProducts($productSalesPerViewSorter, 'asc');
        $productsSortedBySalesPerViewDesc = $catalog->getProducts($productSalesPerViewSorter, 'desc');

        return [
            'products_sorted_by_price_asc' => $productsSortedByPriceAsc,
            'products_sorted_by_price_desc' =>  $productsSortedByPriceDesc,
            'products_sorted_by_sales_per_view_asc' => $productsSortedBySalesPerViewAsc,
            'products_sorted_by_sales_per_view_desc' => $productsSortedBySalesPerViewDesc
        ];
    }
}
