@extends('layouts.admin_layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header1">
                    <div class="header">
                        <h4 class="title" style="margin:0px">{{$status}} Orders</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>User</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Source</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->user_id}}</td>
                                    <td>{{$order->type}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->Source}}</td>
                                    <td>{{$order->created_at->format('d.M.y | h:i a')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection