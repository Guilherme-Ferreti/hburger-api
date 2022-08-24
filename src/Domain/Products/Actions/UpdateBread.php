<?php

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\BreadData;
use Domain\Products\Models\Bread;

class UpdateBread
{
    public function handle(Bread $bread, BreadData $data): Bread
    {
        $bread->update($data->toArray());

        return $bread;
    }
}
