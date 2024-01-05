<!doctype html>
<html lang="en">

<head>
    <title>Red Apple</title>
    <link rel="icon" href="{{ asset('assets/website/images/mainpagelogo.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{ asset('assets/website/js/jquery.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/website/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/website/css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <link rel="stylesheet" href="{{ asset('assets/website/css/preloader.css') }}">



    <style>

    </style>

</head>

<body>


    <div class="container" id="startform">
        <div class="row d-flex flex-column min-vh-100 min-vw-auto">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <div class="col-md-8" data-aos="fade-up">
                    <form id="regForm" data-aos="fade-up" data-aos-duration="1000">
                        <div class="text-center">
                            <img src="{{ asset('assets/website/images/mainpagelogo1212121.png') }}" class="img-fluid w-25"
                                srcset="" />
                        </div>

                        <div class="pt-2" style="overflow: auto;">
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <button type="button" class="btn btn-danger btn-lg"
                                    id="startformBtn1">DELIVERY</button>
                                <button type="button" class="btn btn-danger btn-lg" id="pickup">PICK UP</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- form2 --->
    <div class="container" id="form2">
        <div class="row d-flex flex-column min-vh-100 min-vw-auto">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm">
                        <div class="text-center">
                            <img src="{{ asset('assets/website/images/mainpagelogo1212121.png') }}" class="img-fluid w-25"
                                srcset="" />
                            <h1 id="register">Choose your Delivery Location</h1>
                        </div>

                        <div class="tab">
                            <h5>City</h5>
                            <select id="city_input" class="form-select form-select-lg mb-3"
                                aria-label="form-select-lg example" required>
                                <option value="">Select City</option>
                                @forelse ($data['city'] as $item)
                                    <option data-id='{{ $item->id }}' value="{{ $item->name }}">
                                        {{ $item->name }}</option>
                                @empty
                                    <option value="">Cities Not Found</option>
                                @endforelse

                            </select>
                            {{-- <input list="city_list" id="city_input" name="city" required
                                placeholder="Input City *" />
                            <datalist id="city_list">
                                @forelse ($data['city'] as $item)
                                    <option data-id='{{ $item->id }}' value="{{ $item->name }}">
                                        {{ $item->name }}</option>
                                @empty
                                    <option value="">Cities Not Found</option>
                                @endforelse

                            </datalist> --}}
                        </div>
                        <div class="tab">
                            <h5>What's your Area?</h5>

                            <select id="area_input" class="form-select form-select-lg mb-3"
                                aria-label="form-select-lg example">
                                {{-- @forelse ($data['city'] as $item)
                                    <option data-id='{{ $item->id }}' value="{{ $item->name }}">
                                        {{ $item->name }}</option>
                                @empty
                                    <option value="">Cities Not Found</option>
                                @endforelse --}}

                            </select>
                        </div>

                        <div style="overflow: auto;" id="nextprevious">
                            <div id="indexbtn" style="margin: auto;">
                                <button type="button" class="mt-4" id="nextBtn" onclick="nextPrev(1)"><i
                                        class="fa fa-angle-double-right" id="kkjk"> </i></button>
                                <button type="button" class="mt-4" id="prevBtn" onclick="nextPrev(-1)"><i
                                        class="fa fa-angle-double-left"></i> Back</button>
                                <button type="button" class="mt-4" id="prvoisform"><i
                                        class="fa fa-angle-double-left"> Back</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---form2 close--->



    <!-- form2 --->
    <div class="container" id="newform">
        <div class="row d-flex flex-column min-vh-100 min-vw-auto">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm" onsubmit="return validateForm()">
                        <div class="text-center">
                            <img src="{{ asset('assets/website/images/mainpagelogo1212121.png') }}" class="img-fluid w-25"
                                srcset="" />
                            <h1 id="register">Choose your Pickup Location</h1>
                        </div>

                        {{-- <input list="brnach_list" id="brnach_input" name="brnach" required
                            placeholder="Input Branch *" />
                        <datalist id="brnach_list">
                            <option value="lahore">Lahore</option>
                            <option value="karachi">karachi</option>
                            <option value="rawal_pindi">Rawal Pindi</option>
                            <option value="hyderabad">Hyderabad</option>
                        </datalist> --}}
                        <select id="brnach_input" class="form-select form-select-lg mb-3"
                            aria-label="form-select-lg example">
                            <option value="">Select Area</option>
                            @forelse ($data['branch'] as $item)
                                <option data-id='{{ $item->id }}' value="{{ $item->name }}">
                                    {{ $item->city->name }} - {{ $item->name }}</option>
                            @empty
                                <option value="">Branch Not Found</option>
                            @endforelse

                        </select>

                        <div class="btn-box">
                            <button type="button" id="Next1" class="nextBtn1">Next</button>
                            <button type="button" id="Back1">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---form2 close--->

    <body class="no-scroll-y" style="overflow-y: hidden;">
        <section >
            <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader">
                    <div class="animation-preloader text-center">

                        <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-25 mb-5" srcset="">
                        <!-- <div class="spinner"></div> -->
                        <div class="txt-loading">
                            <!--<span data-text-preloader="L" class="letters-loading">-->
                            <!--	L-->
                            <!--</span>-->

                            <!--<span data-text-preloader="O" class="letters-loading">-->
                            <!--	O-->
                            <!--</span>-->

                            <!--<span data-text-preloader="A" class="letters-loading">-->
                            <!--	A-->
                            <!--</span>-->

                            <!--<span data-text-preloader="D" class="letters-loading">-->
                            <!--	D-->
                            <!--</span>-->

                            <!--<span data-text-preloader="I" class="letters-loading">-->
                            <!--	I-->
                            <!--</span>-->

                            <!--<span data-text-preloader="N" class="letters-loading">-->
                            <!--	N-->
                            <!--</span>-->

                            <!--<span data-text-preloader="G" class="letters-loading">-->
                            <!--	G-->
                            <!--</span>-->
                            <img src="{{ asset('assets/website/images/Giff.gif') }}" class="img-fluid w-25 " srcset="">

                        </div>
                    </div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
                </div>
            </div>
        </section>
    </body>
    </div>






    <!-- Created by ARiyou2000 -->
    <!---pre loader--->

    <script>
        var fome1 = document.getElementById("fome1");
        var Next1 = document.getElementById("Next1");
    </script>




    <script src="{{ asset('assets/website/js/popper.js') }}"></script>
    <script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    <script src="{{ asset('assets/website/js/script.js') }}"></script>
    {{-- <script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<!-- <script src="js/abc.js"></script> -->
<script src="js/script.js"></script> --}}


    <script>
        let deliverytype = null;
        let branch = null;
        let area = null;
        let city = null;
        let area_id = null;
        let city_id = null;
        let branch_id = null;
        $(document).on("change", "#city_list", function() {
            alert('aaa')
        });

        $('#city_input').change(function(e) {
            city = $(this).val();
            $("#area_input").empty();
            var selectedOption = $(this).find(':selected');
            city_id = selectedOption.data('id');
            $.ajax({
                type: "GET",
                url: "{{ route('website.get.areas') }}",
                data: {
                    city_id: city_id
                },

                success: function(response) {
                    var html = `<option>Select Area</option>`;
                    response.forEach(element => {
                        html += `<option data-id='${element.id }' value="${ element.name }">
                            ${ element.name }</option>`
                    });
                    $("#area_input").append(html);
                }
            });
            e.preventDefault();

        });
        $('#area_input').change(function(e) {
            area = $(this).val();
            var selectedOption = $(this).find(':selected');
            area_id = selectedOption.data('id');
            e.preventDefault();

        });
        $('#brnach_input').change(function(e) {
            branch = $(this).val();
            var selectedOption = $(this).find(':selected');
            branch_id = selectedOption.data('id');


        });
        $(document).ready(function() {
            $('#form2').hide();
            $('.container1').hide();
            $('#newform').hide();

            $('#pickupf').hide();
            $('#startformBtn1').click(function() {
                deliverytype = 'Delivery';

                $('#form2').show();

                $('#startform').hide();

            })

            $('#pickup').click(function() {

                deliverytype = 'Pickup';

                $('#newform').show();
                $('#startform').hide();
            });
            $('#Back1').click(function() {
                $('.container1').hide();
                $('#startform').show();
                $('#newform').hide();
            })

            $('#Next1').click(function() {
                saveData()

                window.open("{{ route('website.home') }}", "_self");

            });

            $("#nextBtn").click(function(e) {

                e.preventDefault();

            });
        });

        $(document).ready(function() {
            $('#prvoisform').click(function() {
                $('#form2').hide();
                $('#startform').show();
            })
        });


        //Code by ARiyou2000

        var currentTab = 0;
        document.addEventListener("DOMContentLoaded", function(event) {


            showTab(currentTab);

        });

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prvoisform").style.display = "block"
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prvoisform").style.display = "none"
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            } else {
                document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
            }
            fixStepIndicator(n)

        }

        function nextPrev(n) {

            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";

            currentTab = currentTab + n;

            if (currentTab >= x.length) {
                document.getElementById("form2").style.display = "none";
                saveData();

                window.open("{{ route('website.home') }}", "_self");


                document.getElementById("nextprevious").style.display = "none";
                document.getElementById("all-steps").style.display = "none";
                document.getElementById("register").style.display = "none";
                document.getElementById("text-message").style.display = "none";
            }

            showTab(currentTab);

        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");

            for (i = 0; i < y.length; i++) {

                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;

                }


            }


            return valid;


        }

        function saveData() {


            if (deliverytype == "Delivery") {

                branch = null;
                branch_id = null;
            }
            if (deliverytype == "Pickup") {
                area = null;
                area_id = null;
            }
            $.ajax({
                type: "get",
                url: "{{ route('website.data.save') }}",
                data: {
                    deliverytype: deliverytype,
                    branch: branch,
                    area: area,
                    city: city,
                    city_id: city_id,
                    area_id: area_id,
                    branch_id: branch_id
                },
                success: function(response) {
                    window.reload()
                }
            });
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
