<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService $categoryService
    ) {}

    // GET /api/client/categories
    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAllCategories();

        return $this->response(
            message: 'Categories fetched successfully',
            data: [
                'categories' => CategoryResource::collection($categories),
            ]
        );
    }

    public function show(Category $category): JsonResponse
    {
        return $this->response(
            message: 'Category fetched successfully',
            data: [
                'category' => new CategoryResource($category),
            ]
        );
    }
}
