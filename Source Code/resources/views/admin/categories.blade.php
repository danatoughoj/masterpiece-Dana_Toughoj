@extends('layouts.admin_layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header1">
                    <div class="header">
                        <h4 class="title" style="margin:0px">Categories</h4>
                    </div>
                    <div>
                        <a href="{{route('admin.categories.create')}}"><button class="btn btn-danger"> <i class="ti-plus"></i> Add Category</button></a>
                    </div>
                </div>
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td><a class="btn btn-success" href="{{route('admin.categories.edit', ['category' => $category->id ])}}">Edit</a></td>
                                    <form action="{{route('admin.categories.destroy',['category'=> $category->id])}}" method="post">
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
            <!-- Pagination -->
            <nav aria-label="navigation">
                <ul class="pagination justify-content-end">
                    {{ $categories->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection