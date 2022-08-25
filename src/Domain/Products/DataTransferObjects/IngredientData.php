<?php

namespace Domain\Products\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class IngredientData extends DataTransferObject
{
    public readonly string $name;

    public readonly float $price;

    public static function fromRequest(Request $request): self
    {
        return new self($request->validated());
    }
}
