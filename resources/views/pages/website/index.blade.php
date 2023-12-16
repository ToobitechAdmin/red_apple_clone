@extends('pages.website.layout.master')
@section('title', 'Home')
@section('style')
@endsection
@section('content')
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
                <img src="{{ asset('assets/website/images/carosle1.png') }}" class="img-fluid d-block w-100 "
                    alt="...">
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

    @include('pages.website.includes.nav_bar2')
    <!---- for tags -->

    <!------body-->

    <div class="container-fluid main">
        <div class="row">
            <div class="col-12" data-aos="zoom-out" data-aos-duration="500">
                <i class="fa-solid fa-location-dot" style="color: #ee6826 ; font-size: 33px;"></i> <span
                    style="margin-left: 20px;" id="bodyspan">Delivering to: <strong> DHA - Defence Phase 03
                    </strong></span>
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
                                class="img-fluid w-50 " style="margin:auto">

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


                            {{-- <h5 class="mt-2">Special instructions</h5>
                                <small class="muted">Any specific preferences? Let us know.</small>
                                <div class="mt-2">

                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div> --}}

                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-success">Save</button>
                                                                <button type="button" class="btn btn-default close-btn" data-dismiss="modal">Close</button> -->
                        <!-- <p class="text-center">© 2023 redapple. All Rights Reserved.</p>
                                                                <br>
                                                                <p class="text-center">Shop powered by ....</p> -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="cart-mycart">
                                        <div class="minus"><i class="fa-solid fa-circle-minus"
                                                style="margin-right:5px"></i></div>
                                        <div class="rate1">1</div>
                                        <input id="product_id" hidden type="hidden">
                                        <div class="plus"><i class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"><button type="button" class="btn btn-danger"
                                        id="addtocart_btn" class="close " data-dismiss="modal">ADD
                                        TO CART <span><i class="fa-solid fa-arrow-right abc"
                                                style="float:right"></i></span>
                                    </button></div>


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
        function productDetails(product) {

            $('#model_product_name').text(product.name);
            $('#model_product_price').text(product.price);
            $('#model_product_image').attr('src', product.image);
            $('#model_product_price').text('Rs. ' + product.price);
            $('#model_product_price').text('Rs. ' + product.price);
            $('#product_id').val(product.id);

        }

        $(document).ready(function() {
            // Initial rate value
            var rate = 1;

            // Click event for the minus button
            $('.minus').on('click', function() {
                // Decrease rate, but not less than 1
                rate = Math.max(1, rate - 1);
                updateRate();
            });

            // Click event for the plus button
            $('.plus').on('click', function() {
                // Increase rate
                rate++;
                updateRate();
            });

            // Function to update the displayed rate
            function updateRate() {
                $('.rate1').text(rate);
            }

            $('#addtocart_btn').click(function(e) {

                var qty = $('.rate1').text();
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
                    dataType: "json", // Update dataType if needed
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


                            html += ` <tr data-product-id=${element.id}>
                    <td class=" w-50">
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
                        <div style="margin-top:15px">${element.price}</div>
                    </td>

                    <td style="vertical-align: top; ">
                        <div style="margin-top:15px" class="remove-cart"><span
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
