<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends ProductResourceAbstract
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'totalPrice' => $this->getDiscountedPrice(),
            'rating' => $this->getStarsAverage(),
            'href' => [
                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
