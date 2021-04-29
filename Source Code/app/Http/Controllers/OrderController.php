<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = auth()->user()->orders;
        $orders->load('purchases');

        return view('client.purchases', compact('orders'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $in_progress_orders = Order::where('status', 'in_progress')->paginate(2);
        $completed_orders = Order::where('status', 'completed')->paginate(2);
        $to_do_orders = Order::where('status', 'to_do')->paginate(2);

        return view('admin.orders', compact('in_progress_orders', 'completed_orders', 'to_do_orders'));
    }


    public function orderTypeShow($status)
    {
        $orders=Order::where('status',$status)->get();
        return view('admin.single-type-orders', compact('orders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        if (!Cart::count()) {
            session()->flash('Your cart is empty');
            return redirect()->back();
        }

        $user = auth()->user();
        $order = $user->orders()->create([
            'checkout_data' => request()->all()
        ]);

        foreach (Cart::content() as $product) {
            $order->purchases()->create([
                'product_id' => $product->options['product_id'],
                'quantity' => $product->qty,
            ]);
            $model = $product->model;
            $model->in_stock = $model->in_stock - $product->qty;
            $model->save();
        }

        Cart::destroy();

        session()->flash('order created successfully');
        return redirect()->route('order.index');


    }

    public function show(Order $order)
    {
        $order->load('purchases');
        return view('client.order-details', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function adminShow(Order $order)
    {
        return view('admin.order-details', compact('order'));
    }

    public function start(Order $order)
    {
        $order->status="in_progress";
        $order->save();

        session()->flash('message', 'Order moved to in progress');
        return redirect()->back();
    }

    public function complete(Order $order){
        $order->status="completed";
        $order->save();

        session()->flash('message', 'Order moved to completed');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
