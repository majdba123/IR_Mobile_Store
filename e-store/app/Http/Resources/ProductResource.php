<?php

namespace App\Http\Resources;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
           return [
            'id' => $this->id,
            'mobile_name' => $this->mobile_name,

        ];

    }
}
