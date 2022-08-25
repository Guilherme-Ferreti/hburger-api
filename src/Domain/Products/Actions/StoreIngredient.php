<?php

declare(strict_types=1);

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\IngredientData;
use Domain\Products\Models\Ingredient;

class StoreIngredient
{
    public function handle(IngredientData $data): Ingredient
    {
        return Ingredient::create($data->toArray());
    }
}
