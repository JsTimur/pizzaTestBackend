<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\Category as CategoryResource;
use Cache;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Get list categories
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getList() {
        if (Cache::has('api_categories')) {
            $categories = json_decode(Cache::get('api_categories'));
        } else {
            $categories = Category::with('products')->get();
            Cache::put('api_categories', json_encode($categories));
        }
        return CategoryResource::collection($categories);
    }
}
