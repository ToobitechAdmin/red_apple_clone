<!----nav end---->
<div class="container-fluid">
    <div id="navbar_top">
        <div class="superNav border-bottom py-2  " style="background-color: #da291c; columns: white;"
            data-aos="fade-up">
            <marquee behavior="" direction="" style="color: white; font-weight: 600; font-size:17px">
                redapple is currently closed and will open shortly at 11:00 am for new orders.
            </marquee>
        </div>
        <nav id="navbar_top" class="navbar navbar-expand-lg bg-white  navbar-light p-4 shadow-sm "
            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">

            <div class="container-fluid">

                <div id="brand">
                    <a class="navbar-brand" href="{{ route('website.home') }}"><img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid "
                            id="main-logo"> </a> <i class="fa-solid fa-cart-shopping me-1 d-lg-none"
                        style="color: red; cursor:pointer" data-toggle="modal" data-target="#myModalcart"></i>
                    <i class="fa-solid fa-bars-staggered d-lg-none" style="color: red; cursor:pointer"
                        id="menuicon" data-toggle="modal" data-target="#myModal"></i>
                </div>

                <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
                    <div class="input-group">
                        <span class="border-warning input-group-text  bg-danger text-white"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control border-danger" style="color:#7a7a7a">
                        <button class="btn btn-danger text-white">Search</button>
                    </div>
                </div>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <div class=" d-none d-lg-block">
                        <div class="input-group">
                            <span class="border-warning input-group-text bg-danger text-white"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control border-danger" style="color:#7a7a7a">
                            <button class="btn btn-danger text-white"><i class="fa-solid fa-circle-arrow-right"
                                    style="color: white; font: 40px;"></i></button>
                        </div>
                    </div>
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item cart" data-toggle="modal" data-target="#myModalcart" id="cart">
                            <a class="nav-link mx-2 text-uppercase" href="#" style="color: white;"><i
                                    class="fa-solid fa-cart-shopping me-1"></i> Cart</a>
                        </li>
                        <li class="nav-item explor" data-toggle="modal" data-target="#myModal">
                            <a class="nav-link mx-2 ml-1 text-uppercase" href="#" style="color: white;"><i
                                    class="fa-solid fa-bars-staggered" style="color: white;"></i> Explore </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<!----nav end---->
