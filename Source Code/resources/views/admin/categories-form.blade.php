@extends('layouts.admin_layout')
@section('content')
<div class="my-form">
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                @if($status =="add")
                    <h4 class="title">Add Category</h4>
                @else
                    <h4 class="title">Edit Category</h4>
                @endif
            </div>
            <div class="content">
                @if($status == "add")
                    <form action="/admin-side/categories" method="post"  enctype="multipart/form-data">
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                @else
                    <form action="/admin-side/categories/{{$category->id}}" method="post"  enctype="multipart/form-data">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control border-input" placeholder="Enter Category Name" value="{{ $category->name ?? old('name')}}">
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control border-input" placeholder="Enter Category Description">{{ $category->description ?? old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    @error('description')
                    <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control border-input">
                            </div>
                        </div>
                    </div>
                    @error('image')
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