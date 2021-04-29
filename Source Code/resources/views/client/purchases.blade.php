@extends("layouts.public_layout")
@section("content")
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-12 col-lg-12">
                    <div class="cart-title mt-50">
                        <h2>My Orders</h2>
                    </div>
                    <div class="cart-table">
                        <table class="w-100" style="line-height: 3">
                            <thead>
                            <tr>
                                <th>order no.</th>
                                <th>date</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <a href="{{route('order.show' ,['order' => $order->id])}}">
                                            <span style="color: orange ; font-size: 15px"> TM#00{{$order->id}} </span>
                                        </a>
                                    </td>
                                    <td> {{$order->created_at->diffForHumans()}}</td>
                                    <td> {{$order->total}}</td>
                                    <td> TODO</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
@endsection
