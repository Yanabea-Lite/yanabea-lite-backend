<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService)
    {}
    public function index(Category $category): JsonResponse
    {
        $products = $this->productService->index($category);
        return $this->response(
            message: 'Products fetched successfully',
            data: [
                'products' => ProductResource::collection($products),
            ]
        );
    }
}
