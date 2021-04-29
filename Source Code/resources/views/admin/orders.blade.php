@extends('layouts.admin_layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header1" style="margin-bottom:0px">
                    <div class="header">
                        <h4 class="title" style="margin:0px">Orders</h4>
                    </div>
                    <div>
                        <a href="{{route('admin.orders.create')}}"><button class="btn btn-danger"> <i class="ti-plus"></i> Add Order</button></a>
                    </div>
                </div>
                <div class="orders-section">
                    <div class="column">
                        <div class="column-header"> 
                            <h3> To Do</h3>
                        </div>
                        <div class="column-body"> 
                            @foreach ($to_do_orders as $order)
                                <div  class="orders-card">
                                    <p style="text-align:right; font-size:1.1rem">{{$order->created_at->format('d.M.y')}}</p>
                                    <p> <b> Order ID : </b> {{$order->id}} </p>
                                    <p> <b> Order Type : </b> {{$order->type}} </p>
                                    <p> <b> Order Source : </b> {{$order->source}} </p>
                                    <div class="buttons-section"> 
                                        <a href="{{route('admin.orders.show',['order'=>$order->id])}}" class="btn btn-danger"> View</a>
                                        <form action="{{route('admin.orders.start',['order'=>$order->id])}}" method="post">
                                            {{ method_field('put') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-success" type="submit"> Start</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach                    
                            <div class="column-footer"> 
                                @if(count($to_do_orders)!=0)
                                    <a href="{{route('admin.orders.type.show' , ['status'=> $order->status])}}"class="btn btn-danger btn-fill"> View All</a>
                                @else
                                    <div>
                                        You have no to do orders
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div  class="column">
                        <div class="column-header"> 
                            <h3>In  Progress</h3>
                        </div>
                        <div class="column-body"> 
                            @foreach ($in_progress_orders as $order)
                                <div  class="orders-card">
                                    <p style="text-align:right; font-size:1.2rem">{{$order->created_at->format('d.M.y')}}</p>
                                    <p> <b> Order ID : </b> {{$order->id}} </p>
                                    <p> <b> Order Type : </b> {{$order->type}} </p>
                                    <p> <b> Order Source : </b> {{$order->source}} </p>
                                    <div class="buttons-section"> 
                                        <a href="{{route('admin.orders.show',['order'=>$order->id])}}" class="btn btn-danger"> View</a>
                                        <form action="{{route('admin.orders.complete',['order'=>$order->id])}}" method="post">
                                            {{ method_field('put') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-success" type="submit"> Complete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach                    
                            <div class="column-footer"> 
                                @if(count($in_progress_orders)!=0)
                                    <a href="{{route('admin.orders.type.show' , ['status'=> $order->status])}}"class="btn btn-danger btn-fill"> View All</a>
                                @else
                                    <div>
                                        You have no in progress orders
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div  class="column">
                        <div class="column-header"> 
                            <h3>Complete</h3>
                        </div>
                        <div class="column-body"> 
                            @foreach ($completed_orders as $order)
                                <div  class="orders-card">
                                    <p style="text-align:right; font-size:1.2rem">{{$order->created_at->format('d.M.y')}}</p>
                                    <p> <b> Order ID : </b> {{$order->id}} </p>
                                    <p> <b> Order Type : </b> {{$order->type}} </p>
                                    <p> <b> Order Source : </b> {{$order->source}} </p>
                                    <div class="buttons-section"> 
                                        <a href="{{route('admin.orders.show',['order'=>$order->id])}}" class="btn btn-danger"> View</a>
                                    </div>
                                </div>
                            @endforeach                    
                            <div class="column-footer"> 
                                @if(count($completed_orders)!=0)
                                    <a href="{{route('admin.orders.type.show' , ['status'=> $order->status])}}"class="btn btn-danger btn-fill"> View All</a>
                                @else
                                    <div>
                                        You have no completed orders
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection