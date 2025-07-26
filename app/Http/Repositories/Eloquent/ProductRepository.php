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
            when($filter->name, fn($q) => $q->where('name', 'ILIKE', "%{$filter->name}%"))
            ->when($filter->minPrice, fn($q) => $q->where('price', '>=', $filter->minPrice))
            ->when($filter->maxPrice, fn($q) => $q->where('price', '<=', $filter->maxPrice))
            ->get();
    }
}
