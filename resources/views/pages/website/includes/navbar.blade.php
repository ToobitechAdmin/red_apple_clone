<!----nav end---->
<style>
    .d-none.d-lg-block {
        width: 50%;
    }

    .position-relative1 {
        position: relative;
    }

    .position-absolute1 {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 100;
        width: 100%;
        display: none;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        background-color: #ffffff;
    }

    .dropdown-container:hover .position-absolute1 {
        display: block;
    }

    .list-group-item {
        cursor: pointer;
    }

    ul#abcse {
        background: white;
        padding: 10px;
        list-style: none;
        position: absolute;
        width: 100%;
        font-size: 20px;
    }

    li#lisearch {
        border-bottom: 1px solid lightgray;
        padding: 10px;
    }

    li#lisearch:hover {

        background: lightgray;
    }

    .d-flex {
        display: flex !important;
        align-items: center;
    }


    @media screen and (min-device-width: 101px) and (max-device-width: 767px) {

        /* / STYLES HERE / */
        ul#abcse {
            background: white;
            padding: 10px;
            list-style: none;
            position: absolute;
            width: 80%;
            font-size: 20px;
        }
    }

    @media screen and (min-device-width: 768px) and (max-device-width: 1023px) {

        /* / STYLES HERE / */
        ul#abcse {
            background: white;
            padding: 10px;
            list-style: none;
            position: absolute;
            width: 50%;
            font-size: 20px;
        }
    }
</style>
<div class="container-fluid">
    <div id="navbar_top">
        {{-- <div class="superNav border-bottom   " style="background-color: #ee6826; columns: white;" data-aos="fade-up">
            <marquee behavior="" direction="" style="color: white; font-weight: 600; font-size:17px">
                GINO GINELLES is currently Close and will
                Open
                shortly at 11:11 for new orders.
            </marquee>
        </div> --}}

        <div class="superNav border-bottom  " style="background-color: #ee6826; columns: white;" data-aos="fade-up">
            <marquee behavior="" direction="" style="color: white; font-weight: 600; font-size:17px">
                @if (isset($status['pickup']['store_status']) &&
                        isset($status['pickup']['reverse_status']) &&
                        isset($status['pickup']['time']))
                    GINO GINELLES is currently {{ $status['pickup']['store_status'] ?? '' }} and will
                    {{ $status['pickup']['reverse_status'] ?? '' }}
                    shortly at {{ \Carbon\Carbon::parse($status['pickup']['time'])->format('g:i A') }}
                    {{ $status['pickup']['day'] }} for new orders Pickup.
                @endif
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @if (isset($status['delivery']['store_status']) &&
                        isset($status['delivery']['reverse_status']) &&
                        isset($status['delivery']['time']))
                    GINO GINELLES is currently {{ $status['delivery']['store_status'] ?? '' }} and will
                    {{ $status['delivery']['reverse_status'] ?? '' }}
                    shortly at {{ \Carbon\Carbon::parse($status['delivery']['time'])->format('g:i A') }}
                    {{ $status['delivery']['day'] }} for new orders Delivery.
                @endif
            </marquee>
            </h1>
        </div>

        <nav id="navbar_top" class="navbar navbar-expand-lg  px-2 shadow-sm " style="background : black !important"
            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">

            <div class="container-fluid">

                <div id="brand">
                    <a class="navbar-brand" href="{{ route('website.home') }}"><img
                            src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid "
                            id="main-logo"> </a> <i class="fa-solid fa-cart-shopping me-1 d-lg-none"
                        style="color: #ee6826; cursor:pointer" data-toggle="modal" data-target="#myModalcart"></i>
                    <i class="fa-solid fa-bars-staggered d-lg-none" style="color: #ee6826; cursor:pointer"
                        id="menuicon" data-toggle="modal" data-target="#myModal"></i>
                </div>

                <div class="mx-auto my-1 d-lg-none d-sm-block d-xs-block">
                    <div class="input-group position-relative1">
                        <span class="border-warning input-group-text   text-white" style="background:#ee6826"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control " id="searchInputmb"
                            style="color:#ee6826;border:1px solid #ee6826">
                        <button class="btn  text-white" style="background:#ee6826" id="search-field-small">Search</button>

                    </div>

                    <ul class="list-group mt-2 d-none product-list" id="abcse">
                        <li id="lisearch" data-toggle="modal" data-target="#myModalmoreproduct-deltails" >abstract</li>

                    </ul>
                </div>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <div class=" d-none d-lg-block position-relative1">
                        <div class="input-group ">
                            <span class="border-warning input-group-text  text-white" id="search"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control" placeholder="search"
                                style="color:#ee6826;border:1px solid #ee6826" id="search-field">


                            <button class="btn  text-white" id="search"><i class="fa-solid fa-circle-arrow-right"
                                    style="color: white; font: 40px;"></i></button>
                        </div>

                        <ul class="list-group mt-2 d-none product-list" id="abcse">
                            <li id="lisearch" data-toggle="modal" data-target="#myModalmoreproduct-deltails" >abstract</li>


                        </ul>
                    </div>
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item cart" data-toggle="modal" data-target="#myModalcart">
                            <a class="nav-link mx-2 text-uppercase" href="#" style="color: white;">
                                <i class="fa-solid fa-cart-shopping me-1"></i> <span
                                    class="cart_model_total_item">3</span> <span class="vl"></span> <i
                                    class="fa-solid fa-bag-shopping"></i> Cart</a>
                        </li>
                        <li class="nav-item explor" data-toggle="modal" data-target="#myModal">
                            <a class="nav-link mx-2 ml-1 text-uppercase" href="#" style="color: white;"><i
                                    class="fa-solid fa-bars-staggered" style="color: white;"></i> Explore </a>
                        </li>
                    </ul>
                </div>
                    {{-- <div class="mx-auto d-lg-none d-sm-block d-xs-block">
                    <div class="input-group  position-relative1">
                        <span class="border-warning input-group-text  text-white" style="background:#ee6826 "><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control " style="border:1px solid #ee6826 ; color:#7a7a7a">
                        <button class="btn btn-danger text-white" style="background:#ee6826 ">Search</button>
                    </div>
                </div>
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <div class=" d-none d-lg-block">
                        <div class="input-group  position-relative1">
                            <span class="border-warning input-group-text  text-white" style="background:#ee6826 "><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control " style="border:1px solid #ee6826 ;color:#7a7a7a">
                            <button class="btn  text-white" style="background:#ee6826 "><i
                                    class="fa-solid fa-circle-arrow-right"
                                    style="color: white; font: 40px;"></i></button>
                        </div>

                    </div>
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item cart" data-toggle="modal" data-target="#myModalcart">
                            <a class="nav-link mx-2 text-uppercase" href="#" style="color: white;">
                                <i class="fa-solid fa-cart-shopping me-1"></i> <span
                                    class="cart_model_total_item">3</span> <span class="vl"></span> <i
                                    class="fa-solid fa-bag-shopping"></i> Cart</a>
                        </li>
                        <li class="nav-item explor" data-toggle="modal" data-target="#myModal">
                            <a class="nav-link mx-2 ml-1 text-uppercase" href="#" style="color: white;"><i
                                    class="fa-solid fa-bars-staggered" style="color: white;"></i> Explore </a>
                        </li>
                    </ul>
                </div> --}}
                </div>
        </nav>
    </div>
</div>

<!----nav end---->
