<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable =['path' , 'type' , 'product_id'];


    public function product(){
        return $this->belongsTo(Product::class);
    }
}
