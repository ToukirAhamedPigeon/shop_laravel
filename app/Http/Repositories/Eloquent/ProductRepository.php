<?php
namespace App\Http\Repositories\Eloquent;

use App\Models\Product;
use App\Http\DTOs\ProductFilterDto;
use App\Http\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(ProductFilterDto $filter)
    {
        return Product::
            when($filter->Name, fn($q) => $q->where('Name', 'ILIKE', "%{$filter->Name}%"))
            ->when($filter->minPrice, fn($q) => $q->where('Price', '>=', $filter->minPrice))
            ->when($filter->maxPrice, fn($q) => $q->where('Price', '<=', $filter->maxPrice))
            ->get();
    }
}
