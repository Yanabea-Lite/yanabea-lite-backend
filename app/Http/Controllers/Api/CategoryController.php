<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{


    public function __construct(private CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    // GET /api/client/categories
    public function index()
    {
        try {
            $categories = $this->categoryService->getAllCategories();

            return response()->json([
                'status' => true,
                'message' => 'Categories fetched successfully',
                'data' => CategoryResource::collection($categories),
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error fetching categories: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong'], 500);
        }
    }

    public function show($id)
    {
        try {
            $category = $this->categoryService->getCategoryById($id);

            if (!$category) {
                return response()->json(['status' => false, 'message' => 'Category not found'], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Category fetched successfully',
                'data' => new CategoryResource($category),
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error fetching category: ' . $e->getMessage());
            return response()->json(['status' => false, 'message' => 'Something went wrong'], 500);
        }
    }
}
