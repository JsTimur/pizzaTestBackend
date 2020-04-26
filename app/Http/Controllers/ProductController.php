<?php

namespace App\Http\Controllers;

use App\Product;
use Cache;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function getList() {
        if (Cache::has('api_products')) {
            $products = json_decode(Cache::get('api_products'));
        } else {
            $products = Product::all();
            Cache::put('api_products', json_encode($products));
        }
        return ProductResource::collection($products);

    }
}
