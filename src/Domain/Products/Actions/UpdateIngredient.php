<?php

declare(strict_types=1);

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\IngredientData;
use Domain\Products\Models\Ingredient;

class UpdateIngredient
{
    public function handle(Ingredient $ingredient, IngredientData $data): Ingredient
    {
        $ingredient->update($data->toArray());

        return $ingredient;
    }
}
