@extends('layouts.app')

@section('content')
  <section class="page-header-area">
      <div class="container">
          <div class="row">
              <div class="col">
                  <nav>
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{url('/home')}}"><i class="fas fa-home"></i></a></li>
                          <li class="breadcrumb-item"><a href="{{url('/cart')}}">Shopping Cart</a></li>
                      </ol>
                  </nav>
                  <h1 class="page-title">Shopping Cart</h1>
              </div>
          </div>
      </div>
  </section>
  
  
  <section class="cart-list-area">
      <div class="container">
          <div class="row" id = "cart_items_details">
              <div class="col-lg-9">
  
                  <div class="in-cart-box">
                      <div class="title">{{$cart_count}} Courses In Cart</div>
                      <div class="">
                            <ul class="cart-course-list">
                                  @foreach ($cartItems as $item)
                                  <li>
                                    <div class="cart-course-wrapper">
                                        <div class="image">
                                            <a href="https://www.kekuhintegrated.com.ng/home/course/frontend-website-design-course/0">
                                                <img src="{{asset('uploads/course/'.$item->image_path)}}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="details">
                                            <a href="https://www.kekuhintegrated.com.ng/home/course/frontend-website-design-course/0">
                                                <div class="name">{{$item->course->name}}</div>
                                            </a>
                                            <a href="https://www.kekuhintegrated.com.ng/home/instructor_page/1">
                                                <div class="instructor">
                                                    @php
                                                        $created_by = App\Models\User::find($item->course->created_by);
                                                    @endphp
                                                    By <span class="instructor-name">{{$created_by->name}}</span>,
                                                </div>
                                            </a>
                                        </div>
                                        <div class="move-remove">
                                            <div id = "0"><i class="fa fa-trash"></i></div>
                                            <!-- <div>Move to Wishlist</div> -->
                                        </div>
                                        <div class="price">
                                            <a href="">
                                              @if ($item->course->discount_price > 0)
                                                <div class="current-price">
                                                    {{$settings->currency}}{{$item->course->original_price}}                                                    
                                                </div>
                                                <div class="original-price">
                                                    {{$settings->currency}}{{$item->course->discount_price}}                                                    
                                                </div>
                                              @else 
                                                <div class="current-price">
                                                    {{$settings->currency}}{{$item->course->original_price}}                                                    
                                                </div>
                                              @endif
                                                                                                
                                                      <span class="coupon-tag">
                                                    <i class="fas fa-tag"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                  @endforeach  
                            </ul>
                      </div>
                  </div>
  
              </div>
              <div class="col-lg-3">
                  <div class="cart-sidebar">
                      <div class="total">Total:</div>
                      <span id = "total_price_of_checking_out" hidden>50000</span>
                      <div class="total-price">N50000</div>
                      <div class="total-original-price">
                          <span class="original-price">N100000</span>
                          <!-- <span class="discount-rate">95% off</span> -->
                      </div>
                      <button type="button" class="btn btn-primary btn-block checkout-btn" onclick="handleCheckOut()">Checkout</button>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection