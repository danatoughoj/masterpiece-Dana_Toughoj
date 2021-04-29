@extends('layouts.public_layout')
@section("content")
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">

            <form action="{{route('order.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" id="name" value="{{auth()->user()->name ?? ''}}" placeholder="Name" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="company" placeholder="Company Name" value="" >
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email" value="{{auth()->user()->email ?? ''}}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <select class="w-100" id="country" required>
                                        <option value="usa">Jordan</option>
                                        <option value="usa">Palestine</option>
                                        <option value="uk">Egypt</option>
                                        <option value="ger">UAE</option>
                                        <option value="fra">Saudi Arabia</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control mb-3" id="street_address" placeholder="Address" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="city" placeholder="Town" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="{{auth()->user()->phone_number}}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span>
                                    <span>{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                </li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span>
                                    <span>{{Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</span>
                                </li>
                            </ul>

                        {{--                        <div class="payment-method">--}}
                        <!-- Cash on delivery -->
                            {{--                            <div class="custom-control custom-checkbox mr-sm-2">--}}
                            {{--                                <input type="checkbox" class="custom-control-input" id="cod" checked>--}}
                            {{--                                <label class="custom-control-label" for="cod">Cash on Delivery</label>--}}
                            {{--                            </div>--}}
                            {{--                            <!-- Paypal -->--}}
                            {{--                            <div class="custom-control custom-checkbox mr-sm-2">--}}
                            {{--                                <input type="checkbox" class="custom-control-input" id="paypal">--}}
                            {{--                                <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}


                            @csrf
                            <div class="cart-btn mt-100">
                                <button class="btn amado-btn w-100" type="submit">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection
