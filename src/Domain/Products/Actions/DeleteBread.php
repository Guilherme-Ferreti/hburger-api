<?php

namespace Domain\Products\Actions;

use Domain\Products\Models\Bread;

class DeleteBread
{
    public function handle(Bread $bread): void
    {
        $bread->delete();
    }
}
