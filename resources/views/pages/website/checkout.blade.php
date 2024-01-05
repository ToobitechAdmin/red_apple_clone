@extends('pages.website.layout.master')
@section('title', 'Cart')
@section('style')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap");

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

        .pn-select:focus,
        .pn-select:focus-within {
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

        .pn-search input[type=search]::-webkit-search-decoration,
        .pn-search input[type=search]::-webkit-search-cancel-button,
        .pn-search input[type=search]::-webkit-search-results-button,
        .pn-search input[type=search]::-webkit-search-results-decoration {
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

        .pn-selected-prefix:hover,
        .pn-selected-prefix:focus {
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

        .pn-input input[type=tel]:not(:-moz-placeholder-shown):invalid+.pn-input__error {
            opacity: 1;
            transform: translateY(175%);
        }

        .pn-input input[type=tel]:not(:-ms-input-placeholder):invalid+.pn-input__error {
            opacity: 1;
            transform: translateY(175%);
        }

        .pn-input input[type=tel]:not(:placeholder-shown):invalid+.pn-input__error {
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

        .pn-list-item:hover,
        .pn-list-item:focus {
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

        .hidden {
            display: none;
        }
    </style>
@endsection
@section('content')
    @php
        $cachedData = cache('cache-data');

    @endphp
    <div class="container-fluid checkout">
        <div class="row ">
            <div class="col-md-8  mt-4">

                <div class="checkout-col">
                    <div class="mb-4"><i class="fa-solid fa-phone-volume" id="iconn-cart"></i> <span
                            class="cart-header">Contact Information</span></div>
                    <div class="pn-select" id="js_pn-select" style="--prefix-length: 2;">
                        <!-- Selected prefix -->
                        <button class="pn-selected-prefix" aria-label="Select phonenumber prefix" id="js_trigger-dropdown"
                            tabindex="1">
                            <img class="pn-selected-prefix__flag" id="js_selected-flag"
                                src="https://flagpedia.net/data/flags/icon/36x27/pk.png" alt="Pakistani Flag" />

                            <!-- prettier-ignore -->
                        <svg class="pn-selected-prefix__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#081626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <!-- Phone number input -->
                        <div class="pn-input">
                            <label class="pn-input__label">Phonenumber*</label>
                            <div class="pn-input__container">
                                <input class="pn-input__prefix" value="+92" type="text" name="phonenumber-prefix"
                                    id="js_number-prefix" tabindex="-1" />
                                <input class="pn-input__phonenumber" id="js_input-phonenumber" type="tel"
                                    name="phonenumber" pattern="\d*" value="" placeholder=" " autocomplete="nope"
                                    required max="10" tabindex="0" />
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
                                <input placeholder="Search for countries" class="pn-search__input search" type="search"
                                    id="js_search-input" autocomplete="nope" />
                            </div>
                            <!-- Country list -->
                            <ul class="pn-list list" id="js_list"></ul>
                            <div class="pn-list-item pn-list-item--no-results" style="display: none;"
                                id="js_no-results-found">
                                No results found
                            </div>
                        </div>
                    </div>
                    <div id="hiddenFields" class="hidden">
                        <div class="mt-4"><i class="fa-solid fa-location-dot" id="iconn-cart"></i> <span
                                class="cart-header">Customer Information</span></div>

                        <form id="checkoutform">
                            <div class="mb-3 mt-4">
                                <input type="text" class="form-control fullName" id="field"
                                    aria-describedby="emailHelp" placeholder="Full Name *" />
                            </div>

                            <div class="mt-4">
                                <input type="email" class="form-control email" id="field" aria-describedby="emailHelp"
                                    placeholder="Email *" />
                            </div>
                        </form>
                        <p class="pt-4" id="pppp">Order Type</p>
                        <button type="button" class="btn btn-labeled btn-successs">
                            <span class="btn-label"><i class="fa-solid fa-truck" id="iconn-cart"></i></span> <span
                                id="orderType"> {{ $cachedData['deliverytype'] ?? '' }}</span>
                        </button>
                        {{-- <p class="pt-4" id="pppp">Order Type</p>
                        <button type="button" class="btn btn-labeled btn-successs">
                            <span class="btn-label"><i class="fa-solid fa-truck" id="iconn-cart"></i></span> <span
                                id="sucessbtn">Success </span>
                        </button>

                        <p class="pt-4">Delivery hours for Tuesday:<strong> 11:00 am - 12:00 am </strong></p> --}}

                        {{-- <p class="pt-3">Delivery is closed right now. You can schedule your delivery for a time of your
                            choice from the available schedule below.</p> --}}



                        {{-- <div class="table-responsive">
                            <table class="table table-bordered mt-4 table align-middle">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Mon</th>
                                        <th scope="col">Tue</th>
                                        <th scope="col">Wed</th>
                                        <th scope="col">Thu</th>
                                        <th scope="col">Fri</th>
                                        <th scope="col">Sat</th>
                                        <th scope="col">Sun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>11:00 am - 12:00 am</td>
                                        <td>11:00 am - 12:00 am</td>
                                        <td>11:00 am - 12:00 am</td>
                                        <td>11:00 am - 12:00 am</td>
                                        <td>11:00 am - 12:00 am</td>
                                        <td>11:00 am - 12:00 am</td>
                                        <td>11:00 am - 12:00 am</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div class="form-group">
                            <label for="datetimepicker">Select Date and Time:</label>
                            <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                <input type="datetime-local" class="form-control datetimepicker-input" id="datetime-time"
                                    data-target="#datetimepicker" />
                                <div class="input-group-append" data-target="#datetimepicker"
                                    data-toggle="datetimepicker">
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="faq-container mt-4">
                            <div class="firsttab">
                                <div class="faq-question">
                                    <div class="col-12 col-md-6 mb-4 mb-lg-0">
                                        <div class="d-flex px-3">
                                            <div>
                                                <div class="icon icon-sm icon-secondary">
                                                    <span class="fa-solid fa-clock"></span>
                                                </div>
                                            </div>
                                            <div class="ps-4">
                                                <h3 class="h333">Deliver ASAP</h3>
                                                <span class="iconspan">Deliver ASAP</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    <div class="d-flex px-3">
                                        <div>
                                            <div class="icon icon-sm icon-secondary">
                                                <span class="fa-solid fa-truck"></span>
                                            </div>
                                        </div>
                                        <div class="ps-4">
                                            <h3 class="h333">Deliver Later Today</h3>
                                            <span class="iconspan">Book the order, deliver it later</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                            </div>
                            <div class="faq-answer">
                                <div class="form-group">
                                    <label for="datetimepicker">Select Date and Time:</label>
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input type="time" class="form-control datetimepicker-input"
                                            id="datetime-time" data-target="#datetimepicker" />
                                        <div class="input-group-append" data-target="#datetimepicker"
                                            data-toggle="datetimepicker"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    <div class="d-flex px-3">
                                        <div>
                                            <div class="icon icon-sm icon-secondary">
                                                <span class="fa-solid fa-calendar"></span>
                                            </div>
                                        </div>
                                        <div class="ps-4">
                                            <h3 class="h333">Deliver Much Later</h3>
                                            <span class="iconspan">Book delivery for a specific date.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="icon-container"><i class="fas fa-chevron-right"></i></div>
                            </div>
                            <div class="faq-answer">
                                <div class="form-group">
                                    <label for="datetimepicker">Select Date and Time:</label>
                                    <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                        <input type="datetime-local" class="form-control datetimepicker-input"
                                            id="datetime-time" data-target="#datetimepicker" />
                                        <div class="input-group-append" data-target="#datetimepicker"
                                            data-toggle="datetimepicker"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        @if ($cachedData['deliverytype'] == 'Delivery')
                            <p class="mt-2">Delivery Address</p>
                        @else
                            <p class="mt-2">Pickup Location</p>
                        @endif

                        @if ($cachedData['deliverytype'] == 'Delivery')
                            <div class="form-group">
                                <input type="text" class="form-control address" id="field"
                                    placeholder="Complete Delivery Address *"
                                    value=" {{ $cachedData['area']->address ?? '' }}" />

                            </div>


                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <input list="city" id="city" name="fruits" required placeholder="City *"
                                        value="{{ $cachedData['area']->city->name ?? '' }}" />

                                </div>

                                <div class="col-md-8 mt-4">
                                    <input list="area" id="area" name="fruits" required placeholder="Area *"
                                        value=" {{ $cachedData['area']->name ?? '' }}" />

                                </div>

                                <dl id="country-select" class="dropdown mt-4">
                                    <dt>
                                        <a href="javascript:void(0);">
                                            <span><span
                                                    style="background-position: 0px -2035px;"></span><span>Pakistan</span><span>+92</span></span>
                                        </a>
                                    </dt>
                                    <dd>
                                        <ul style="display: none;">
                                            <li>
                                                <a cunt_code="+92" href="javascript:void(0);"><span
                                                        style="background-position: 0px -2035px;"></span><span>Pakistan</span><span>+92</span></a>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        @endif

                        @if ($cachedData['deliverytype'] == 'Pickup')
                            <div id="google-map" style="height: 200px; width: 100%;"></div>

                            <div class="form-group">
                                <input type="text" class="form-control address" id="field"
                                    placeholder="Complete Pickup Address *"
                                    value="{{ $cachedData['branch']->address ?? '' }}" hidden />
                            </div>


                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    {{-- <input list="city" id="city" name="fruits" required placeholder="City *"
                                        value="{{ $cachedData['area']->city->name ?? '' }}" /> --}}

                                </div>

                                <div class="col-md-8 mt-4">
                                    {{-- <input list="area" id="area" name="fruits" required placeholder="Area *"
                                        value=" {{ $cachedData['area']->name ?? '' }}" /> --}}

                                </div>

                                <dl id="country-select" class="dropdown mt-4">
                                    <dt>
                                        <a href="javascript:void(0);">
                                            <span><span
                                                    style="background-position: 0px -2035px;"></span><span>Pakistan</span><span>+92</span></span>
                                        </a>
                                    </dt>
                                    <dd>
                                        <ul style="display: none;">
                                            <li>
                                                <a cunt_code="+92" href="javascript:void(0);"><span
                                                        style="background-position: 0px -2035px;"></span><span>Pakistan</span><span>+92</span></a>
                                            </li>
                                        </ul>
                                    </dd>
                                </dl>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="col-md-12  col-lg-4  ">
                <div class="row">
                    <div class="col-12 mt-4">
                        <div class="rightcolbgcolor">
                            <div class="container">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a style="text-decoration: none;" role="button" class="rightaccor"
                                                    data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="fa-solid fa-cart-shopping" id="iconn-cart"></i><span
                                                        id="" class="cart-header">My Cart(<span
                                                            id="cart_total_item">1</span> items)</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in cart_items"
                                            role="tabpanel" aria-labelledby="headingOne">


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="rightcolbgcolor">
                                    <div class="container">
                                        <div class="panel-group" id="accordion12" role="tablist"
                                            aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a style="text-decoration: none;" role="button"
                                                            class="rightaccor" data-toggle="collapse"
                                                            data-parent="#accordion12" href="#collapseOne2"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <i class="fa-solid fa-cart-shopping" id="iconn-cart"></i><span
                                                                class="cart-header">Total Rs
                                                                <span id="cart_total1">100</span></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne2" class="panel-collapse collapse show"
                                                    role="tabpanel" aria-labelledby="headingOne">


                                                    <!---- nested accorditon--->

                                                    <div class="accordion border" id="accordionExample">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button " type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseOne123" aria-expanded="true"
                                                                    aria-controls="collapseOne">
                                                                    <h2 id="vochercode"> Do you have a voucher code ?</h2>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne123" class="accordion-collapse collapse"
                                                                aria-labelledby="headingOne"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="contenir mb-3">

                                                                        <input type="text" class="search"
                                                                            id="search-inp" placeholder="Enter Code">

                                                                        <button class="search-btn"
                                                                            id="search-inp-btn">&#x027A4;</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="forhr"></div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseTwo" aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    <h2 id="vochercode"> Feel good? How about a tip </h2>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                                aria-labelledby="headingTwo"
                                                                data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <span class="badge bg-danger ab">25</span> <span
                                                                        class="badge bg-danger ab">50</span> <span
                                                                        class="badge bg-danger ab">75</span> <span
                                                                        class="badge bg-danger ab">100</span> <span
                                                                        class="badge bg-danger ab">other</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="forhr mt-2"></div>

                                                    <!---- close--->


                                                    <h2 id="vochercode" class="vocher"> <i
                                                            class="fa-solid fa-cart-arrow-down" id="iconn-cart"
                                                            style="margin-right:10px"></i> Price Summary</h2>

                                                    <div class="subtotal-cart mt-3">
                                                        <div class="left-text">Subtotal</div>
                                                        <div class="right-text">Rs. <span id="cart_subtotal">200</span>
                                                        </div>
                                                    </div>

                                                    <div class="subtotal-cart">
                                                        <div class="left-text">Tip</div>
                                                        <div class="right-text">00</div>
                                                    </div>

                                                    <div class="subtotal-cart">
                                                        <div class="left-text">Delivery fee</div>
                                                        <div class="right-text">to be calculated</div>
                                                    </div>

                                                    <div class="subtotal-cart">
                                                        <div class="left-textstrong"><strong>Total </strong></div>
                                                        <div class="left-textstrong"><strong>Rs. <span
                                                                    id="cart_total"></span></strong></div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="rightcolbgcolor">


                                    <div class="container">
                                        <div class="panel-group" id="accordion12" role="tablist"
                                            aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">

                                                        <i class="fa-solid fa-money-bill" id="iconn-cart"></i><span
                                                            class="cart-header">Payment Methods</span>
                                                        </a>
                                                    </h4>


                                                    <p>
                                                        <a class="btn" style="background:#ee6826;color:white"
                                                            id="cashOnDeliveryButton" data-bs-toggle="collapse"
                                                            href="" role="button">
                                                            <span style=" font-size:20px;font-weight:bold"> Cash On
                                                                Delivery</span>
                                                        </a>
                                                        <br>
                                                        {{-- <a class="btn btn-danger" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseExample" aria-expanded="false"
                                                            aria-controls="collapseExample">
                                                            <span style="font-size:20px;font-weight:bold"> Cash On
                                                                Delivery</span>
                                                        </a> --}}
                                                    </p>

                                                    {{-- <div class="collapse" id="collapseExample">
                                                        <div class="card card-body">


                                                            <form>

                                                                <div class="form-group g-2">

                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" placeholder="Card Number">
                                                                </div>

                                                                <div class="form-group mt-3">

                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" placeholder="Name">
                                                                </div>


                                                                <div class="form-group mt-3">

                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" placeholder="CVC">
                                                                </div>

                                                                <div class="form-group mt-3">

                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" placeholder="MM / YY">
                                                                </div>


                                                                <div class="mt-4">
                                                                    <button type="submit"
                                                                        class="btn btn-secondary btn-lg btn-block aa">Place
                                                                        Order</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function getCart1() {

            $.ajax({
                type: "get",
                url: "{{ route('website.cart') }}",
                data: {
                    type: type
                },
                success: function(response) {

                    var html;
                    var items = response.cart.item;
                    $('#cart_total_item').text(response.cart['total_item']);
                    $('#cart_subtotal').text(response.cart['subtotal']);
                    $('#cart_total').text(response.cart['total']);
                    $('#cart_total1').text(response.cart['total']);
                    $(".cart_items").html('');

                    for (const key in items) {
                        if (items.hasOwnProperty(key)) {
                            const element = items[key];
                            console.log('item===>>>>', element.name);
                            html += `<div class="panel-body">
                                        <div class="descr"> ${element.name}<span class="badge badge-secondary"><i
                                                    class="fa-solid fa-trash"></i> remove</span> </div>
                                        <div class="cart-mycart">
                                            <div class="minus"><i class="fa-solid fa-circle-minus"
                                                    style="margin-right:5px"></i></div>
                                            <div class="rate">${element.quantity}</div>
                                            <div class="plus"><i
                                                    class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                                            </div>
                                        </div>
                                        <div class="price-cart">${element.price}</div>

                                    </div>`
                            // html += `<tr data-product-id=${element.id}>
                        //         <td class=" w-50">
                        //             <div class="img-withdesc"> <img src="{{ asset('${element.attributes.image}') }}"
                        //                     class="img-fluid w-25" alt="">
                        //                 <div class="descr"> ${element.name}  </div>
                        //             </div>
                        //         </td>
                        //         <td style="vertical-align: top;">
                        //             <div class="cart-mycart cart-mycart1">
                        //                 <div class="minus"><i class="fa-solid fa-circle-minus"
                        //                         style="margin-right:5px"></i></div>
                        //                 <div class="rate1">${element.quantity}</div>
                        //                 <div class="plus"><i
                        //                         class="fa-solid fa-circle-plus"style="margin-left:5px"></i>
                        //                 </div>
                        //             </div>
                        //         </td>
                        //         <td style="vertical-align: top; ">
                        //             <div style="margin-top:15px">${element.price}</div>
                        //         </td>

                        //         <td style="vertical-align: top; ">
                        //             <div style="margin-top:15px"><span
                        //                         class="badge badge-secondary"><i
                        //                             class="fa-solid fa-trash"></i> remove</span></div>
                        //         </td>

                        //     </tr> `
                        }
                    }

                    $(".cart_items").html(html);
                }
            });


        }

        $(document).ready(function() {
            getCart1()
        });
        $(function() {
            $('#datetimepicker').datetimepicker();
        });

        init(countries);
        wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: true, // default
            live: true // default
        })
        wow.init();
    </script>
    <script>
        document.getElementById('js_input-phonenumber').addEventListener('input', function() {
            validatePhoneNumber();
        });

        function validatePhoneNumber() {
            var phoneNumberInput = document.getElementById('js_input-phonenumber');
            var phoneNumber = phoneNumberInput.value;
            var hiddenFields = document.getElementById("hiddenFields");

            // Regular expression for a Pakistani phone number
            var pakistanPhoneNumberRegex = /^3\d{9}$/;

            console.log('Entered phone number:', phoneNumber);

            // Check if the entered number starts with '3'
            if (phoneNumber.startsWith('3')) {
                // If it does, automatically add '+92'
                var phoneNumber = '+92' + phoneNumberInput.value;
                console.log(phoneNumber);
            }

            // Validate using the regular expression
            if (!pakistanPhoneNumberRegex.test(phoneNumberInput.value)) {
                hiddenFields.classList.add("hidden");

                // Invalid phone number
                console.log('Invalid phone number');

                // Set custom validity message
                phoneNumberInput.setCustomValidity('This is not a valid Pakistani phone number');
            } else {
                hiddenFields.classList.remove("hidden");

                console.log('Valid Pakistani phone number');
                phoneNumberInput.setCustomValidity('');
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        document.getElementById('cashOnDeliveryButton').addEventListener('click', submitForm);

        function submitForm() {
            var phoneNumber = $('#js_input-phonenumber').val();
            var fullName = $('.fullName').val();
            var email = $('.email').val();
            var address = $('.address').val();
            var city = $('#city').val();
            var area = $('#area').val();

            var orderTypes = $('#orderType').text();



            // Send the form data to the Laravel backend using AJAX
            $.ajax({
                url: "{{ route('website.order') }}", // Specify the Laravel route
                type: 'POST',
                dataType: 'json',
                data: {
                    phone_number: phoneNumber,
                    full_name: fullName,
                    email: email,
                    address: address,
                    city: city,
                    area: area,
                    order_type: orderTypes,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Handle success if needed

                    //getCart('model')
                    if(response.message=="success"){
                        toastr.success(response.message);
                     window.location.href =
                        "{{ route('website.home') }}";
                    }else{
                        toastr.error(response.message);
                    }
                },
                error: function(error) {
                    // Handle error if needed
                    toastr.error(response.message);
                }
            });
        }
    </script>

    <script>
        // Function to initialize Google Map
        function initMap() {
            // Get the address from the input field
            var address = $('.address').val();

            // Create a geocoder to convert address to LatLng
            var geocoder = new google.maps.Geocoder();

            // Get the map element
            var mapElement = document.getElementById('google-map');

            // Set default coordinates (e.g., a central location)
            var defaultLatLng = {
                lat: 0,
                lng: 0
            };

            // Create a map with default coordinates
            var map = new google.maps.Map(mapElement, {
                zoom: 15,
                center: defaultLatLng
            });

            // If address is available, use geocoder to get LatLng and update map
            if (address) {
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status === 'OK') {
                        var location = results[0].geometry.location;

                        // Set center and add a marker at the location
                        map.setCenter(location);

                        var marker = new google.maps.Marker({
                            map: map,
                            position: location,
                            title: address
                        });

                        // Add an info window with the address text
                        var infowindow = new google.maps.InfoWindow({
                            content: '<strong>' + address + '</strong>'
                        });

                        // Open the info window when the marker is clicked
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    } else {
                        console.error('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        }

        // Load the Google Maps JavaScript API
        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src =
                'https://maps.googleapis.com/maps/api/js?key=AIzaSyCeeUZJDwiG1wIrvzJ2Lxmhn2zcoGPWXKQ&callback=initMap';
            document.body.appendChild(script);
        }

        // Call the loadScript function to load the API
        loadScript();
    </script>

@endsection
