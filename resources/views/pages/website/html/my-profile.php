

<?php include('section/header.php') ?>

<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
		<script src='https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js'></script>
   
  
 
    </header>
    <style>



        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap");


        body{
          height:100% !important;
          }
        input.form-control.border-danger {
        border: 1px solid;
        }
        input.form-control.border-danger {
            padding: 8px;
        }




input[type=search],
input[type=tel],
input[type=text],
input[type=email] {
  font-size: 1rem;
  border: 0;
  font-family: inherit;
  outline: none;
  color: inherit;
  margin: 0;
  padding: 0;
  width: auto;
  max-width: 100%;
}
input[type=search]::-webkit-input-placeholder,
input[type=tel]::-webkit-input-placeholder,
input[type=text]::-webkit-input-placeholder {
  font-weight: 300;
  color: #6b7280;
}
input[type=search]::-moz-placeholder,
input[type=tel]::-moz-placeholder,
input[type=text]::-moz-placeholder {
  font-weight: 300;
  color: #6b7280;
}
input[type=search]:-ms-input-placeholder,
input[type=tel]:-ms-input-placeholder,
input[type=text]:-ms-input-placeholder {
  font-weight: 300;
  color: #6b7280;
}
input[type=search]:-moz-placeholder,
input[type=tel]:-moz-placeholder,
input[type=text]:-moz-placeholder {
  font-weight: 300;
  color: #6b7280;
}

:root {
  --border-radius: 0.75em;
  --border-color: #c3c3c3;
  --border-color-active: #0047a5;
  --dropdown-border-color: #eaeaec;
  --dropdown-trigger-background-color: #f3f5f9;
  --dropdown-trigger-hover-background-color: #e6eaf1;
  --input-error-color: #ff0000;
  --input-label-color: #85898f;
  --input-prefix-color: #656b73;
  --input-phonenumber-color: #081627;
  --list-item-hover-background: #f3f5f9;
}

.pn-select {
  position: relative;
  border-width: 1px;
  border-style: solid;
  border-color: var(--border-color);
  display: grid;
  grid-template-columns: 4.5em 1fr;
  border-radius: var(--border-radius);
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
  transition: all 0.2s ease-out;
  /* max-width: 20em; */
  width: 100%;
  z-index: 1;
}
.pn-select:focus, .pn-select:focus-within {
  border-color: var(--border-color-active);
  box-shadow: 0 0 2px 0 var(--border-color-active);
}

.pn-dropdown {
  background: #ffffff;
  border-radius: var(--border-radius);
  border-width: 1px;
  border-style: solid;
  border-color: var(--dropdown-border-color);
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.135);
  opacity: 0;
  padding: 0 0.5em 0.5em;
  pointer-events: none;
  position: absolute;
  top: 140%;
  transform-origin: left top;
  transition: all 0.15s ease-out;
  width: 100%;
  z-index: 99999;
  visibility: hidden;
}
.pn-select--open .pn-dropdown {
  pointer-events: all;
  transform: none;
  opacity: 1;
  top: 120%;
  visibility: visible;
}

.pn-search {
  position: relative;
  display: flex;
  border-bottom-width: 1px;
  border-style: solid;
  border-color: var(--dropdown-border-color);
  margin-bottom: 0.5em;
}
.pn-search svg {
  display: block;
  height: 1.25rem;
  left: 0.5em;
  pointer-events: none;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 1.25rem;
}
.pn-search input[type=search] {
  padding-left: 2.5rem;
  height: 3rem;
  width: 100%;
}
.pn-search input[type=search]::-webkit-search-decoration, .pn-search input[type=search]::-webkit-search-cancel-button, .pn-search input[type=search]::-webkit-search-results-button, .pn-search input[type=search]::-webkit-search-results-decoration {
  display: none;
}

.pn-list {
  margin-right: -0.5em;
  max-height: 10.5em;
  overflow-y: auto;
  scrollbar-width: thin;
  scrollbar-color: #ffffff #ffffff;
  position: relative;
}
.pn-list::-webkit-scrollbar {
  width: 10px;
}
.pn-list:hover {
  --scrollbar-background: #ffffff;
  --thumb-background: #c0c4ca;
  scrollbar-color: var(--thumb-background) var(--scrollbar-background);
}
.pn-list:hover::-webkit-scrollbar-track {
  background: var(--scrollbar-background);
}
.pn-list:hover::-webkit-scrollbar-thumb {
  background-color: var(--thumb-background);
  border-radius: 6px;
  border: 3px solid var(--scrollbar-background);
}
.pn-list--no-scroll {
  margin-right: 0;
}

.pn-selected-prefix {
  align-items: center;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background: var(--dropdown-trigger-background-color);
  border-radius: var(--border-radius) 0 0 var(--border-radius);
  border: 0;
  cursor: pointer;
  display: flex;
  justify-content: center;
  margin: 0;
  outline: none;
  padding: 0;
  transition: background 0.2s ease-out;
}
.pn-selected-prefix:hover, .pn-selected-prefix:focus {
  background: var(--dropdown-trigger-hover-background-color);
}
.pn-selected-prefix__flag {
  height: auto;
  width: 1.25rem;
}
.pn-selected-prefix__icon {
  display: block;
  height: 1.25rem;
  margin-left: 0.5em;
  margin-right: -0.25em;
  transition: all 0.15s ease-out;
  width: 1.25rem;
}
.pn-select--open .pn-selected-prefix__icon {
  transform: rotate(180deg);
}

.pn-input {
  background: #ffffff;
  border-radius: 0 var(--border-radius) var(--border-radius) 0;
  line-height: 1;
  overflow: hidden;
  padding: 0.5em 1em;
}
.pn-input__container {
  display: flex;
  flex-direction: row;
}
.pn-input__label {
  color: var(--input-label-color);
  font-size: 0.7rem;
  position: relative;
  top: -0.25em;
}
.pn-input__error {
  bottom: 0;
  color: var(--input-error-color);
  font-size: 0.785rem;
  left: 0;
  opacity: 0;
  pointer-events: none;
  position: absolute;
  transition: all 0.2s ease-out;
  z-index: -1;
}
.pn-input input[type=text] {
  background: transparent;
  position: absolute;
  color: var(--input-prefix-color);
  max-width: 3rem;
  pointer-events: none;
}
.pn-input input[type=tel] {
  color: var(--input-phonenumber-color);
  padding-left: calc(calc(var(--prefix-length) * 1ch) + 1.5ch);
  font-weight: 500;
}
.pn-input input[type=tel]:not(:-moz-placeholder-shown):invalid + .pn-input__error {
  opacity: 1;
  transform: translateY(175%);
}
.pn-input input[type=tel]:not(:-ms-input-placeholder):invalid + .pn-input__error {
  opacity: 1;
  transform: translateY(175%);
}
.pn-input input[type=tel]:not(:placeholder-shown):invalid + .pn-input__error {
  opacity: 1;
  transform: translateY(175%);
}

.pn-list-item {
  align-items: center;
  border-radius: 0.5em;
  display: flex;
  font-weight: 400;
  padding: 0.6em 0.75em;
  transition: background-color 0.2s ease-out;
  cursor: pointer;
  outline: none;
}
.pn-list-item__flag {
  width: 1.25em;
  height: auto;
  margin-right: 1em;
  display: block;
}
.pn-list-item__country {
  margin-right: 0.25em;
}
.pn-list-item:hover, .pn-list-item:focus {
  background-color: var(--list-item-hover-background);
}
.pn-list-item--selected {
  pointer-events: none;
  font-weight: 500;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23103155' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
  background-position: right 0.75em top 50%;
  background-repeat: no-repeat;
  background-size: 1.25rem;
  background-position: right 0.75em top 50%;
}
.pn-list-item--no-results {
  pointer-events: none;
}

.dribble-creds {
  bottom: 2em;
  font-size: 0.875rem;
  left: 0;
  position: fixed;
  right: 0;
  text-align: center;
}
.dribble-creds a {
  color: #ea4c89;
  text-decoration: underline;
}

.panel-body {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.cart-mycart {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
}
    </style>
		

   

        <div class="container-fluid profile">
            <div class="row">
                <div class="col-md-12">


                    <div class="checkout-col">
                        <div class="mb-4"><span class="cart-header">Enter Mobile Number</span></div>
                        <div class="pn-select" id="js_pn-select" style="--prefix-length: 2;">
                            <!-- Selected prefix -->
                            <button class="pn-selected-prefix" aria-label="Select phonenumber prefix" id="js_trigger-dropdown" tabindex="1">
                                <img class="pn-selected-prefix__flag" id="js_selected-flag" src="https://flagpedia.net/data/flags/icon/36x27/nl.png" />
                                <!-- prettier-ignore -->
                                <svg class="pn-selected-prefix__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#081626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                            </button>
                            <!-- Phone number input -->
                            <div class="pn-input">
                                <label class="pn-input__label">Phonenumber*</label>
                                <div class="pn-input__container">
                                    <input class="pn-input__prefix" value="+31" type="text" name="phonenumber-prefix" id="js_number-prefix" tabindex="-1" />
                                    <input class="pn-input__phonenumber" id="js_input-phonenumber" type="tel" name="phonenumber" pattern="\d*" value="" placeholder=" " autocomplete="nope" required max="10" tabindex="0" />
                                    <small class="pn-input__error">
                                        This is not a valid phone number
                                    </small>
                                </div>
                            </div>
                            <!-- Dropdown -->
                            <div class="pn-dropdown" id="js_dropdown">
                                <div class="pn-search">
                                    <!-- prettier-ignore -->
                                    <svg class="pn-search__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#103155" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                    <input placeholder="Search for countries" class="pn-search__input search" type="search" id="js_search-input" autocomplete="nope" />
                                </div>
                                <!-- Country list -->
                                <ul class="pn-list list" id="js_list"></ul>
                                <div class="pn-list-item pn-list-item--no-results" style="display: none;" id="js_no-results-found">
                                    No results found
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="otpp" id="">
                        <div class="container height-100 d-flex justify-content-center align-items-center">
                            <div class="position-relative">
                                <div class="text-center"><i class="fa-solid fa-arrow-left" id="backkk"></i><span style="margin-left:20px"> <strong> Enter your Chikoo pin</strong> </span></div>
                                <div class="cardddd p-2 text-center">
                                    <h6>Please enter the one time password <br> to verify your account</h6>
                                    <div> <span>A code has been sent to</span> <small>*******9897</small> </div>
                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />   </div>
                                    <div class="mt-4"> <button class="btn btn-secondary px-4 validate" id="login">Login</button> </div>
                                    <div class="mt-4"> <button class="btn btn-danger px-4 validate"id="forget" >Forget</button> </div>
                                </div>
                            </div>
                            </div>
                    </div>


                    <div class="forget" id="">
                        <div class="container height-100 d-flex justify-content-center align-items-center">
                            <div class="position-relative">
                               
                                <div class="cardddd p-2 text-center">
                                <h5 class="text-center">Reset Password</h5>

                                <h5 class="text-center">+0000000000000000</h5>
                                    <h6 class="text-center">We have sent you an OTP. Verify the OTP and retrieve your name, <br>address and payment details for a quick checkout.</h6>
                                   
                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" /></div>

                                  <h5> <strong> Couldn’t verify the OTP? </strong></h5>
                                  <button class="btn btn-secondary" disabled>Limit exceeded for SMS retries.</button> <span><Strong> Or </Strong></span> <span> <strong>Request a Call</strong> </span>

                                    <div class="mt-4"> <button class="btn btn-secondary px-4 validate">Reset Pin</button> </div>
                                    <div class="mt-4"> <button class="btn btn-danger px-4 validate" id="backtologin">Back Login</button> </div>
                                </div>
                            </div>
                            </div>
                    </div>














                </div>
            </div>
        </div>



















       

            <!--model  for Man Menu ---->
            <?php include('section/right-nav.php') ?>
                        <!---Model right menu---->


                         <!--model  for Man Menu ---->
            <?php include('section/preloader.php') ?>
                        <!---Model right menu---->


            <!--Model Cart---->
            <?php include('section/cart.php') ?>
            <!--Model Cart---->
            <?php include('section/footer.php') ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
	<script src="js/script.js"></script>
	<script>
	
$(document).ready(function(){
    $(".otpp").hide();
    $('.forget').hide();
});
$(document).on("keypress", "#js_input-phonenumber", function(e) {
     if (e.which == 13) {
        $(".otpp").show();
        $(".checkout-col").hide();
        
     }

     $('#backkk').click(function(){
   
        $(".otpp").hide();
        $(".checkout-col").show();
     })
     $('#forget').click(function(){
      $('.forget').show();
      $(".otpp").hide();
     })
     $('#backtologin').click(function(){
      $('.forget').hide();
      $(".otpp").hide();
      $('.checkout-col').show();
     })
     $('#login').click(function(){
      window.open("home.php","_self");

     });
});

	  $ (document).ready (function () {
	$ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	
	
	});

	
});



  $(function () {
        $('#datetimepicker').datetimepicker();
    });

init(countries);
wow = new WOW(
		{
		boxClass:     'wow',      // default
		animateClass: 'animated', // default
		offset:       0,          // default
		mobile:       true,       // default
		live:         true        // default
	  }
	  )
	  wow.init();
	</script>
  </body>
</html>