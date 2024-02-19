@extends('pages.website.layout.master')
@section('title', 'Home')
@section('style')
    <style>
        .schedul-upp {
            display: flex;
            justify-content: space-between;
            align-items: end;
        }

        button.btn.btn-secondary.btnsed {
            border-radius: 20px;
        }


        @media(max-width:992px) {
            .wrapper {
                width: 100%;
            }
        }

        .panel-heading {
            padding: 0;
            border: 0;
        }

        .panel-title>a,
        .panel-title>a:active {
            display: block;
            padding: 15px;
            color: #555;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            word-spacing: 3px;
            text-decoration: none;
        }

        .panel-heading a:before {
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
            border-radius: 5px;
        }
    </style>
@endsection
@section('content')
    @php
        // $cachedData = cache('cache-data');
        $cachedData = session()->get('cached-data');

    @endphp

    <div class="container-fluid cnt">

        <div class="row">
            <div class="col-md-4 mt-5">
                <div class="cntbgp text-center">
                    <img src="{{ asset('assets/website/images/mainpagelogo.png') }}" class="img-fluid cntimg">
                    <h5 class="pt-4">GINO GINELLES</h5>
                </div>

            </div>

            <div class="col-md-8 mt-5">
                <div class="cntbgp">
                    <span class="redheading">Phone Number</span>
                    <h5 class="pt-4 mb-4"> <i class="fa-solid fa-phone" id="cnticon"></i>
                        @if (isset($cachedData['area']->number))
                            {{ $cachedData['area']->number ?? '' }}
                        @endif
                        @if (isset($cachedData['branch']->number))
                            {{ $cachedData['branch']->number ?? '' }}
                        @endif

                    </h5>
                    <span class="redheading">Store Address </span>
                    <p>
                        @if (isset($cachedData['area']->address))
                            {{ $cachedData['area']->address ?? '' }}
                        @endif
                        @if (isset($cachedData['branch']->address))
                            {{ $cachedData['branch']->address ?? '' }}
                        @endif
                    </p>
                    <span class="redheading">Whatsapp Number </span>

                    <h5 class="pt-4 mb-4"> <i class="fa-brands fa-whatsapp" id="cntwgatsapp"></i>
                        @if (isset($cachedData['area']->number))
                            {{ $cachedData['area']->number ?? '' }}
                        @endif
                        @if (isset($cachedData['branch']->number))
                            {{ $cachedData['branch']->number ?? '' }}
                        @endif
                    </h5>


                    <div class="schedul-upp">
                        <div><span class="redheading">Store Timings </span></div>
                        <div><button type="button" class="btn btn-secondary btnsed"><span> {{$data['pickup_status']}}</span></button></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered mt-4 table align-middle">

                            <thead>
                                <tr class="text-center">
                                    @foreach ($data['pickup'] as $key => $pickup)
                                        <th scope="col">{{ $pickup->day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    @foreach ($data['pickup'] as $key => $pickup)
                                        <td>  {{ \Carbon\Carbon::parse($pickup->opening_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($pickup->closing_time)->format('g:i A') }}</td>
                                    @endforeach

                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="schedul-upp">
                        <div><span class="redheading">Delivery Timings</span></div>

                        <div><button type="button" class="btn btn-secondary btnsed"><span>{{$data['delivery_status'] }}</span></button></div>


                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered mt-4 table align-middle">
                            <thead>
                                <tr class="text-center">
                                    @foreach ($data['delivery'] as $key => $delivery)
                                        <th scope="col">{{ $delivery->day }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    @foreach ($data['delivery'] as $key => $delivery)
                                    <td>  {{ \Carbon\Carbon::parse($delivery->from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($delivery->to)->format('g:i A') }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>




                    @if ($cachedData['deliverytype'] == 'Delivery')
                    <span class="redheading mt-2">Delivery Locations </span>
                     @endif
                     @if ($cachedData['deliverytype'] == 'Pickup')
                    <span class="redheading mt-2">Pickup Locations </span>
                     @endif
                    @if ($cachedData['deliverytype'] == 'Delivery')

                    <div class="mt-2">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <strong style="font-size:18px">{{$data['myCity']->name}} </strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach ($data['myCity']->area as $key=>$area )
                                        <span class="badge " id="contact-bdge">
                                            {{$area->name}}
                                         </span>

                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endif
@if ($cachedData['deliverytype'] == 'Pickup')

<div class="mt-2">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                    aria-controls="flush-collapseOne">
                    <strong style="font-size:18px">{{$data['cityBranch']->name}} </strong>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse"
                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    @foreach ($data['cityBranch']->branch as $key=>$branch )
                    <span class="badge " id="contact-bdge">
                        {{$branch->name}}
                     </span>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endif
                    <div class="mt-4"></div>
                    <span class="redheading ">We also deliver to</span>

                  @foreach ($data['city'] as $key => $city)
    <div class="mt-2">
        <div class="accordion accordion-flush" id="accordionFlushExample2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading{{ $key }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $key }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $key }}">
                        <strong style="font-size:18px">{{ $city->name }}</strong>
                    </button>
                </h2>
                <div id="flush-collapse{{ $key }}" class="accordion-collapse collapse"
                     aria-labelledby="flush-heading{{ $key }}" data-bs-parent="#accordionFlushExample2">
                    <div class="accordion-body">
                        @foreach ($data['area']->where('city_id', $city->id) as $area)
                            <span class="badge" id="contact-badge">{{ $area->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
                    <div class="mt-2"></div>

                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".modal a").not(".dropdown-toggle").on("click", function() {
                $(".modal").modal("hide");
            });
        });

        $('.panel-collapse').on('show.bs.collapse', function() {
            $(this).siblings('.panel-heading').addClass('active');
        });

        $('.panel-collapse').on('hide.bs.collapse', function() {
            $(this).siblings('.panel-heading').removeClass('active');
        });
    </script>
@endsection
