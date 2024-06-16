@extends('layouts.app')

@section('content')
    

<section class="home-banner-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <div class="home-banner-wrap">
                        <h2>Learn on your schedule</h2>
                        <p>Study any topic, anytime. Explore thousands of courses for the lowest price ever!</p>
                        <form class="" action="https://www.kekuhintegrated.com.ng/home/search" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="query" placeholder="What Do You Want To Learn?">
                                <div class="input-group-append">
                                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<section class="home-fact-area">
        <div class="container-lg">
            <div class="row">
                            <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fas fa-bullseye float-left"></i>
                        <div class="text-box">
                            <h4>{{$all_courses->count()}} Online Courses</h4>
                            <p>Explore A Variety Of Fresh Topics</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fa fa-check float-left"></i>
                        <div class="text-box">
                            <h4>Expert Instruction</h4>
                            <p>Find The Right Course For You</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 d-flex">
                    <div class="home-fact-box mr-md-auto ml-auto mr-auto">
                        <i class="fa fa-clock float-left"></i>
                        <div class="text-box">
                            <h4>Lifetime Access</h4>
                            <p>Learn On Your Schedule</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="course-carousel-area">
    <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h2 class="course-carousel-title">Top Courses</h2>
                    <div class="course-carousel">
                        @foreach ($top_courses as $course)
                            @if ($course->user->status == '1')
                                <div class="course-box-wrap">
                                    <a href="{{url('category/'.$course->category->slug.'/'.$course->slug)}}" class="has-popover">
                                        <div class="course-box">
                                            <!-- <div class="course-badge position best-seller">Best seller</div> -->
                                            <div class="course-image">
                                                <img src="{{asset('uploads/course/'.$course->image_path)}}" alt="" class="img-fluid">
                                            </div>
                                            <div class="course-details">
                                                <h5 class="title">{{$course->name}}</h5>
                                                <p class="instructors"><i>By:</i><b> {{$course->user->name}}</b></p>
                                                <div class="rating">                                                                                                                                                               <i class="fas fa-star"></i>
                                                                                                                                                                            <i class="fas fa-star"></i>                                                                              <span class="d-inline-block average-rating">0</span>
                                                </div>
                                                <p class="price text-right">
                                                    @if ($course->discount_price > 0)
                                                    <small>{{$setting->currency }}{{$course->original_price}}</small> 
                                                    {{$setting->currency }}{{$course->discount_price}}</p>
                                                    @else 
                                                    {{$setting->currency }}{{$course->original_price}}</p>
                                                    @endif
                                            </div>
                                        </div>
                                    </a>
            
                                    <div class="webui-popover-content">
                                        <div class="course-popover-content">
                                            <div class="last-updated">Last Updater Sun, 03-Mar-2024</div>
                                            
                                            <div class="course-title">
                                                <a href="home/course/frontend-website-design-course/0.html">Frontend Website Design Course</a>
                                            </div>
                                            <div class="course-meta">
                                                <span class=""><i class="fas fa-play-circle"></i>
                                                    1 Lessons                                </span>
                                                <span class=""><i class="far fa-clock"></i>
                                                    00:00:00 Hours                                </span>
                                                <span class=""><i class="fas fa-closed-captioning"></i>English</span>
                                            </div>
                                            <div class="course-subtitle">HTML, CSS and JavaScript</div>
                                            <div class="what-will-learn">
                                                <ul>
                                                                                        <li>Frontend Developer Course</li>
                                                                            </ul>
                                        </div>
                                        <div class="popover-btns">
                                                                                                                <button type="button" class="btn add-to-cart-btn  big-cart-button-0" id="0" onclick="handleCartItems(this)">
                                                        Add To Cart                                    </button>
                                                    <button type="button" class="wishlist-btn " title="Add to wishlist" onclick="handleWishList(this)" id="0"><i class="fas fa-heart"></i></button>
                                                                            
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
    
<div class="container for-you my-5" id="product">
    <div class="heading heading-flex mb-3">
      <div class="container">
        <div class="heading3">All Courses</div>
      </div><!-- End .heading-left -->

        <div class="heading-right">
               <!-- <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>-->
           </div><!-- End .heading-right -->
        </div><!-- End .heading -->

        <div class="products">
            <div class="row justify-content-center">

                @foreach ($all_courses as $course)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{url('category/'.$course->category->slug.'/'.$course->slug)}}" class="text-dark">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset('uploads/course/'.$course->image_path)}}" height="90px" class="img-fluid" alt="">
                            </div>
                            <div class="card-header">
                                <h5 class="text-primary">{{$course->name}}</h5>
                                <p><i>By:</i><b> {{$course->user->name}}</b></p>

                            @if ($course->discount_price > 0)
                                    <span class="new-price fs-5"><span style='font-weight: bolder;'>{{$setting->currency}}{{$course->discount_price}}</span></span>
                                    <span class="old-price"> <small><s>{{$setting->currency}}{{$course->original_price}}</s></small></span></span>
                                @else 
                                    <span class="old-price"><span style='font-weight: bolder;'>{{$setting->currency}}{{$course->original_price}}</span></span></span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach
                
            </div><!-- End .row -->
        </div><!-- End .products -->
    </div>
    

@endsection
