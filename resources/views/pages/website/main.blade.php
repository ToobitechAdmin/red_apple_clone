<!doctype html>
<html lang="en">

<head>
    <title>Red Apple</title>
    <link rel="icon" href="{{ asset('assets/website/images/mainpagelogo.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                            <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-25" srcset="" />
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
                            <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-25" srcset="" />
                            <h1 id="register">Choose your delivery location</h1>
                        </div>

                        <div class="tab">
                            <h5>City</h5>

                            <input list="fruitList" id="fruits" name="fruits" required
                                placeholder="Input Branch *" />
                            <datalist id="fruitList">
                                <option value="lahore">Lahore</option>
                                <option value="karachi">karachi</option>
                                <option value="rawal_pindi">RawalPindi</option>
                                <option value="hyderabad">Hyderabad</option>
                            </datalist>
                        </div>
                        <div class="tab">
                            <h5>What's your city?</h5>
                            <input list="fruitList" id="fruits" name="fruits" required
                                placeholder="Input Branch *" />
                            <datalist id="fruitList">
                                <option value="lahore">Lahore</option>
                                <option value="karachi">karachi</option>
                                <option value="rawal_pindi">Rawal Pindi</option>
                                <option value="hyderabad">Hyderabad</option>
                            </datalist>
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
                            <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-25" srcset="" />
                            <h1 id="register">Choose your delivery location</h1>
                        </div>

                        <input list="fruitList" id="fruits" name="fruits" required
                            placeholder="Input Branch *" />
                        <datalist id="fruitList">
                            <option value="lahore">Lahore</option>
                            <option value="karachi">karachi</option>
                            <option value="rawal_pindi">Rawal Pindi</option>
                            <option value="hyderabad">Hyderabad</option>
                        </datalist>

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
        <section>
            <div id="preloader">
                <div id="ctn-preloader" class="ctn-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="L" class="letters-loading">
                                L
                            </span>

                            <span data-text-preloader="O" class="letters-loading">
                                O
                            </span>

                            <span data-text-preloader="A" class="letters-loading">
                                A
                            </span>

                            <span data-text-preloader="D" class="letters-loading">
                                D
                            </span>

                            <span data-text-preloader="I" class="letters-loading">
                                I
                            </span>

                            <span data-text-preloader="N" class="letters-loading">
                                N
                            </span>

                            <span data-text-preloader="G" class="letters-loading">
                                G
                            </span>
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






    <script src="{{ asset('assets/website/js/jquery.min.js') }}"></script>
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
        $(document).ready(function() {
            $('#form2').hide();
            $('.container1').hide();
            $('#newform').hide();

            $('#pickupf').hide();
            $('#startformBtn1').click(function() {

                $('#form2').show();

                $('#startform').hide();

            })

            $('#pickup').click(function() {
                $('#newform').show();
                $('#startform').hide();
            });
            $('#Back1').click(function() {
                $('.container1').hide();
                $('#startform').show();
                $('#newform').hide();
            })

            $('#Next1').click(function() {
                window.open("home.php", "_self");

            });
        });

        $(document).ready(function() {
            $('#prvoisform').click(function() {
                $('#form2').hide();
                $('#startform').show();
            })
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
