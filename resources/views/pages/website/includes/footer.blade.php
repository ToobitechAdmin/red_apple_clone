<div class="container-fluid footer1212">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div id="allright">
                <span class="text-white">© {{ date('Y') }} GINO GINELLES. All Rights Reserved.</span>
                </div>
            </div>
            <div class="col-sm-4">
            <div id="allrightimg">
                <span id="footerstrong" class="text-white text-center"> Shop powered by <img src="{{ asset('assets/website/images/mainpagelogo.png') }} " class="img-fluid w-25" id="footerimg"></span>
                </div>
            </div>
            <div class="col-sm-4">
            <div id="allrightmaster" >
            <span id="footerstrong" class="text-white"> Shop powered by <img src="{{ asset('assets/website/images/mastercard.png ') }} " class="img-fluid w-25" id="footerimg"> <img src="{{ asset('assets/website/images/visa.png') }} " class="img-fluid w-25" id="footerimg"></span>
            </div>
            </div>
        </div>
    </div>

    <a  class="whats-app" href={{ $whatappnumber??'' }} target="_blank">
    <i class="fa-brands fa-whatsapp my-float"></i>
        </a>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init();
</script>
