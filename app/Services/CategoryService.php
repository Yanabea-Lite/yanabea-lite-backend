<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{

    public function getAllCategories()
    {
        return Category::select('id', 'name', 'description', 'slug', 'sort_order', 'is_active')->get();
    }


    public function getCategoryById($id)
    {
        return Category::find($id);
    }
}
