@extends('layouts.app')
@section('content')
<div class="space-gap50"></div>
<div class="top-shop-page">
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#"><i class="fas fa-home"></i>&nbsp;</a></li>
                    <li><a href="#">&nbsp;/ &nbsp; Shop Page</a></li>
                    <li><a href="#">&nbsp;/ &nbsp; Rroduct Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="space-gap50"></div>
<div class="shop-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-5">
                <div class="product-details-tab">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="product-large-thumb">
                                @if(!empty(json_decode($prd->images)[0]))<img src="{{asset('images/products/'.json_decode($prd->images)[0])}}" alt="">@endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="product-large-thumb">
                                @if(!empty(json_decode($prd->images)[1]))<img src="{{asset('images/products/'.json_decode($prd->images)[1])}}" alt="">@endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="product-large-thumb">
                                @if(!empty(json_decode($prd->images)[2]))<img src="{{asset('images/products/'.json_decode($prd->images)[2])}}" alt="">@endif
                            </div>
                        </div>
                    </div>

                    <ul class="nav my-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">
                                @if(!empty(json_decode($prd->images)[0]))<img src="{{asset('images/products/'.json_decode($prd->images)[0])}}" alt="">@endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">
                                @if(!empty(json_decode($prd->images)[1]))<img src="{{asset('images/products/'.json_decode($prd->images)[1])}}" alt="">@endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">
                                @if(!empty(json_decode($prd->images)[2]))<img src="{{asset('images/products/'.json_decode($prd->images)[2])}}" alt="">@endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="shop-product-details">
                    <div class="row d-flex">
                        <div class="shop-product-delivery d-flex align-items-center">
                            <div class="shop-product-delivery-icon">
                                <span class="material-icons">
                                    local_shipping
                                </span>
                            </div>
                            <div class="shop-product-details">
                                <p class="font-weight-bold">Standard shipment</p>
                                <p class="text-muted">Free within 3-6 business days</p>
                            </div>
                        </div>
                        <div class="shop-product-delivery  d-flex align-items-center">
                            <div class="shop-product-delivery-icon">
                                <span class="material-icons">
                                    local_car_wash
                                </span>
                            </div>
                            <div class="shop-product-details">
                                <p class="font-weight-bold">Standard shipment</p>
                                <p class="text-muted">Free within 3-6 business days</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-gap15"></div>
                    <div class="row">
                        <div class="sale-in-stock">
                            <div class="sale-btn">Sale</div>
                        </div>
                    </div>
                    <div class="space-gap15"></div>
                    <div class="shop-product-name">
                    <p>{{$prd->product_name}}</p>
                    </div>
                    <div class="space-gap15"></div>
                    <div class="shop-product-price">
                        <span class="text-danger">{{currency()}}{{$prd->prdPrice->special_price}}</span>
                        &nbsp;
                        <del>
                            <span>{{currency()}}{{$prd->prdPrice->regular_price}}</span>
                        </del>
                    </div>
                    <div class="space-gap50"></div>
                    <div class="shop-product-size">
                        <h6>SELECT SIZE</h6>
                        <div class="space-gap15"></div>
                        <div class="sizes">
                            <div class="sizes-btn">5</div>
                            <div class="sizes-btn">10</div>
                            <div class="sizes-btn">12</div>
                            <div class="sizes-btn">14</div>
                            <div class="sizes-btn">17</div>
                            <div class="sizes-btn">19</div>
                            <div class="sizes-btn">22</div>
                            <div class="sizes-btn">24</div>
                            <div class="sizes-btn">25</div>
                            <div class="sizes-btn">27</div>
                        </div>
                    </div>
                    <div class="space-gap25"></div>
                    <div class="size-guied d-flex justify-content-between">
                        <a class="text-muted" href="#">
                            <p>SIZE GUIDE</p>
                        </a>
                        <a class="text-muted" href="#">
                            <p>SIZE OUT OF STOCK?</p>
                        </a>
                    </div>
                    <div class="space-gap25"></div>
                    <div class="qty-cart-btn-area">
                        <div class="qty">
                            <span class="decrease-btn">-</span>
                            <span class="qty-value font-weight-bold">1</span>
                            <span class="increase-btn">+</span>
                        </div>
                        <div class="add-product-btn">Add to Cart</div>
                    </div>

                </div>
            </div>
        </div>
        <div class="space-gap"></div>
        <div class="row">
            <div class="product-dsc-tab ">
                <ul class="nav d-flex justify-content-center align-items-center" id="myTab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <a class="nav-link active dsc-tab-item text-uppercase" id="description-tab"
                            data-toggle="tab" href="#description" role="tab" aria-controls="description"
                            aria-selected="true">description</a>
                    </li>
                    <li><a href="#">/</a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link dsc-tab-item text-uppercase" id="reviews-tab" data-toggle="tab"
                            href="#reviews" role="tab" aria-controls="reviews"
                            aria-selected="false">&nbsp;Reviews(3)</a>
                    </li>
                </ul>
            </div>
            <div class="product-details">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <p>{!!$prd->description!!}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="review-point d-flex align-items-center justify-content-center">
                                    <div class="review-rank">
                                        <p class="text-center">4.5</p>
                                        <div class="review-icon d-flex justify-content-center">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star-half"></i></span>
                                        </div>
                                        <div class="space-gap15"></div>
                                        <div class="opinion-btn">
                                            ADD OPINION
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6  d-flex flex-wrap align-items-center">
                                <div class="review-person d-flex">
                                    <div class="review-img">
                                        <img src="images/person/1.jpeg" alt="">
                                    </div>
                                    <div class="review-person-comment">
                                        <p>jhon Doe</p>
                                        <div class="review-person-icon d-flex">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star-half"></i></span>
                                        </div>
                                        <div class="review-comment container">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text
                                                ever since the 1500s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-person d-flex">
                                    <div class="review-img">
                                        <img src="images/person/4.jpg" alt="">
                                    </div>
                                    <div class="review-person-comment">
                                        <p>Eveline Gosok</p>
                                        <div class="review-person-icon d-flex">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star-half"></i></span>
                                        </div>
                                        <div class="review-comment">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text
                                                ever since the 1500s</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-person d-flex">
                                    <div class="review-img">
                                        <img src="images/person/2.jpg" alt="">
                                    </div>
                                    <div class="review-person-comment">
                                        <p>Anne Okombo</p>
                                        <div class="review-person-icon d-flex">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </div>
                                        <div class="review-comment">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry's standard dummy text
                                                ever since the 1500s</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space-gap"></div>
@endsection
