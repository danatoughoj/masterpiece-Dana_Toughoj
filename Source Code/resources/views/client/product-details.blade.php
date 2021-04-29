@extends('layouts.public_layout')
@section("content")
    <style>
        .zoom:hover {
            -ms-transform: scale(1.5); /* IE 9 */
            -webkit-transform: scale(1.5); /* Safari 3-8 */
            transform: scale(1.5);
        }
    </style>
    <!-- Product Details Area Start -->
    <div class="single-product-area clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                            <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{asset($product->image)}});">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{asset($product->image)}});">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url({{asset($product->image)}});">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url({{asset($product->image)}});">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{$product->image}}">
                                        <img class="d-block w-100" src="{{asset($product->image)}}" alt="First slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="{{$product->image}}">
                                        <img class="d-block w-100" src="{{asset($product->image)}}" alt="Second slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="{{$product->image}}">
                                        <img class="d-block w-100" src="{{asset($product->image)}}" alt="Third slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="{{$product->image}}">
                                        <img class="d-block w-100" src="{{asset($product->image)}}" alt="Fourth slide">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">{{$product->price}} JOD</p>
                            <a href="product-details.html"><h6>{{$product->name}}</h6></a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    @for($i=1;$i<=$product->rating;$i++)
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    @endfor
                                </div>
                            </div>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock ({{$product->in_stock}})</p>
                        </div>

                        <div class="short_overview my-5">
                            <p>{{$product->description}}</p>
                            @foreach($product->characteristics as
                            $key=>$characteristic)
                                <div class="d-flex">
                                    <h5>{{$key}} : </h5>
                                    <p> {{$characteristic}}</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post" action="{{route('cart.store')}}">
                            @method('post')
                            @csrf
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>

                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                    <input name="product_id" value="{{$product->id}}" hidden>
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        @if($product->can_add_review)
            <form method="post" action="{{route('review.store' , ['product' => $product->id] )}}">
                @method('post')
                @csrf
                <div class="col-6 mb-3" style="font-size: 24px ;color: orange">
                    <p style="font-weight:400;color: #fbb710;font-size: 24px"> Review </p>
                    <div class="ratings mb-3">
                        @for($i = 1 ;$i <= 5;$i++)
                            <i class="fa fa-star"
                               aria-hidden="true"
                               onclick="editValue({{$i}})"
                               id="star-{{$i}}"
                               style="color: {{$product->userRating()<$i ? 'lightgray' : 'orange'}}"></i>
                        @endfor
                    </div>
                    <input name="rating" value="{{$product->userRating()}}" id="rating" hidden>
                    <textarea name="review" class="form-control w-100" id="body" cols="30" rows="10" placeholder="Leave a review about the product">{{optional($product->userReview())->body}}</textarea>
                    <button type="submit" class="btn amado-btn mt-4">Add Review</button>
                </div>
            </form>
        @endif
    </div>
    <script>
        function editValue(count) {
            document.getElementById("rating").value = count;
            for (i = 1; i <= 5; i++) {
                document.getElementById("star-" + i).setAttribute('style', 'color:lightgray');
            }

            for (i = 1; i <= count; i++) {
                document.getElementById("star-" + i).setAttribute('style', 'color:orange');
            }
        }
    </script>
@endsection
