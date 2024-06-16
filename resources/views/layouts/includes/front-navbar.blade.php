<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <ul class="mobile-header-buttons">
        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
        <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
    </ul>

    <a href="https://www.kekuhintegrated.com.ng/" class="navbar-brand" href="#"><img src="{{asset('front_assets/uploads/system/logo-dark.png')}}" alt="" height="35"></a>

    <div class="main-nav-wrap">
    <div class="mobile-overlay"></div>

    <ul class="mobile-main-nav">
        <div class="mobile-menu-helper-top"></div>
    
        <li class="has-children">
        <a href="">
            <i class="fas fa-th d-inline"></i>
            <span>Courses</span>
            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
        </a>

            <ul class="category corner-triangle top-left is-hidden">
                <li class="go-back"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>
                @php
                    $categories = App\Models\Category::where('status','1')->get();
                @endphp
                @foreach ($categories as $category) 
                    <li class="has-children">
                        <a href="#">
                          <span class="icon"><i class="far fa-object-group"></i></span>
                          <span>{{$category->name}}</span>
                          <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                        </a>
                          <ul class="sub-category is-hidden">
                              <li class="go-back-menu"><a href=""><i class="fas fa-angle-left"></i>Menu</a></li>
                              
                        <li>
                          @foreach ($category->courses as $course)
                          <a href=""><i class="fa fa-align-justify"></i> {{$course->name}}</a>
                          @endforeach
                          </li>
                      </ul>
                  </li>
                  @endforeach
        
        <li class="all-category-devided">
            <a href="https://www.kekuhintegrated.com.ng/home/courses">
            <span class="icon"><i class="fa fa-align-justify"></i></span>
            <span>All Courses</span>
            </a>
        </li>
        </ul>
        </li>

<div class="mobile-menu-helper-bottom"></div>
</ul>
</div>

  <form class="inline-form" action="https://www.kekuhintegrated.com.ng/home/search" method="get" style="width: 100%;">
    <div class="input-group search-box mobile-search">
      <input type="text" name='query' class="form-control" placeholder="Search For Courses">
      <div class="input-group-append">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>

  
  <div class="cart-box menu-icon-box" id="cart_items">
    <div class="icon">
<a href="{{url('/cart')}}"><i class="fas fa-shopping-cart"></i></a>
@php
    $cart_count = App\Models\Cart::count();
@endphp
<span class="number">{{$cart_count}}</span>
</div>

<!-- Cart Dropdown goes here -->
<div class="dropdown course-list-dropdown corner-triangle top-right" style="display: none;"> <!-- Just remove the display none from the css to make it work -->
<div class="list-wrapper">
<div class="item-list">
    <ul>
                    </ul>
</div>
<div class="dropdown-footer">
    <div class="cart-total-price clearfix">
        <span>Total:</span>
        <div class="float-right">
            <span class="current-price">N0</span>
            <!-- <span class="original-price">$94.99</span> -->
        </div>
    </div>
    <a href="home/shopping_cart.html">Go To Cart</a>
</div>
</div>
<div class="empty-box text-center d-none">
<p>Your Cart Is Empty.</p>
<a href="">Keep Shopping</a>
</div>
</div>

<script type="text/javascript">
function showCartPage() {
window.location.replace("https://www.kekuhintegrated.com.ng/home/shopping_cart");
}
</script>
  </div>

  <span class="signin-box-move-desktop-helper"></span>
  <div class="sign-in-box btn-group">

    @if (Auth::check())
      @if (Auth::user()->role_as == 1)
        <a href="{{url('admin/dashboard')}}" class="btn btn-sign-in">Dashboard</a>   
      @endif
      @if (Auth::user()->role_as == 2)
        <a href="{{url('instructor/dashboard')}}" class="btn btn-sign-in">Dashboard</a>   
      @endif
      @if (Auth::user()->role_as == 3)
        <a href="{{url('student/dashboard')}}" class="btn btn-sign-in">Dashboard</a>   
      @endif
    
    <a class="btn btn-sign-up" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="mdi mdi-logout text-primary"></i>
              Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
    @else 
    <a href="{{url('/login')}}" class="btn btn-sign-in">Log In</a>

    <a href="{{url('/register')}}" class="btn btn-sign-up">Sign Up</a>
    @endif

  </div> <!--  sign-in-box end -->
</nav>