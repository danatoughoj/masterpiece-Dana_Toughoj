@extends('layouts.public_layout')
@section('content')
    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            <!-- Single Catagory -->
            @foreach($categories as $category)
                <div class="single-products-catagory clearfix  button2">
                    <a href="{{route('product.index',['category' => $category->id , 'title' => $category->name ])}}">
                        <img src="{{$category->image}}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <h4>{{$category->name}}</h4>
                        </div>
                    </a>
                    <div class="button2__horizontal"></div>
                    <div class="button2__vertical"></div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Product Catagories Area End -->
@endsection
