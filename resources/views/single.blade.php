@extends('layouts.app')
@section('content')
<div class="space-gap25"></div>
<div class="product-details">
    <div class="container">
        <div class="row">
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
          <div class="space-gap15"></div>
          <div class="shop-page">
              <div class="container">
                  <div class="space-gap15"></div></div>
                  <div class="row">
                      <div class="col-xl-6">
                          <div class="product-details-tab">
                              <div class="row">
                                  <div class="col-xl-8 col-lg-8">
                                      <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
                                              <div class="product-large-thumb">
                                                @if(!empty(json_decode($prd->images)[0]))<img src="{{asset('images/products/'.json_decode($prd->images)[0])}}" alt="">@endif
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                                              <div class="product-large-thumb">
                                                @if(!empty(json_decode($prd->images)[1]))<img src="{{asset('images/products/'.json_decode($prd->images)[1])}}" alt="">@endif
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                                              <div class="product-large-thumb">
                                                @if(!empty(json_decode($prd->images)[2]))<img src="{{asset('images/products/'.json_decode($prd->images)[2])}}" alt="">@endif
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
                                              <div class="product-large-thumb">
                                                @if(!empty(json_decode($prd->images)[3]))<img src="{{asset('images/products/'.json_decode($prd->images)[3])}}" alt="">@endif
                                              </div>
                                          </div>
                                          <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab">
                                              <div class="product-large-thumb">
                                                @if(!empty(json_decode($prd->images)[4]))<img src="{{asset('images/products/'.json_decode($prd->images)[4])}}" alt="">@endif
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-4  col-lg-4">
                                      <ul class="nav my-tabs" id="myTab" role="tablist">
                                          <li class="nav-item">
                                              <a class="nav-link active" id="first-tab"  data-toggle="tab" href="#first" role="tab"
                                                  aria-controls="home" aria-selected="true">
                                                  @if(!empty(json_decode($prd->images)[0]))<img src="{{asset('images/products/'.json_decode($prd->images)[0])}}" alt="">@endif
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" id="second-tab" data-toggle="tab" href="#second" role="tab"
                                                  aria-controls="profile" aria-selected="false">
                                                  @if(!empty(json_decode($prd->images)[1]))<img src="{{asset('images/products/'.json_decode($prd->images)[1])}}" alt="">@endif
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab"
                                                  aria-controls="contact" aria-selected="false">
                                                  @if(!empty(json_decode($prd->images)[2]))<img src="{{asset('images/products/'.json_decode($prd->images)[2])}}" alt="">@endif
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab"
                                                  aria-controls="contact" aria-selected="false">
                                                  @if(!empty(json_decode($prd->images)[3]))<img src="{{asset('images/products/'.json_decode($prd->images)[3])}}" alt="">@endif
                                              </a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab"
                                                  aria-controls="contact" aria-selected="false">
                                                  @if(!empty(json_decode($prd->images)[4]))<img src="{{asset('images/products/'.json_decode($prd->images)[4])}}" alt="">@endif
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-5">
                        <form  action="{{route('add.cart',$prd->id)}}" method="post">
                            @csrf
                          <div class="shop-product-details">
                          <div class="short-description">
                              <p>{{$prd->short_description}}</p>
                          </div>
                          <div class="space-gap15"></div>
                              <div class="row">
                                  <div class="sale-in-stock ml-2">
                                      <div class="sale-btn btn-success">{{$prd->stock_status}}</div>
                                  </div>
                              </div>
                              <div class="space-gap15"></div>
                              <div class="sku">
                                  <p>Sku: 64410A0736</p>
                              </div>
                             <div class="space-gap15"></div>
                              <div class="shop-product-name">
                                  <p>{{$prd->product_name}}</p>
                              </div>
                              <div class="space-gap15"></div>
                              <div class="shop-product-price">
                                  <span><span style="font-weight:800">{{currency()}}</span>{{$prd->prdPrice->special_price}}</span>
                                  &nbsp;
                                  <del>
                                      <span class="text-danger"><span style="font-weight:800">{{currency()}}</span>{{$prd->prdPrice->regular_price}}</span>
                                  </del>
                              </div>
                              <div class="space-gap15"></div>
                              <div class="shop-product-size">
                                  <h6>SELECT SIZE</h6>
                                  <div class="space-gap15"></div>
                                  <div class="sizes">
                                    @foreach(json_decode($prd->prdVariants->variants_attribute) as $size)
                                    <label>
                                        <input type="radio" name="variants" value="{{$size}}" class="inputecheck">
                                        <div id="vriantsss" class="sizes-btn">{{$size}}</div>
                                    </label>
                                    @endforeach
                                  </div>

                              </div>
                              <div class="space-gap15"></div>
                              <div class="row d-flex">
                                <div class="shop-product-delivery d-flex align-items-center">
                                    <div class="shop-product-delivery-icon">
                                        <span class="material-icons">
                                            local_shipping
                                        </span>
                                    </div>
                                    <div class="shop-product-details">
                                        <p class="font-weight-bold">Exchange Info</p>                                                </p>
                                    </div>
                                </div>
                                <div class="shop-product-delivery  d-flex align-items-center">
                                    <div class="shop-product-delivery-icon">
                                        <span class="material-icons">
                                            local_car_wash
                                        </span>
                                    </div>
                                    <div class="shop-product-details">
                                        <p class="font-weight-bold">Delivery Info</p>                                                </p>
                                    </div>
                                </div>
                            </div>
                              <div class="space-gap15"></div>
                              <div class="size-guied d-flex justify-content-between">
                                  <a class="text-muted" href="#">
                                      <p>SIZE GUIDE</p>
                                  </a>
                                  <a class="text-muted" href="#">
                                      <p>SIZE OUT OF STOCK?</p>
                                  </a>
                              </div>
                              <div class="space-gap15"></div>
                              <div class="qty-cart-btn-area">
                                  <div class="qty">
                                      <span class="decrease-btn">-</span>
                                    <span class="qty-value font-weight-bold"> <input name="qnty" value="1"></span>
                                      <span class="increase-btn">+</span>
                                  </div>
                                  <input type="submit" value="Add to Cart" class="add-product-btn">
                              </div>
                          </div>
                        </form>
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
                                  {!!$prd->description!!}
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
                                                  <div class="review-comment">
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
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
  let varis= document.getElementById('vriantsss').innerHTML;
  let pusdd=document.getElementsByClassName('sizes').innerHTML;
  let res=varis.split(",")
  res.map((data)=>{
       console.log(data);
  })
</script>
@endpush
