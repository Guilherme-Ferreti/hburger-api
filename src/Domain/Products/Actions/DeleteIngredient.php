<?php

declare(strict_types=1);

namespace Domain\Products\Actions;

use Domain\Products\Models\Ingredient;

class DeleteIngredient
{
    public function handle(Ingredient $ingredient): void
    {
        $ingredient->delete();
    }
}
