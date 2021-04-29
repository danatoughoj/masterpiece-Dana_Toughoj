@extends('layouts.admin_layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header1">
                    <div class="header">
                        <h4 class="title" style="margin:0px">Users</h4>
                    </div>
                    <div>
                        <a href="{{route('admin.users.create')}}"><button class="btn btn-danger"> <i class="ti-plus"></i> Add User</button></a>
                    </div>
                </div>
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->image}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->location}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>{{$user->gender}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td><a class="btn btn-success" href="{{route('admin.users.edit', ['user' => $user->id ])}}">Edit</a></td>
                                    <form action="{{route('admin.users.destroy',['user'=> $user->id])}}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <td><button class="btn btn-warning" type="submit">Delete</button></td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-pagination">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end">
                        {{ $users->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection