@extends('layouts')
 

@section('content')

@include('pages.sidebar')

 <h2 class="title text-center">Features Items</h2>
                    @foreach ($products_by_manufacturers as $product_by_manufacturer)
                        
                    
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset($product_by_manufacturer->product_image)}}" alt="" />
                                            <h2>${{$product_by_manufacturer->product_price}}</h2>
                                            <p>{{$product_by_manufacturer->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>${{$product_by_manufacturer->product_price}}</h2>
                                                <p>{{$product_by_manufacturer->product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>{{$product_by_manufacturer->category->category_name}} Category</a></li>
                                        <li><a href="{{ route('product_details',$product_by_manufacturer->id) }}"><i class="fa fa-plus-square"></i>Show Details</a></li>
                                        <br>
                                        <li><a href="{{ route('addToWishlist',$product_by_manufacturer->id) }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="{{ route('addToCompare',$product_by_manufacturer->id) }}"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                    </div><!--features_items-->
                    

                    
                </div>
            </div>

@endsection