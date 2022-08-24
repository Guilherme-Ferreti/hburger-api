<?php

namespace Domain\Products\Actions;

use Domain\Products\DataTransferObjects\BreadData;
use Domain\Products\Models\Bread;

class StoreBread
{
    public function handle(BreadData $data): Bread
    {
        return Bread::create($data->toArray());
    }
}
