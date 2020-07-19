<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class ProductResourceAbstract extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
    }

    public function getStarsAverage()
    {
        if ($this->reviews->count() > 0) {
            return round($this->reviews->sum('star') / $this->reviews->count(), 2);
        }

        return null;
    }

    public function getDiscountedPrice()
    {
        return round($this->price * (1 - ($this->discount / 100)), 4);
    }
}
