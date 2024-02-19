@extends('pages.website.layout.master')
@section('title', 'Home')
@section('style')
@endsection
@section('content')
    @php
        // $cachedData = cache('cache-data');
        $cachedData = session()->get('cached-data');

        if (isset($cachedData['area']->number)){

            $whatappnumber = "https://wa.me/".$cachedData['area']->number ?? '';
        }

        if (isset($cachedData['branch']->number)){

            $whatappnumber = "https://wa.me/".$cachedData['branch']->number ?? '';
        }


    @endphp
    <!---Banner start--->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            
            @if (isset($slider[0]))

                @foreach ($slider as $key => $item)
                    @php
                        $img = $item->image;
                    @endphp
                    <div class="carousel-item @if ($key == 0) active @endif">

                        <img src="{{ asset($img) }}" class="img-fluid d-block w-100" alt="...">
                        {{-- <img src="{{ asset('assets/website/images/carosle1.png') }}" class="img-fluid d-block w-100" alt="..."> --}}
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="{{ asset('assets/website/images/carosle1.png') }}" class="img-fluid d-block w-100" alt="...">
                </div>
            @endif

        </div>
        {{-- <div class="container-fluid banner-bottom" data-aos="zoom-in">
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
                                        <span class="iconspan">
                                            @if (isset($cachedData['area']->address))
                                                {{ $cachedData['area']->address ?? '' }}
                                            @endif
                                            @if (isset($cachedData['branch']->address))
                                                {{ $cachedData['branch']->address ?? '' }}
                                            @endif
                                        </span>
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
                                        <span class="iconspan">
                                            @if (isset($cachedData['area']->number))
                                                {{ $cachedData['area']->number ?? '' }}
                                            @endif
                                            @if (isset($cachedData['branch']->number))
                                                {{ $cachedData['branch']->number ?? '' }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container-fluid banner-bottom">
            <div class="row justify-content-center">
                <div class=" col-xl-6 bannerbottom-colo">
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
                                        @if (isset($pickup_time_home))

                                            <span class="iconspan">{{\Carbon\Carbon::parse($pickup_time_home->opening_time)->format('g:i A')}} - {{\Carbon\Carbon::parse($pickup_time_home->closing_time)->format('g:i A')}}</span>

                                        @endif
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
                                        <span class="iconspan">
                                            @if (isset($cachedData['area']->address))
                                                {{ $cachedData['area']->address ?? '' }}
                                            @endif
                                            @if (isset($cachedData['branch']->address))
                                                {{ $cachedData['branch']->address ?? '' }}
                                            @endif
                                        </span>
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
                                        <span class="iconspan">
                                            @if (isset($cachedData['area']->number))
                                                {{ $cachedData['area']->number ?? '' }}
                                            @endif
                                            @if (isset($cachedData['branch']->number))
                                                {{ $cachedData['branch']->number ?? '' }}
                                            @endif
                                        </span>
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

    @include('pages.website.includes.nav_bar2')
    <!---- for tags -->

    <!------body-->

    <div class="container-fluid main">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" data-aos="zoom-out" data-aos-duration="500">
                <i class="fa-solid fa-location-dot" style="color: #ee6826 ; font-size: 33px;"></i>
                @if (isset($cachedData['area']->name))
                    <a href="{{route('website.location')}}" class="btn btn" style="margin-left: 20px;" id="bodyspan">
                        Delivering to: <strong> {{ $cachedData['city'] ?? '' }} |
                            {{ $cachedData['area']->name ?? '' }}
                        </strong></a>
                @endif
                @if (isset($cachedData['branch']->name))
                    <a href="{{route('website.location')}}" class="btn btn" style="margin-left: 20px;" id="bodyspan">
                        Pickup from: <strong> {{ $cachedData['city'] ?? '' }} |
                            {{ $cachedData['branch']->name ?? '' }}
                        </strong></a>
                @endif
            </div>
        </div>
    </div>


    <div class="products_list">

        <!----body banner menu---->

        @include('pages.website.ajax.products_cart')

    </div>


    {{-- Begin::Product Details Model --}}
    <div class="container">

        <!-- Trigger the modal with a button -->


        <!-- Modal pro click menu -->
        <div class="modal right fade" id="myModalmoreproduct-deltails" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title menu" style="float: left;"></h4>


                        <button type="button" class="close " data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="row  p-3">

                            <img id="model_product_image" src="{{ asset('assets/website/images/pp2.png') }}"
                                class="img-fluid w-100 " style="margin:auto">

                            <div class="namerate ">
                                <div id="model_product_name" class="name"><br>
                                    {{-- <small class="muted cardpro-desc">Any specific preferences? Let us know.</small> --}}
                                </div>
                                <div id="model_product_price" class="rate"></div>
                            </div>
                            <div class="mt-3 new2"></div>
                            {{-- <h5>Options</h5>
                                <h5>Select</h5>


                                <div class="form-check ml-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        White
                                    </label>
                                </div> --}}
                            {{-- <div class="form-check  ml-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Red
                                    </label>
                                </div> --}}


                            <h5 class="mt-2" style="color: white; ">Special instructions</h5>
                            <small class="muted" id="product-description"></small>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success">Save</button>
                                                                                                    <button type="button" class="btn btn-default close-btn" data-dismiss="modal">Close</button> -->
                        <!-- <p class="text-center">© 2023 GINO GINELLES. All Rights Reserved.</p>
                                                                                                    <br>
                                                                                                    <p class="text-center">Shop powered by ....</p> -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cart-mycart1" id="cart-btns">
                                        <div class="minus" id="decreaseqty"><i class="fa-solid fa-circle-minus"
                                                style="margin-right:5px"></i></div>
                                        <div class="rate1" id="qty">1</div>
                                        <input id="product_id" hidden type="hidden">
                                        <div class="plus" id="increseqty"><i
                                                class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                    <button type="button" class="btn btn-danger" id="addtocart_btn" class="close " data-dismiss="modal">
                                        ADD TO CART <span><i class="fa-solid fa-arrow-right abc" style="margin-left:20px"></i></span>
                                    </button>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    {{-- End::Product Details Model --}}
@endsection
@section('script')
<script>
     $('.close').click(function (e) { 
         $('#myModalcart').modal('hide');
    
    });
</script>

    <script>
        function productDetails(product) {

            $('#model_product_name').text(product.name);
            $('#model_product_price').text(product.price);
            $('#model_product_image').attr('src', product.image);
            $('#model_product_price').text('Rs. ' + product.price);
            $('#model_product_price').text('Rs. ' + product.price);
            $('#product-description').text(product.description);
            $('#product_id').val(product.id);

        }

        $(document).ready(function() {
            // Initial rate value
            var rate = 1;

            // Click event for the minus button
            $('#decreaseqty').on('click', function() {
                // Decrease rate, but not less than 1
                var rate = $(this).parents('.cart-mycart1').children('#qty').text();

                rate = Math.max(1, rate - 1);
                $(this).parents('.cart-mycart1').children('#qty').text(rate)
                // updateRate();
            });

            // Click event for the plus button
            $('#increseqty').on('click', function() {
                // Increase rate
                var rate = $(this).parents('.cart-mycart1').children('#qty').text();
                rate++;


                $(this).parents('.cart-mycart1').children('#qty').text(rate)
                // updateRate();
            });

            // Function to update the displayed rate
            function updateRate() {
                $('#qty').text(rate);
            }

            $('#addtocart_btn').click(function(e) {

                var qty = $('#qty').text();

                var product_id = $("#product_id").val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('website.add.to.cart') }}",
                    data: {
                        qty: qty,
                        product_id: product_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        $('#myModalcart').modal('show');
                        getCart1('model');
    
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong');
                        // Handle error
                    }
                });
                e.preventDefault();

            });
        });

        function getCart1(type) {

            $.ajax({
                type: "get",
                url: "{{ route('website.cart') }}",
                data: {
                    type: type
                },
                success: function(response) {
                    var html;
                    var items = response.cart.item;
                    $('#cart_model_total_item').text(response.cart['total_item']);
                    $('.cart_model_total_item').text(response.cart['total_item']);
                    $('#cart_model_subtotal').text(response.cart['subtotal']);
                    $('#cart_model_total').text(response.cart['total']);
                    $("#cart_model_items").html('');

                    for (const key in items) {
                        if (items.hasOwnProperty(key)) {
                            const element = items[key];


                            html += ` <tr data-product-id=${element.id} >
                            <td class="w-50">
                                <div class="img-withdesc"> <img src="{{ asset('${element.attributes.image}') }}"
                                        class="img-fluid w-25" alt="">
                                    <div class="descr"> ${element.name}  </div>
                                </div>
                            </td>
                            <td style="vertical-align: top;">
                                <div class="cart-mycart cart-mycart1">
                                    <div class="minus"><i class="fa-solid fa-circle-minus"
                                            style="margin-right:5px"></i></div>
                                    <div class="rate1">${element.quantity}</div>
                                    <div class="plus"><i
                                            class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                                    </div>
                                </div>
                            </td>
                            <td style="vertical-align: top; ">
                                <div style="margin-top:9px;color: white;">${element.price}</div>
                            </td>

                            <td style="vertical-align: top; ">
                                <div style="margin-top:9px" class="remove-cart"><span
                                            class="badge badge-secondary"><i
                                                class="fa-solid fa-trash"></i> remove</span></div>
                            </td>

                        </tr> `
                        }
                    }

                    $("#cart_model_items").html(html);
                }
            });


        }
        // $.ajax({
        //     type: "GET",
        //     url: "{{ route('product.list') }}",
        //     success: function(response) {
        //         console.log(response);
        //         $('.products_list').html('');
        //         $('.products_list').html(response);
        //     }
        // });
    </script>
@endsection
