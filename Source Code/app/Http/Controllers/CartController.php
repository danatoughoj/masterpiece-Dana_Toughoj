<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Response;


class CartController extends Controller
{
    public function show()
    {
        return view('client.cart', [
            'cart_items' => Cart::content(),
            'total' => Cart::subtotal(),
        ]);
    }


    public function store()
    {
        $product = Product::findOrFail(request('product_id'));
        $item = Cart::add($product->id, $product->name, request('quantity') ?? 1, $product->price, [
            'image' => $product->cover_image,
            'product_id' => $product->id,
        ]);

        $item->associate(Product::class);

        session()->flash('Added to cart');
        return redirect()->back();
    }


    public function destroy($item_id)
    {
        $items_count = Cart::get($item_id) ? (Cart::get($item_id))->qty : 0;
        if ($items_count && $items_count > 1) {
            Cart::update($item_id, $items_count - 1);
        } else {
            Cart::remove($item_id);
        }

        session()->flash('Removed from cart');
        return redirect()->back();
    }

    public function update($item_id)
    {
        Cart::update($item_id, 2);
        session()->flash('Added to cart');
        return redirect()->back();
    }
}
