<div class="container-fluid">
    <div id="navbar_top">
        <div class="superNav border-bottom py-2  " style="background-color: #ee6826; columns: white;"
            data-aos="fade-up">
            <marquee behavior="" direction="" style="background-color:#ee6826; color: white; font-weight: 600; font-size:17px">
                redapple is currently closed and will open shortly at 11:00 am for new orders.
            </marquee>
        </div>
        <nav id="navbar_top" class="navbar navbar-expand-lg bg-white  navbar-light p-4 shadow-sm "
            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">

            <div class="container-fluid">

                <div id="brand">
                    <a class="navbar-brand" href="{{ route('website.home') }}"><img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid "
                            id="main-logo"> </a> <i class="fa-solid fa-cart-shopping me-1 d-lg-none"
                        style="color: #ee6826; cursor:pointer" data-toggle="modal" data-target="#myModalcart"></i>
                    <i class="fa-solid fa-bars-staggered d-lg-none" style="color: #ee6826; cursor:pointer"
                        id="menuicon" data-toggle="modal" data-target="#myModal"></i>
                </div>

                <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
                    <div class="input-group">
                        <span class="border-warning input-group-text  bg-danger text-white" style="background: #ee6826;"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control " style="color:#7a7a7a;">
                        <button class="btn btn-danger text-white">Search</button>
                    </div>
                </div>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <div class=" d-none d-lg-block">
                        <div class="input-group">
                            <span class="border-warning input-group-text bg-danger text-white"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control border-danger" style="color:#7a7a7a">
                            <button class="btn  text-white"  style="background: #ee6826;"><i class="fa-solid fa-circle-arrow-right"
                                    style="color: white; font: 40px;"></i></button>
                        </div>
                    </div>
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item cart" data-toggle="modal" data-target="#myModalcart">
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
<!---home Start--->
<!---Banner start--->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/website/images/carosle1.png') }}" class="img-fluid d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/website/images/carosle1.png') }}" class="img-fluid d-block w-100 " alt="...">
        </div>

    </div>
    <div class="container-fluid banner-bottom" data-aos="zoom-in">
        <div class="row">
            <div class=" col-lg-8 bannerbottom-colo">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex hver">
                            <div>
                                <i class="fa-solid fa-clock mb-2" style="font-size:22px; color: white;"
                                    id="iconnnn"></i>
                            </div>
                            <div class="ps-4 pb-0">
                                <p class="iconheading p-0">Opening Hours</p>
                                <div class="padddding">
                                    <span class="iconspan">Fri 11:00 am - 12:00 am</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">   <h5> <i class="fa-solid fa-location-dot" id="iconnnn" style="font-size: 22px; color: white;"></i> Trusted Partner </h5> </div> -->
                    <div class="col-md-4">
                        <div class="d-flex ">
                            <div>
                                <i class="fa-solid fa-location-dot" id="iconnnn"
                                    style="font-size: 22px; color: white;"></i>
                            </div>
                            <div class="ps-4 pb-0">
                                <p class="iconheading p-0">Address</p>
                                <div class="padddding">
                                    <span class="iconspan">F-6 Markaz F 6 Markaz F-6..</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">   <h5> <i class="fa-solid fa-square-phone" style="font-size: 22px; color: white;" id="iconnnn"></i> Trusted Partner</h5></div> -->
                    <div class="col-md-4">
                        <div class="d-flex ">
                            <div>
                                <i class="fa-solid fa-square-phone" style="font-size: 22px; color: white;"
                                    id="iconnnn"></i>
                            </div>
                            <div class="ps-4 pb-0">
                                <p class="iconheading p-0">Contact</p>
                                <div class="padddding">
                                    <span class="iconspan">(000) 000-000-000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
