@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="header1">
                <div class="header">
                    <h4>Order Details</h4>
                </div>
                <div>
                    @if($order->status == "to_do")
                        <h4>Order status : <span class="text-success"> {{$order->status}} </span></h4>
                    @elseif($order->status == "in_progress")
                        <h4>Order status : <span class="text-warning"> {{$order->status}} </span></h4>
                    @else
                        <h4>Order status : <span class="text-danger"> {{$order->status}} </span></h4>
                    @endif
                </div>
            </div>
            <div class="header1">
                <p><b>Order ID:</b> {{$order->id}} </p>
                <p><b>Order Type :</b> {{$order->type}}</p>
                <p><b>Order Source :</b> {{$order->source}}</p>
                <p><b>Number of Products :</b> {{count($order->products)}}</p>
            </div>
            <div class="card">
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Characteristics</th>
                            <th>Price</th>
                            <th>In stock</th>
                            <th>Cover Image</th>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        @foreach($product->characteristics as $key=>$characteristic)
                                        <p><b>{{$key}} : </b>{{$characteristic}} </p>
                                        @endforeach
                                    </td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->in_stock}}</td>
                                    <td>{{$product->cover_image}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($order->status == "to_do")
                    <form action="{{route('admin.orders.start',['order'=> $order->id])}}" method="post">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                        <button style="background-color: #42A084;color:white" class="btn btn-success" type="submit">Start Order</button>
                    </form>
                @elseif($order->status == "in_progress")
                    <form action="{{route('admin.orders.complete',['order'=> $order->id])}}" method="post">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                        <button style="background-color: #fbb710;color:white" class="btn btn-danger" type="submit">Mark order as completed</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection