<style>
@media screen and (max-width: 767px) {
   tr {
    display: flex;
}
}
   
</style>
<div class="container">
    <!-- Modal -->
    <div class="modal right fade" id="myModalcart" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title menu" style="float: left;">Your Cart</h4>
                    <h4 class="modal-title menu" style="float: left;">
                        Total items: <span id="cart_model_total_item">0</span> </h4>
                    <!--<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >&times;</button>-->
                    <button type="button" class="close " data-dismiss="modal" >&times;</button>
                     
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-borderless table-responsive">
                                    <thead style="background-color: #f5f5f5;">
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart_model_items">
                                        <tr>
                                            <td class="w-50">
                                                <div class="img-withdesc"> <img src="{{ asset('assets/website/images/mainpagelogo.png') }}"
                                                        class="img-fluid w-25" alt="">
                                                    <div class="descr"> meethi puri <span
                                                            class="badge badge-secondary"><i
                                                                class="fa-solid fa-trash"></i> remove</span> </div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: top;">
                                                <div class="cart-mycart cart-mycart1">
                                                    <div class="minus" id="minus"><i class="fa-solid fa-circle-minus"
                                                            style="margin-right:5px"></i></div>
                                                    <div class="rate1">222</div>
                                                    <div class="plus"><i
                                                            class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="vertical-align: top; ">
                                                <div style="margin-top:15px">300</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container-fluid footer">
                        <div class="row g-1">
                            <div class="d-flex justify-content-between">
                            <div class="">Subtotal</div>
                            <div class=""><span id="cart_model_subtotal">0.00</span></div>
                            </div>
                            {{-- <div class="col-sm-6">Tip</div>
                            <div class="col-sm-6 float-end">0</div> --}}

                            <div class="d-flex justify-content-between">
                            <div class="">Delivery fee</div>
                            <div class="">to be calculated</div>
                            </div>
                            
                             <div class="d-flex justify-content-between">
                            <div class="">
                                <h4>Total</h4>
                            </div>
                            <div class="" >
                                <h4>Rs. <span id="cart_model_total">0.00</span></h4>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer1">
                    <div class="container-fluid footer">
                        <div class="row g-1">
                            <!--<div class="col-sm-12">-->
                            <!--    Checkout is currently unavailable as GINO GINELLES is closed and will open-->
                            <!--    at 11:00 am . Please return-->
                            <!--    at 11:00 am to place your order while we keep your items safely in the cart.</div>-->
                            <!--<p>please <strong> click here </strong> for our contact information
                            style="float:right; margin-left:20px"
                            </p>-->
                                    <a href="{{route('website.checkout')}}"  class="btn btn-danger " id="addtocart_btn">
                                    PROCEED TO CHECK OUT <span><i class=" fa-solid fa-arrow-right abc" ></i></span>
                                    </a>

                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>




