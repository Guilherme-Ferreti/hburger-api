<?php

declare(strict_types=1);

namespace App\Api\Products\Controllers;

use App\Api\Products\Requests\StoreIngredientRequest;
use App\Api\Products\Requests\UpdateIngredientRequest;
use App\Api\Products\Resources\IngredientResource;
use Domain\Products\Actions\StoreIngredient;
use Domain\Products\Actions\UpdateIngredient;
use Domain\Products\DataTransferObjects\IngredientData;
use Domain\Products\Models\Ingredient;

class IngredientController
{
    public function index()
    {
        return IngredientResource::collection(Ingredient::all());
    }

    public function store(StoreIngredientRequest $request)
    {
        $ingredient = app(StoreIngredient::class)->handle(IngredientData::fromRequest($request));

        return new IngredientResource($ingredient);
    }

    public function update(UpdateIngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient = app(UpdateIngredient::class)->handle($ingredient, IngredientData::fromRequest($request));

        return new IngredientResource($ingredient);
    }
}
