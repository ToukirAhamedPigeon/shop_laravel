<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\DTOs\ProductFilterDto;
use App\Http\Services\ProductService;
use App\Http\Requests\ProductFilterRequest;

class ProductsController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function getAll(ProductFilterRequest $request)
    {
        $filter = ProductFilterDto::fromRequest($request);
        $products = $this->productService->getAll($filter);
        return response()->json($products);
    }
}
