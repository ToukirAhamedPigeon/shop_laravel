<?php
namespace App\Http\Repositories\Interfaces;

use App\Http\DTOs\ProductFilterDto;

interface ProductRepositoryInterface
{
    public function getAll(ProductFilterDto $filter);
}
