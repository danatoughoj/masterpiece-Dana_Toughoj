<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'checkout_data'
    ];

    protected $casts = [
        'checkout_data' => 'array'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, "order_products");
    }

    public function purchases()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalAttribute()
    {
        return $this->purchases->sum('total');

    }

    public function getItemsCountAttribute()
    {
        return $this->purchases()->sum('quantity');
    }
}
