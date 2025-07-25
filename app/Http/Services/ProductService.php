<?php
namespace App\Http\Services;

use App\Http\DTOs\ProductFilterDto;
use App\Http\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ) {}

    public function getAll(ProductFilterDto $filter)
    {
        return $this->productRepository->getAll($filter);
    }
}
