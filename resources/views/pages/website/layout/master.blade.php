<!doctype html>
<html lang="en">

<head>
    <title>Red Apple Clone | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/website/images/mainpagelogo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{ asset('assets/website/js/jquery.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap"
        rel="stylesheet">



    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/preloader.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('assets/website/css/toastr.min.css') }}" />
    @yield('style')
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

    @php
        $cart = \Cart::getContent();
    @endphp
    {{-- @dd($cart->count()) --}}
    @include('pages.website.includes.navbar')

    @yield('content')
    <!----nav end---->
    <!---home Start--->






    <!--preloader start-->

    {{-- @include('pages/website/includes/preloader') --}}
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
    @include('pages/website/includes/footer')
    <!--footer end--->














    <!-- model left side tag--->

    <!--proe loader-->




    <!--preloader--->






    <script src="{{ asset('assets/website/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/popper.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    <script src="{{ asset('assets/website/js/script.js') }}"></script>
    <script>
        $(document).ready(function() {
            function getCart(type) {

                $.ajax({
                    type: "get",
                    url: "{{ route('website.cart') }}",
                    data: {
                        type: type
                    },
                    success: function(response) {
                        console.log(response.cart.item);
                        var html;
                        var items = response.cart.item;
                        $('#cart_model_total_item').text(response.cart['total_item']);
                        $('#cart_model_subtotal').text(response.cart['subtotal']);
                        $('#cart_model_total').text(response.cart['total']);
                        $("#cart_model_items").html('');

                        for (const key in items) {
                            if (items.hasOwnProperty(key)) {
                                const element = items[key];
                                console.log(element);

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
                                <div style="margin-top:15px"><span
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

            function updateCart(id,quantity) {

                $.ajax({
                    type: "POST",
                    url: "{{ route('website.update.cart') }}",
                    data: {
                        id:id,
                        quantity:quantity
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        getCart('model')
                    }
                });
            }
            // Initial rate value

            var rate = 1;
            // Click event for the minus button

            $(document).on("click", ".minus", function() {
                rate = $(this).parents('.cart-mycart1').children('.rate1').text();
                console.log(rate);
                // Decrease rate, but not less than 1
                rate = Math.max(1, rate - 1);
                var product_id = $(this).parents('tr').attr('data-product-id')
                updateCart(product_id,rate)
                $(this).parent('.cart-mycart').children('.rate1').text(rate);
                // updateRate(this);
            });


            // Click event for the plus button
            $(document).on("click", ".plus", function() {
                rate = $(this).parents('.cart-mycart1').children('.rate1').text();
                // Increase rate
                rate++;
                var product_id = $(this).parents('tr').attr('data-product-id')
                console.log(product_id);
                updateCart(product_id,rate)
                // updateRate(this)
                $(this).parent('.cart-mycart').children('.rate1').text(rate);
            });

            // Function to update the displayed rate
            function updateRate(element) {

                $(element).parent('.cart-mycart1').children('.rate1').text(rate);
                // $('.rate1').text(rate);
            }


            $("#cart").click(function(e) {
                getCart('model')
                e.preventDefault();

            });

            getCart();
        });



        var type = "{{ Session::get('type') }}";

        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;

        }
    </script>
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
    @yield('script')
</body>

</html>
