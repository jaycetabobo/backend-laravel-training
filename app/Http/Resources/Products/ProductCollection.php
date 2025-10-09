<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\BaseResourceCollection;

class ProductCollection extends BaseResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}