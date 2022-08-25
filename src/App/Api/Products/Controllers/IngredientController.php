<?php

declare(strict_types=1);

namespace App\Api\Products\Controllers;

use App\Api\Products\Requests\StoreIngredientRequest;
use App\Api\Products\Resources\IngredientResource;
use Domain\Products\Actions\StoreIngredient;
use Domain\Products\DataTransferObjects\IngredientData;

class IngredientController
{
    public function store(StoreIngredientRequest $request)
    {
        $ingredient = app(StoreIngredient::class)->handle(IngredientData::fromRequest($request));

        return new IngredientResource($ingredient);
    }
}
