<!doctype html>
<html lang="en">

<head>
    <title>GINO GINELLES @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/website/images/mainpagelogo.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/preloader.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <style>
        .d-none.d-lg-block {
            width: 50%;
        }


        .d-flex {
            display: flex !important;
            align-items: center;
        }
    </style>

</head>

<body>


    <div class="container-fluid">
        <div id="navbar_top">
            <div class="superNav border-bottom py-2  " style="background-color: #da291c; columns: white;"
                data-aos="fade-up">
                <marquee behavior="" direction="" style="color: white; font-weight: 600; font-size:17px">
                    GINO GINELLES is currently closed and will open shortly at 11:00 am for new orders.
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
    <!----Banner end--->

    <!---- for tags -->


    <!---- for tags -->

    <!------body-->

    <div class="container-fluid main">
        <div class="row">
            <div class="col-12" data-aos="zoom-out" data-aos-duration="500">
                <i class="fa-solid fa-location-dot" style="color: #da291c; font-size: 33px;"></i> <span
                    style="margin-left: 20px;" id="bodyspan">Delivering to: <strong> DHA - Defence Phase 03
                    </strong></span>
            </div>
        </div>
    </div>

    <!----body banner menu---->

    <div class="container-fluid bodybanner">
        <div class="row" id="chatbazar">
            <div class="col-12" data-aos="zoom-in" data-aos-duration="500">
                <h1>Chaat bazzar</h1>
            </div>
        </div>
    </div>

    <!----body banner menu---->

    <div class="container-fluid menu">
        <div class="container">
            <div class="row g-4" data-aos="fade-up" data-aos-duration="1000">
                <!---column--->

                <div class="col-12 col-md-6 col-lg-4" data-toggle="modal" data-target="#myModalprocliclcart">
                    <div class="item">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4" data-toggle="modal" data-target="#myModalprocliclcart">
                    <div class="item">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4" data-toggle="modal" data-target="#myModalmoreproduct-deltails">
                    <div class="item">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="item">
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---column--->



    </div>




    </div>
    </div>




    <!----body banner menu---->

    <div class="container-fluid bodybanner">
        <div class="row">
            <div class="col-12" data-aos="zoom-in" data-aos-duration="500">

                <h1>New Arrival</h1>
            </div>
        </div>
    </div>

    <!----body banner menu---->

    <div class="container-fluid menu">
        <div class="container">
            <div class="row g-4" data-aos="fade-up" data-aos-duration="1000">

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->



                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->



                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->


                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->



            </div>




        </div>
    </div>








    <!----body banner menu---->

    <div class="container-fluid bodybanner" id="onlineexc">
        <div class="row">
            <div class="col-12" data-aos="zoom-in" data-aos-duration="500">

                <h1>online exclusive deals</h1>
            </div>
        </div>
    </div>

    <!----body banner menu---->

    <div class="container-fluid menu">
        <div class="container">
            <div class="row g-4" data-aos="fade-up" data-aos-duration="1000">

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->



                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->



                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->

                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->


                <!---column--->

                <div class="col-12 col-md-6 col-lg-4  ">
                    <div class="item">
                        <div class="row ">
                            <div class="col-6 col-md-6">
                                <div><span>lorim ipsume</span></div>
                                <div class="bottem-text"><span>lorim ipsume</span></div>
                            </div>
                            <div class="col-6  col-md-6">
                                <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50" id="menuimg"
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <!---column--->



            </div>




        </div>
    </div>





    <!--preloader start-->

    @include('pages/website/includes/preloader')
    <!--preloader end--->

    <!--model  for Man Menu ---->

    @include('pages/website/includes/sidebar')


    @include('pages/website/includes/right_nav')

    <!---Model right menu---->



    <!--Model Cart---->
    @include('pages/website/includes/cart')
    <!--Model Menu---->

    <!---Model left side tag----->







    <!--footer start-->
    @include('pages/website/includes/product_cart')
    <!--footer end--->


    <!--footer start-->
    @include('pages/website/includes/product_detail')
    <!--footer end--->

    <!--footer start-->
    @include('pages/website/includes/footer')
    <!--footer end--->














    <!-- model left side tag--->

    <!--proe loader-->




    <!--preloader--->




    <script src="{{ asset('assets/website/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/popper.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    <script src="{{ asset('assets/website/js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".modal a").not(".dropdown-toggle").on("click", function() {
                $(".modal").modal("hide");


            });





        });

        wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: true, // default
            live: true // default
        })
        wow.init();
    </script>
</body>

</html>
