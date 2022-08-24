<?php

namespace App\Api\Products\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BreadResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'price'     => $this->price,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
