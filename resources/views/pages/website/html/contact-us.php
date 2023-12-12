<?php include('section/header.php') ?>
<style>
    .schedul-upp {
display: flex;
justify-content: space-between;
align-items:end;
}

button.btn.btn-secondary.btnsed {
border-radius: 20px;
}


@media(max-width:992px){
.wrapper{
width:100%;
}
}
.panel-heading {
padding: 0;
border:0;
}
.panel-title>a, .panel-title>a:active{
display:block;
padding:15px;
color:#555;
font-size:16px;
font-weight:bold;
text-transform:uppercase;
letter-spacing:1px;
word-spacing:3px;
text-decoration:none;
}
.panel-heading  a:before {
 font-family: 'Glyphicons Halflings';
 content: "\f078";
 float: right;
 transition: all 0.5s;
}



.panel-heading.active a:before {
-webkit-transform: rotate(180deg);
-moz-transform: rotate(180deg);
transform: rotate(180deg);
}

.accordion-flush .accordion-item:last-child {
    border: 1px solid #cbcbcb;
    border-radius:5px;
}

</style>











<div class="container-fluid cnt">

<div class="row">
    <div class="col-md-4 mt-5">
        <div class="cntbgp text-center">
            <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid cntimg">
            <h5 class="pt-4">redapple</h5>
        </div>

    </div>

    <div class="col-md-8 mt-5">
        <div class="cntbgp">
            <span class="redheading">Phone Number</span>
            <h5 class="pt-4 mb-4"> <i class="fa-solid fa-phone" id="cnticon"></i> (021) 111-111-733</h5>
            <span class="redheading">Store Address                    </span>
            <p>F-6 Markaz F 6 Markaz F-6, Islamabad, Islamabad Capital Territory, Pakistan                    </p>
            <span class="redheading">Whatsapp Number </span>

            <h5 class="pt-4 mb-4"> <i class="fa-brands fa-whatsapp" id="cntwgatsapp"></i> (021) 111-111-733</h5>


            <div class="schedul-upp">
                <div><span class="redheading">Store Timings </span></div>
                <div><button type="button" class="btn btn-secondary btnsed"><span>CLOSED NOW</span></button></div>
            </div>

            <?php include('section/openclose.php') ?>

            <div class="schedul-upp">
                <div><span class="redheading">Delivery Timings</span></div>
                <div><button type="button" class="btn btn-secondary btnsed"><span>CLOSED NOW</span></button></div>
            </div>

            <?php include('section/openclose.php') ?>




            <span class="redheading mt-2">Delivery Locations  </span>


            <div class="mt-2">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     <strong style="font-size:18px"> Islamabad </strong>
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <span class="badge bg-danger" id="contact-bdge">PWD</span>
                        <span class="badge bg-danger"id="contact-bdge">Bahria Town - Phase 05</span>
                        <span class="badge bg-danger" id="contact-bdge">Bahria Town - Phase 07</span>
                        <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 02</span>
                        <span class="badge bg-danger" id="contact-bdge">Bahria Town - Phase 04</span>
                        <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 01</span>
                        <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 03</span>
                        <span class="badge bg-danger" id="contact-bdge">Jeddah Town</span>
                        <span class="badge bg-danger" id="contact-bdge">Civic Centre</span>

                    </div>
                  </div>
                </div>
              </div>
            </div>







            <div class="mt-4"></div>
            <span class="redheading ">We also deliver to</span>


                <div class="mt-2">
                <div class="accordion accordion-flush" id="accordionFlushExample2">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne">
                        <strong style="font-size:18px"> Islamabad </strong>
                        </button>
                    </h2>
                    <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample2">
                        <div class="accordion-body">
                            <span class="badge bg-danger" id="contact-bdge">PWD</span>
                            <span class="badge bg-danger"id="contact-bdge">Bahria Town - Phase 05</span>
                            <span class="badge bg-danger" id="contact-bdge">Bahria Town - Phase 07</span>
                            <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 02</span>
                            <span class="badge bg-danger" id="contact-bdge">Bahria Town - Phase 04</span>
                            <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 01</span>
                            <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 03</span>
                            <span class="badge bg-danger" id="contact-bdge">Jeddah Town</span>
                            <span class="badge bg-danger" id="contact-bdge">Civic Centre</span>

                        </div>
                    </div>
                    </div>
                </div>
                </div>





                <div class="mt-2"></div>



                <div class="mt-2">
                <div class="accordion accordion-flush" id="accordionFlushExample3">
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne3" aria-expanded="false" aria-controls="flush-collapseOne">
                        <strong style="font-size:18px"> Karachi </strong>
                        </button>
                    </h2>
                    <div id="flush-collapseOne3" class="accordion-collapse collapse" aria-labelledby="flush-headingOne3" data-bs-parent="#accordionFlushExample3">
                        <div class="accordion-body">
                            <span class="badge bg-danger" id="contact-bdge">PWD</span>
                            <span class="badge bg-danger"id="contact-bdge">Bahria Town - Phase 05</span>
                            <span class="badge bg-danger" id="contact-bdge">Bahria Town - Phase 07</span>
                            <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 02</span>
                            <span class="badge bg-danger" id="contact-bdge">Bahria Town - Phase 04</span>
                            <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 01</span>
                            <span class="badge bg-danger" id="contact-bdge">DHA - Defence Phase 03</span>
                            <span class="badge bg-danger" id="contact-bdge">Jeddah Town</span>
                            <span class="badge bg-danger" id="contact-bdge">Civic Centre</span>

                        </div>
                    </div>
                    </div>
                </div>
                </div>




              <!-- <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Link with href
                </a>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Button with data-bs-target
                </button>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                  Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
              </div> -->




        </div>
    </div>
</div>

</div>









<?php include('section/right-nav.php') ?>
			<!---Model right menu---->



			<!--Model Cart---->
			<?php include('section/cart.php') ?>
			<!--Model Menu---->

			<!---Model left side tag----->







			<!-- model left side tag--->

		<!--proe loader-->

        <?php include('section/preloader.php') ?>


		<!--preloader--->





    <?php include('section/footer.php') ?>








<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="js/script.js"></script>
<script>


$ (document).ready (function () {
$ (".modal a").not (".dropdown-toggle").on ("click", function () {
$ (".modal").modal ("hide");
});
});

$('.panel-collapse').on('show.bs.collapse', function () {
$(this).siblings('.panel-heading').addClass('active');
});

$('.panel-collapse').on('hide.bs.collapse', function () {
$(this).siblings('.panel-heading').removeClass('active');
});



</script>
</body>
</html>





























