@extends("layouts.public_layout")
@section("content")
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2> Order Details </h2>
                    </div>
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->purchases as $item)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{$item->product->cover_image}}" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{$item->product->name}}</h5>
                                    </td>
                                    <td class="price">
                                        <span>{{$item->product->price}}</span>
                                    </td>
                                    <td class="qty">
                                        {{$order->items_count}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Total</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span>{{ $order->total }}</span></li>
                            <li><span>delivery:</span> <span>Pick up</span></li>
                            <li><span>total:</span> <span>{{ $order->total }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection
