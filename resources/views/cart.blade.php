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
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="space-gap50"></div>
@if ($products->count()!=0)
<div class="shop-page-title">
    <div class="container">
            <h4 class="text-left h2 font-weight-bold">Your Bag</h4>
            <div class="space-gap15"></div>
    <p><span>TOTAL:</span> <span>[ {{$products->count()}} items]</span><span> {{currency().$total}}</span></p>
    </div>
</div>
<div class="space-gap50"></div>
<div class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-list">
                    @foreach($products as $product)
                    <div class="carts d-flex">
                        <div class="product-cart-img">
                            <img src="{{asset('images/products/'.$product->options->image)}}" alt="" srcset="">
                        </div>
                        <div class="product-cart-details">
                            <div class="product-cart-top">
                            <h5>{{$product->name}}</h5>
                                <div class="product-cart-size">
                                    <div class="d-flex justify-content-between pt-2">
                                       <span class="h6">Size:</span>
                                       <span>
                                           <select name="" id="">
                                               <option value="">M 11 / W 12</option>
                                               <option value="">M 45 / W 42</option>
                                               <option value="">M 11 / W 32</option>
                                               <option value="">M 11 / W 12</option>
                                           </select>
                                       </span>
                                    </div>
                                    <div class="d-flex justify-content-between pt-2">
                                        <span class="h6">Quantity</span>
                                        <span>
                                             <input type="text" value="{{$product->qty}}" name="" id="">
                                        </span>
                                      </div>
                                </div>
                              <div class="cart-prd-price d-flex justify-content-between pt-2">
                                  <span>Price</span>
                                  <span><input type="text" disabled  style="color:#000000;" readonly value="{{currency().$product->price}}"/></span>
                              </div>
                               <div class="cart-total  d-flex justify-content-between pt-2">
                                <p><strong>Total</strong></p>
                                <p><strong><input type="text" style="color:#000000;font-weight:bold" disabled  readonly value="{{currency().$product->subtotal}}"/></strong></p>

                               </div>
                            </div>
                        </div>
                    <a href="{{route('remove.cart',$product->rowId)}}"><div class="remove-cart">x</div></a>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap justify-content-end mt-3 mb-3">
                    <a href="{{url('/')}}"> <div class="add-product-btn">Continue Shopping</div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-summary mb-3">
                    <div class="inner-summary py-3">
                        <h5 class="inner-summary-title px-3">Order Summary</h5>
                        <div class="summary-body">
                          <div class="d-flex justify-content-between py-1 px-3 bg-whitist">
                            <span class="summary-content-body">{{$products->count()}} items</span>
                            <span class="summary-content-body">{{currency().$total}}</span>
                          </div>
                          <div class="d-flex justify-content-between py-1 px-3">
                            <span class="summary-content-body">Delivery</span>
                            <span class="summary-content-body">Free</span>
                          </div>
                          <div class=" d-flex justify-content-between bg-whitist py-1 px-3">
                            <span class="summary-content-body">Sales Tax</span>
                            <span class="summary-content-body">--</span>
                          </div>
                          <div class=" d-flex justify-content-between pt-2 px-3">
                            <span class="summary-content-body"><strong>Total</strong></span>
                            <span class="summary-content-body"><strong>{{currency().$total}}</strong></span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="add-product-btn" >Checkout</div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="shop-page-title">
    <div class="container text-center">
            <h4 class=" h2 font-weight-bold">Your Bag is Empty</h4>
            <h3><a href="{{url('/')}}">Let's Start Shopping</a></h3>
            <div class="space-gap15"></div>
    </div>
</div>
@endif

<div class="space-gap"></div>
@endsection
@push('js')

@endpush
