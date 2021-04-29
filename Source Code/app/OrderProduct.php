<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['product_id', 'quantity'];

    protected $with = ['product'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getTotalAttribute()
    {
        return $this->product->price * $this->quantity;
    }

}
