<?php
// app/DTOs/ProductFilterDto.php

namespace App\Http\DTOs;

use App\Http\Requests\ProductFilterRequest;

class ProductFilterDto
{
    public function __construct(
        public ?string $Name,
        public ?float $minPrice,
        public ?float $maxPrice
    ) {}

    public static function fromRequest(ProductFilterRequest $request): self
    {
        $data = $request->validated();
        return new self(
            $data['Name'] ?? null,
            isset($data['minPrice']) ? (float) $data['minPrice'] : null,
            isset($data['maxPrice']) ? (float) $data['maxPrice'] : null,
        );
    }
}
