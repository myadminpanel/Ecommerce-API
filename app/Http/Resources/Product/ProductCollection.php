<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
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
'totalPrice' => (($this->price)- (($this->price)*($this->discount)/100)) , 
'discount' => $this->discount , 
'price' => $this->price, 

'rating' => $this->reviews->count() > 0 ? round ($this->reviews->sum('star')/$this->reviews->count() , 2) : 'No rating Yet' , 
'href' => [
    'link' => route('products.show' , $this->id)
]
        ];
    }
}
