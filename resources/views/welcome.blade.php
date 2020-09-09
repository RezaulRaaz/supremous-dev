@extends('layouts.app')
@section('content')
@include('layouts.frontend.parts.slider')
   <!-- product section start -->
   <div class="product">
    <div class="container">
        <div class="product-top d-flex align-items-center justify-content-between">
            <div class="product-top-left">
                <p>Selected just for you</p>
            </div>
            <div class="product-top-right">
                <div class="product-top-right-btn">
                    Show More
                </div>
            </div>
        </div>
        <div class="space-gap"></div>
        <div class="product-card-area">
            <div class="owl-carousel selected-product">
             @foreach($products as $product)
                @if($product->prdPosition->position=='Fetured')
                <div class="product-card">
                <a href="{{url('products/'.$product->product_name.'/'.$product->id)}}">
                    <div class="product-img">
                    <img src="{{asset('images/products/'.json_decode($product->images)[0])}}" alt="">
                    </div>
                    <div class="product-details">
                        <div class="product-name">
                        <p>{{$product->product_name}}</p>
                        </div>
                        <div class="product-price">
                            <span class="product-selling-price text-danger">{{currency()}}{{$product->prdPrice->special_price}}</span>
                            <del><span class="product-regular-price">{{currency()}}{{$product->prdPrice->regular_price}}</span></del>
                        </div>
                    </div>
                </a>
                </div>
                @endif
              @endforeach
            </div>
        </div>
    </div>
</div>
<div class="space-gap"></div>
  <!-- why Chose us start here -->
  <div class="why-chose-us">
    <div class="container">
        <div class="top-section text-center">
            <p>Why should you choose us?</p>
        </div>
        <div class="space-gap"></div>
        <div class="why-choose-us-area">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="why-choose-us-content">
                        <div class="why-choose-us-icon">
                            <span class="material-icons">
                                local_shipping
                            </span>
                        </div>
                        <div class="why-choose-us-details">
                            <h5>Free Shipping</h5>
                            <p>All purchases over $199 are eligible for free shipping via USPS first Class Mail.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="why-choose-us-content">
                        <div class="why-choose-us-icon">
                            <span class="material-icons">
                                attach_money
                            </span>
                        </div>
                        <div class="why-choose-us-details">
                            <h5>Easy Payments</h5>
                            <p>All purchases over $199 are eligible for free shipping via USPS first Class Mail.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="why-choose-us-content">
                        <div class="why-choose-us-icon">
                            <span class="material-icons">
                                security
                            </span>
                        </div>
                        <div class="why-choose-us-details">
                            <h5>Mony-Back-Guarante</h5>
                            <p>All purchases over $199 are eligible for free shipping via USPS first Class Mail.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="why-choose-us-content">
                        <div class="why-choose-us-icon">
                            <span class="material-icons">
                                toys
                            </span>
                        </div>
                        <div class="why-choose-us-details">
                            <h5>Finest Quality</h5>
                            <p>All purchases over $199 are eligible for free shipping via USPS first Class Mail.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space-gap"></div>
<div class="product">
    <div class="container">
        <div class="product-top text-center">
            <div class="product-top-left">
                <p>Products in today</p>
            </div>
        </div>
        <div class="space-gap"></div>
        <div class="product-card-area">
            <div class="owl-carousel product-in-today">
                @foreach($products as $product)
                @if($product->prdPosition->position=='Newest')
                    <div class="product-card">
                        <a href="{{url('products/'.$product->product_name.'/'.$product->id)}}">
                        <div class="product-img">
                            <img src="{{asset('images/products/'.json_decode($product->images)[0])}}" alt="">
                        </div>
                        <div class="product-details">
                            <div class="product-name">
                                <p>{{$product->product_name}}</p>
                            </div>
                            <div class="product-price">
                                <span class="product-selling-price text-danger">{{currency()}}{{$product->prdPrice->special_price}}</span>
                               <del> <span class="product-regular-price">{{currency()}}{{$product->prdPrice->regular_price}}</span></del>
                            </div>
                        </div>
                        </a>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="space-gap"></div>
@endsection
