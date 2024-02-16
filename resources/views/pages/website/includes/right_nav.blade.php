<div class="container">
    <h2>&nbsp;</h2>
    <!-- Trigger the modal with a button -->


    <!-- Modal right menu -->
    <div class="modal right fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title menu" style="float: left;">Menu</h4>


                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row ">

                        <ul class="nav flex-column nav-link tag " id="tagmenu">


                            <li class="nav-item  ">
                                <a class="nav-link" href="{{ route('website.home') }}"><i class="fa-solid fa-house"></i> <span
                                        class="forspacing"></span>Home</a>
                            </li>

                            <li class="nav-item  ">
                                <a class="nav-link" href="{{ route('website.checkout') }}"><i class="fa-solid fa-cart-plus"></i> <span
                                        class="forspacing"></span> Cart</a>
                            </li>


                            {{-- <li class="nav-item  ">
                                <a class="nav-link" href="{{ route('website.profile') }}"><i class="fa-regular fa-user"></i> <span
                                        class="forspacing"></span> My Profile</a>
                            </li> --}}

                            <li class="nav-item  ">
                                <!-- <a class="nav-link" href="#" ><i class="fa-regular fa-file-lines"></i> <span class="forspacing"></span> Shopping Info</a> -->
                                <div class="dropdown ">
                                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"> <i
                                            class="fa-regular fa-file-lines"></i> <span class="forspacing"></span>
                                        Shopping Info</a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('website.return.policy') }}" class="dropdown-item">Return & Refund</a>
                                        <a href="{{ route('website.policy.privacy') }}" class="dropdown-item">Privacy Policy</a>
                                        <a href="{{ route('website.term.condition') }}" class="dropdown-item">Terms & Condition</a>
                                    </div>
                                </div>

                            </li>


                            <li class="nav-item  ">
                                <a class="nav-link" href="{{ route('website.contact_us') }}"><i class="fa-regular fa-message"></i> <span
                                        class="forspacing"></span> Contact Us</a>
                            </li>






                        </ul>


                    </div>
                </div>
                <div class="modal-footer">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-center">© {{ date('Y') }} GINO GINELLES. All Rights Reserved.</p>
                            </div>

                            <div class="col-sm-12">
                                <p class="text-center">Shop powered by ....</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
