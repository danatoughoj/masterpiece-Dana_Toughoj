<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'characteristics', 'price', 'in_stock', 'rating', 'rating_count', 'cover_image', 'deleted_at'];

    protected $casts = [
        'characteristics' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, "order_products")->withPivot('quantity');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }


    public function getCanAddReviewAttribute()
    {
        return $this->orders()->where('orders.user_id', auth()->id())->exists();
    }

    public function userReview($user = null)
    {
        return $this->reviews()->where('user_id', auth()->id())->where('product_id', $this->id)->first();
    }

    public function userRating($user = null)
    {
        $review = $this->reviews()->where('user_id', auth()->id())->where('product_id', $this->id)->first();
        return $review ? (integer)$review->rating : 0;
    }
}
