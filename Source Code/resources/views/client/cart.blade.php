@extends("layouts.public_layout")
@section("content")
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Shopping Cart</h2>
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
                            @foreach($cart_items as $item)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{$item->options['image']}}" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{$item->name}}</h5>
                                    </td>
                                    <td class="price">
                                        <span>{{$item->price}}</span>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <p>Qty</p>
                                            <div class="quantity">
                                                <form method="post" action="{{route('cart.destroy' ,['item_id' => $item->rowId])}}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn-link qty-minus mr-3" type="submit" style="border-style: none;">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{$item->qty}}">
                                                <form method="post" action="{{route('cart.store')}}">
                                                    @csrf
                                                    <input name="product_id" value="{{$item->options['product_id']}}" hidden>
                                                    <button class="btn-link qty-plus" type="submit" style="border-style: none;">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span>{{$total}}</span></li>
                            <li><span>delivery:</span> <span>Pick up</span></li>
                            <li><span>total:</span> <span>{{$total}}</span></li>
                        </ul>
                        @if($cart_items->count())
                            <div class="cart-btn mt-100">
                                <a class="btn amado-btn w-100" href="/checkout">
                                    Checkout
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection
