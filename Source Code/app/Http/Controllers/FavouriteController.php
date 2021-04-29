<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @return void
     */
    public function store(Product $product)
    {
        $product->reviews()->firstOrCreate([
            'user_id' => auth()->id(),
        ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        $product->reviews()->where('user_id', auth()->id())->delete();
    }
}
