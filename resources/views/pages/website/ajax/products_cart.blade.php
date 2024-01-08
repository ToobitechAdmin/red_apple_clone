@if (isset($data))

    @foreach ($data as $item)

        <div class="container-fluid bodybanner" id="onlineexc{{ $item->id }}{{ $item->name }}">
            <div class="row" id="chatbazar">
                <div class="col-12" data-aos="zoom-in" data-aos-duration="500">
                    <h1>{{ $item->name??'' }}</h1>
                </div>
            </div>
        </div>
        <div class="container-fluid menu">
            <div class="">
                <div class="row g-4" data-aos="fade-up" data-aos-duration="1000">

                    @foreach ($item->products as $product)

                        <div class="col-12 col-md-6 col-lg-4" data-toggle="modal" onclick="productDetails({{ json_encode($product) }})"
                            data-target="#myModalmoreproduct-deltails">
                            <div class="item">
                                <div class="row">
                                    <div class="col-6 col-md-6">
                                        <div><span>{{ $product->name??'' }}</span></div>
                                        <div class="bottem-text">Rs<span>{{ $product->price??'' }}</span></div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <img src="{{ asset($product->image) }}"
                                            class="img-fluid w-50" id="menuimg" srcset="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    @endforeach
@endif

<!----body banner menu---->
