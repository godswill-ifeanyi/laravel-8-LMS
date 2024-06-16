@extends('layouts.app')

@section('content')
<section class="course-header-area">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="course-header-wrap">
            <h1 class="title">{{$course->name}}</h1>
            <p class="subtitle">{{$course->level}}</p>
            <div class="rating-row">
              <span class="course-badge best-seller">{{$course->top_course == '1' ? 'Top Course' : ''}}</span>
                                        <i class="fas fa-star"></i>
                                                  <i class="fas fa-star"></i>
                                                  <i class="fas fa-star"></i>
                                                  <i class="fas fa-star"></i>
                                                  <i class="fas fa-star"></i>
                                  <span class="d-inline-block average-rating">0</span><span>(0 Ratings)</span>
            <span class="enrolled-num">
              0 Students Enrolled          </span>
          </div>
          <div class="created-row">
            <span class="created-by">
              Created By            <a href="../../instructor_page/1.html" class="text-primary">{{$course->user->name}}</a>
            </span>
                        <span class="last-updated-date">Last Updated {{$course->updated_at->format('d-m-Y')}}</span>
                      <span class="comment"><i class="fas fa-comment"></i>English</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
  
      </div>
    </div>
  </div>
  </section>
  
  
  <section class="course-content-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
  
          <div class="what-you-get-box">
            <div class="what-you-get-title">What Will I Learn?</div>
            <ul class="what-you-get__items">
                                            <li>{{$course->outcome}}</li>
                                      </ul>
          </div>
          <br>
          
          @if ($course->curriculum != null)
          <div class="course-curriculum-box">
            <div class="course-curriculum-title clearfix">
              <div class="title float-left">Curriculum For This Course</div>
            </div>
            <div class="course-curriculum-accordion">
                <div class="lecture-group-wrapper">
                    <div class="lecture-group-title clearfix" data-toggle="collapse" data-target="#collapse0" aria-expanded="true">
                        <div class="title float-left">
                            {{$course->curriculum}}     
                        </div>
                    </div>
                </div>
            </div>
      </div>
          @endif
  
      <div class="requirements-box">
        <div class="requirements-title">Requirements</div>
        <div class="requirements-content">
          <ul class="requirements__list">
                                      <li>{{$course->requirements}}</li>
                                </ul>
        </div>
      </div>
      <div class="description-box view-more-parent">
        <div class="view-more" onclick="viewMore(this,'hide')">+ View More</div>
        <div class="description-title">Description</div>
        <div class="description-content-wrap">
          <div class="description-content">
            <p> {{$course->description}} <br></p>        </div>
        </div>
      </div>
  
  
      <div class="compare-box view-more-parent">
        <div class="view-more" onclick="viewMore(this)">+ View More</div>
        <div class="compare-title">Other Related Courses</div>
        <div class="compare-courses-wrap">
            <ul>
                @foreach ($all_courses as $course_item)
                <li>{{$course_item->name}}</li>
                @endforeach
            </ul>
                    </div>
    </div>
  
    <div class="about-instructor-box">
      <div class="about-instructor-title">
        About The Instructor    </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="about-instructor-image">
            <img src="../../../uploads/user_image/placeholder.png" alt="" class="img-fluid">
            <ul>
              <!-- <li><i class="fas fa-star"></i><b>4.4</b> Average Rating</li> -->
              <li><i class="fas fa-comment"></i><b>
                0            </b> Reviews</li>
              <li><i class="fas fa-user"></i><b>
                0            </b> Students</li>
              <li><i class="fas fa-play-circle"></i><b>
                1            </b> Courses</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="about-instructor-details view-more-parent">
            <div class="view-more" onclick="viewMore(this)">+ View More</div>
            <div class="instructor-name">
              <a href="../../instructor_page/1.html">{{$course->user->name}}</a>
            </div>
            <div class="instructor-title">
                        </div>
            <div class="instructor-bio">
                        </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="student-feedback-box">
      <div class="student-feedback-title">
        Student Feedback    </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="average-rating">
            <div class="num">
              0          </div>
            <div class="rating">
                                        <i class="fas fa-star" style="color: #abb0bb;"></i>
                                                  <i class="fas fa-star" style="color: #abb0bb;"></i>
                                                  <i class="fas fa-star" style="color: #abb0bb;"></i>
                                                  <i class="fas fa-star" style="color: #abb0bb;"></i>
                                                  <i class="fas fa-star" style="color: #abb0bb;"></i>
                                </div>
          <div class="title">Average Rating</div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="individual-rating">
          <ul>
                        <li>
                <div class="progress">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
                <div>
                  <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                                          <i class="fas fa-star filled"></i>
                    
                  </span>
                  <span>0%</span>
                </div>
              </li>
                        <li>
                <div class="progress">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
                <div>
                  <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                                          <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                    
                  </span>
                  <span>0%</span>
                </div>
              </li>
                        <li>
                <div class="progress">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
                <div>
                  <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                                          <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                    
                  </span>
                  <span>0%</span>
                </div>
              </li>
                        <li>
                <div class="progress">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
                <div>
                  <span class="rating">
                                        <i class="fas fa-star"></i>
                                                          <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                    
                  </span>
                  <span>0%</span>
                </div>
              </li>
                        <li>
                <div class="progress">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
                <div>
                  <span class="rating">
                                                          <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                    
                  </span>
                  <span>0%</span>
                </div>
              </li>
                    </ul>
        </div>
      </div>
    </div>
    <div class="reviews">
      <div class="reviews-title">Reviews</div>
      <ul>
          </ul>
  </div>
  </div>
  </div>
  <div class="col-lg-4">
    <div class="course-sidebar natural">
          <div class="course-sidebar-text-box">
        <div class="price">
            @if ($course->discount_price > 0)
            <span class="current-price"><span class="current-price">{{$settings->currency}}{{$course->discount_price}}</span></span>
            <span class="original-price">{{$settings->currency}}{{$course->original_price}}</span>
            @else 
            <span class="current-price">{{$settings->currency}}{{$course->original_price}}</span>
            @endif
            
              <input type="hidden" id="total_price_of_checking_out" value="N50000">
                          </div>
  
                          <div class="buy-btns">
              <a href="../../shopping_cart.html" class="btn btn-buy-now" id="course_0" onclick="handleBuyNow(this)">Buy Now</a>
                            <button class="btn btn-add-cart addToCartBtn" type="button" value="{{$course->id}}">Add To Cart</button>
                        </div>
                
  
        <div class="includes">
          <div class="title"><b>Includes:</b></div>
          <ul>
            <li><i class="far fa-file-video"></i>
              00:00:00 Hours On Demand Videos          </li>
            <li><i class="far fa-file"></i>1 Lessons</li>
            <li><i class="far fa-compass"></i>Full Lifetime Access</li>
            <li><i class="fas fa-mobile-alt"></i>Access On Mobile And Tv</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </section>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('.addToCartBtn').click(function (e) { 
                e.preventDefault();

                var course_id = $(this).val();
                
                $.ajax({
                    type: "POST",
                    url: "/add-to-cart",
                    data: {
                        "course_id" : course_id
                    },
                    success: function (response) {
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(response.status); 
                    }
                });
                
            });
        });
    </script>
@endsection