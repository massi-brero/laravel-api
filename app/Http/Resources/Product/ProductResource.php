<?php

namespace App\Http\Resources\Product;



class ProductResource extends ProductResourceAbstract
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'totalPrice' =>  $this->getDiscountedPrice(),
            'stock' => $this->stock,
            'discount' => $this->discount,
            'rating' => $this->getStarsAverage(),
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
