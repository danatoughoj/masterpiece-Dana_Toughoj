@extends('layouts.public_layout')
@section('content')
    <div class="shop_sidebar_area">
        <!-- ##### Single Widget ##### -->
        <div class="widget catagory mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Catagories</h6>
            <!--  Catagories  -->
            @foreach($categories as $category)
                <div class="catagories-menu">
                    <ul>
                        <li class="{{request('category') == $category->id ? 'active' : ''}}">
                            <a href="{{request()->fullUrlWithQuery(['category' => $category->id])}}">
                                {{$category->name}}
                            </a>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget color mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Color</h6>

            <div class="widget-desc">
                <ul class="d-flex">
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'yellow'])}}" style="background-color:yellow"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'blue'])}}" style="background-color:blue"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'yellow'])}}" style="background-color:green"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'green'])}}" style="background-color:orange"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'white'])}}" style="background-color:white"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'black'])}}" style="background-color:black"></a>
                    </li>
                    <li><a href="{{request()->fullUrlWithQuery(['color' => 'red'])}}" style="background-color:red"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'deeppink'])}}" style="background-color:deeppink"></a>
                    </li>
                    <li>
                        <a href="{{request()->fullUrlWithQuery(['color' => 'gray'])}}" style="background-color:gray"></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- ##### Single Widget ##### -->
        <div class="widget price mb-50">
            <!-- Widget Title -->
            <h6 class="widget-title mb-30">Price</h6>

            <div class="widget-desc">
                <div class="slider-range">
                    <div data-min="0" id="price-controller" data-max="100" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="{{request('min_price') ?? 0}}" data-value-max="{{request('max_price') ?? 100}}" data-label-result="">
                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    </div>
                    <div class="range-price" id="range-price">
                        ${{request('min_price') ?? 0}} -
                        ${{request('max_price') ?? 100}} </div>
                </div>
                <button id="apply-price" class="btn amado-btn" style="margin-top: 20px"> Apply Price</button>
            </div>
        </div>
    </div>


    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                        <!-- Total Products -->
                        <div class="total-products">
                            <p>Showing 1-8 0f 25</p>
                            <div class="view d-flex">
                                <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <div class="sort-by-date d-flex align-items-center mr-15">
                                <p>Sort by</p>
                                <form action="#" method="get">
                                    <select name="select" id="sortBydate" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                                        <option {{request('order_by') == "newest" ? 'selected': ''}} value="{{request()->fullUrlWithQuery(['order_by' => 'newest'])}}">
                                            Newest
                                        </option>
                                        <option {{request('order_by') == "popularity" ? 'selected': ''}} value="{{request()->fullUrlWithQuery(['order_by' => 'popularity'])}}">
                                            Popularity
                                        </option>
                                    </select>
                                </form>
                            </div>
                            <div class="view-product d-flex align-items-center">
                                <p>View</p>
                                <form action="#" method="get">
                                    <select name="select" id="viewProduct" onChange="window.document.location.href=this.options[this.selectedIndex].value;">
                                        <option {{request('items_count') == 12 ? 'selected': ''}} value="{{request()->fullUrlWithQuery(['items_count' => '12'])}}">
                                            12
                                        </option>
                                        <option {{request('items_count') == 24 ? 'selected': ''}} value="{{request()->fullUrlWithQuery(['items_count' => '24'])}}">
                                            24
                                        </option>
                                        <option {{request('items_count') == 48 ? 'selected': ''}} value="{{request()->fullUrlWithQuery(['items_count' => '48'])}}">
                                            48
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1> {{$title ?? 'Shop'}} </h1>
            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination justify-content-end mb-50">
                            {{ $products->links() }}
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="row">
            @foreach($products as $product)
                <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="{{route("product.show",['product'=> $product->id])}}">

                                    <img src="{{$product->cover_image}}" alt="">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" src="{{$product->cover_image}}" alt="">
                                </a>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <a href="{{route("product.show",['product'=> $product->id])}}">
                                        <h6 class="mb-2">{{$product->name}}</h6>
                                    </a>
                                    <p class="product-price">{{$product->price}} JOD</p>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        @for($i=1;$i<=$product->rating;$i++)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <div class="cart">
                                        <form method="post" action="{{route('cart.store')}}">
                                            @csrf
                                            <input type="number" name="quantity" value="1" hidden>
                                            <input name="product_id" value="{{$product->id}}" hidden>
                                            <button type="submit" class="btn-link" data-toggle="tooltip" data-placement="left" title="Add to Cart" style="border-style: none;">
                                                <img src="{{asset('client/img/core-img/cart.png')}}" alt="">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
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
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    <script>
        let priceButton = document.getElementById('apply-price');

        priceButton.onclick = applyPrice;

        function applyPrice() {
            let range = document.getElementById('range-price').innerHTML;
            let filteredRange = String(range.match(/\d+(?:\.\d+)?/g));
            filteredRange = filteredRange.split(',');

            let path = "{!! request()->fullUrlWithQuery([
                    'max_price' => "max_price_value",
                    'min_price' => "min_price_value",
                    ]) !!}"

            path = path.replace("min_price_value", filteredRange[0]);
            path = path.replace("max_price_value", filteredRange[1]);

            window.location.replace(path)
        }

    </script>
@endsection
