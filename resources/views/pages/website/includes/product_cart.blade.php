<div class="container">

    <!-- Trigger the modal with a button -->


    <!-- Modal pro click menu -->
    <div class="modal right fade" id="myModalprocliclcart" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title menu" style="float: left;"></h4>


                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row  p-3">

                        <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid w-50 " style="margin:auto">

                        <div class="namerate ">
                            <div class="name">chapati</div>
                            <div class="rate">Rs. 40</div>
                        </div>
                        <div class="mt-3 new2"></div>
                        <h5 class="mt-2">Special instructions</h5>
                        <small class="muted">Any specific preferences? Let us know.</small>
                        <div class="mt-2">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

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
                                <div class="cart-mycart">
                                    <div class="minus" ><i class="fa-solid fa-circle-minus"
                                            style="margin-right:5px"></i></div>
                                    <div class="rate">222</div>
                                    <div class="plus"><i class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"><button type="button" class="btn btn-danger" id="cartdangerbtn">ADD
                                    TO CART <span><i class="fa-solid fa-arrow-right abc" style="float:right"></i></span>
                                </button></div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>
