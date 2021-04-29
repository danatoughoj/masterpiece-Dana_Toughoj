@extends('layouts.admin_layout')
@section('content')
<div class="my-form" style="margin-top: 90px">
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                @if($status =="add")
                    <h4 class="title">Add Product</h4>
                @else
                    <h4 class="title">Edit Product</h4>
                @endif
            </div>
            <div class="content">
                {{-- Add product from --}}
                @if($status == "add")
                    <form action="/admin-side/products" method="post"  enctype="multipart/form-data">
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                {{-- Edit product form --}}
                @else
                    <form action="/admin-side/products/{{$product->id}}" method="post"  enctype="multipart/form-data">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                @endif
                    <div class="row">
                        {{-- Name Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control border-input" placeholder="Enter product Name" value="{{ $product->name ?? old('name')}}" required>
                            </div>
                        </div>
                        {{-- Category Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control border-input" value="{{$product->category->id ??old('category_id')}}" required>
                                    @foreach($categories as $category)
                                        @if(isset($product) && $product->category->id  == $category->id)
                                            <option value="{{$category->id}}" selected> {{$category->name}} </option>
                                        @else
                                            <option value="{{$category->id}}"> {{$category->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Name Field Error --}}
                    @error('name')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Category Field Error --}}
                    @error('category_id')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Description Field --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control border-input" placeholder="Enter product Description" required>{{ $product->description ?? old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- Description Field Error --}}
                    @error('description')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Characteristics Fields --}}
                    <label>Characteristics</label>
                    <input type="text" name="characteristics" class="hidden">
    
                    <div class="row">
                        <div class="col-md-4">
                            <label>Color</label>
                            <div class="form-group">
                                <input type="text" name="color" class="form-control border-input" placeholder="Enter product color" value="{{ $product->characteristics['color'] ?? old('color')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Dimensions</label>
                            <div class="form-group">
                                <input type="text" name="dimensions" class="form-control border-input" placeholder="Enter product dimensions" value="{{ $product->characteristics['dimensions'] ?? old('dimensions')}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Material</label>
                            <div class="form-group">
                                <input type="text" name="material" class="form-control border-input" placeholder="Enter product material" value="{{ $product->characteristics['material'] ?? old('material')}}">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        {{-- Price Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control border-input" placeholder="Enter product price" value="{{ $product->price ?? old('price')}}" required>
                            </div>
                        </div>
                        {{-- In Stock Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>In Stock</label>
                                <input type="number" name="in_stock" class="form-control border-input" placeholder="Enter numebr of products in stock" value="{{ $product->in_stock ?? old('in_stock')}}" required>
                            </div>
                        </div>
                    </div>
                    {{-- In Stock Field Error --}}
                    @error('in_stock')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Price Field Error --}}
                    @error('price')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Cover Image Field --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Cover Image</label>
                                <input type="file" name="cover_image" class="form-control border-input">
                            </div>
                        </div>
                    </div> 
                    {{-- Cover Image Field Error --}}
                    @error('cover_image')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Product Images Field --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Images</label>
                                <input type="file" name="product_images[]" class="form-control border-input" multiple="true">
                            </div>
                        </div>
                    </div> 
                    {{-- Product Images Field Error --}}
                    @error('product_images')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror                       
                    <div class="text-center">
                        @if($status =="add")
                            <button type="submit" class="btn btn-danger btn-fill btn-wd">Add</button>
                        @else
                            <button type="submit" class="btn btn-danger btn-fill btn-wd">Update</button>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection