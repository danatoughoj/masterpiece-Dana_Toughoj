@extends('layouts.admin_layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="header1">
                <div class="header">
                    <h4 class="title" style="margin:0px">Products</h4>
                </div>
                <div>
                    <a href="{{route('admin.products.create')}}"><button class="btn btn-danger"> <i class="ti-plus"></i> Add Product</button></a>
                </div>
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
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
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
                                    <td><a class="btn btn-success" href="{{route('admin.products.edit', ['product' => $product->id ])}}">Edit</a></td>
                                    <form action="{{route('admin.products.destroy',['product'=> $product->id])}}" method="post">
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
                        {{ $products->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection