<header class="container header_area" style="
    background-color: #edccf7;
     border-radius: 12px;
      padding: 0 20px;
       margin-top: 20px;
        margin-bottom: 20px;
        height: 60px;
    justify-content: center;
    align-items: center;
    display: flex;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">

            <!-- Logo -->
            <a class="navbar-brand logo_h" href="{{url('/')}}">
                <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo"
                    style="width: 50px; height: 50px; border-radius: 50%;">
            </a>

            <!-- Toggle for mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <!-- Menu and icons -->
            <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                <div class="d-flex w-100 align-items-center justify-content-between">

                    <!-- Menu Items -->
                    <ul class="nav navbar-nav ">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/products')}}">Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/about-us')}}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/tips-skincare')}}">Consultation</a></li>
                    </ul>

                    <!-- Right Icons -->
                    <!-- Right Icons -->
                    <div class="d-flex align-items-center gap-3">

                        <!-- Search icon -->
                        <a href="#" class="nav-link"><i class="fas fa-search" style="color: #651B7A"></i></a>

                        <!-- Notification icon -->
                        <a href="#" class="nav-link position-relative">
                            <i class="fas fa-bell" style="color: #651B7A"></i>
                            <span class="badge badge-danger"
                                style="position: absolute; top: 0; right: 0; font-size: 10px;">1</span>
                        </a>

                        <!-- Cart icon -->
                        <a href="#" class="nav-link position-relative">
                            <i class="fas fa-shopping-cart" style="color: #651B7A"></i>
                            <span class="badge badge-danger"
                                style="position: absolute; top: 0; right: 0; font-size: 10px;">0</span>
                        </a>

                        <!-- Profile -->
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Profile"
                                style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">
                            <span style="font-weight: bold; color: #651B7A;">Hing Sophally</span>
                        </div>

                    </div>


                </div>
            </div>
        </nav>
    </div>
</header>
<style>
    .header_area .navbar .nav .nav-item:hover .nav-link, .header_area .navbar .nav .nav-item.active .nav-link{
        color: #410053 ;
    }
    .header_area .navbar .nav .nav-item .nav-link {
  position: relative;
  padding-bottom: 5px;
  transition: color 0.3s ease;
}

/* Create the underline effect */
.header_area .navbar .nav .nav-item .nav-link::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background: #651B7A;
  transition: width 0.3s ease;
}

/* On hover or active, expand the underline */
.header_area .navbar .nav .nav-item:hover .nav-link::after,
.header_area .navbar .nav .nav-item.active .nav-link::after {
  width: 100%;
}

/* Optional: change text color on hover */
.header_area .navbar .nav .nav-item:hover .nav-link,
.header_area .navbar .nav .nav-item.active .nav-link {
  color: #410053;
}
.header_area .navbar{
    border-top: none !important;
}

</style>