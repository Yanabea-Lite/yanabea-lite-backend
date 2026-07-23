<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;

class ProductService
{
   public function index(Category $category)
    {
        return $category->products()->get();
    }
}
