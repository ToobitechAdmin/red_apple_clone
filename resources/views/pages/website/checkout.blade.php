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
    </style>
@endsection
@section('content')
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
                                src="https://flagpedia.net/data/flags/icon/36x27/nl.png" />
                            <!-- prettier-ignore -->
                        <svg class="pn-selected-prefix__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#081626" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <!-- Phone number input -->
                        <div class="pn-input">
                            <label class="pn-input__label">Phonenumber*</label>
                            <div class="pn-input__container">
                                <input class="pn-input__prefix" value="+31" type="text" name="phonenumber-prefix"
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

                    <div class="mt-4"><i class="fa-solid fa-location-dot" id="iconn-cart"></i> <span
                            class="cart-header">Customer Information</span></div>

                    <form id="checkoutform">
                        <div class="mb-3 mt-4">
                            <input type="text" class="form-control" id="field" aria-describedby="emailHelp"
                                placeholder="Full Name *" />
                        </div>

                        <div class="mt-4">
                            <input type="email" class="form-control" id="field" aria-describedby="emailHelp"
                                placeholder="Email *" />
                        </div>
                    </form>

                    <p class="pt-4" id="pppp">Order Type</p>
                    <button type="button" class="btn btn-labeled btn-successs">
                        <span class="btn-label"><i class="fa-solid fa-truck" id="iconn-cart"></i></span> <span
                            id="sucessbtn">Success </span>
                    </button>

                    <p class="pt-4">Delivery hours for Tuesday:<strong> 11:00 am - 12:00 am </strong></p>

                    <p class="pt-3">Delivery is closed right now. You can schedule your delivery for a time of your
                        choice from the available schedule below.</p>



                    <div class="table-responsive">
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
                            <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                            </div>
                        </div>
                    </div>

                    <div class="faq-container mt-4">
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
                                    <input type="time" class="form-control datetimepicker-input" id="datetime-time"
                                        data-target="#datetimepicker" />
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
                    </div>

                    <p class="mt-2">Delivery Address</p>

                    <div class="form-group">
                        <input type="text" class="form-control" id="inputAddress"
                            placeholder="Complete Delivery Address *" />
                    </div>

                    <div class="row">
                        <div class="col-md-4 mt-4">
                            <input list="city" id="fruits" name="fruits" required placeholder="City *" />
                            <datalist id="city">
                                <option value="Karachi"> </option>
                                <option value="Lahore"> </option>
                                <option value="Islamabad"> </option>
                                <option value="Peshawar"> </option>
                                <option value="Swat"> </option>
                            </datalist>
                        </div>

                        <div class="col-md-8 mt-4">
                            <input list="area" id="fruits" name="fruits" required placeholder="Area *" />
                            <datalist id="area">
                                <option value="Jiddah"> </option>
                                <option value="Baharia Town"> </option>
                                <option value="Defance"> </option>
                                <option value="Civic Center"> </option>
                                <option value="DHA"> </option>
                            </datalist>
                        </div>

                        <dl id="country-select" class="dropdown mt-4">
                            <dt>
                                <a href="javascript:void(0);">
                                    <span><span
                                            style="background-position: 0px -1694px;"></span><span>India</span><span>+91</span></span>
                                </a>
                            </dt>
                            <dd>
                                <ul style="display: none;">
                                    <li>
                                        <a cunt_code="+91" href="javascript:void(0);"><span
                                                style="background-position: 0px -1694px;"></span><span>India</span><span>+91</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="" href="javascript:void(0);"><span
                                                style="background-position: 0px -1694px;"></span><span>India-Tollfree</span><span></span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1" href="javascript:void(0);"><span
                                                style="background-position: 0px -44px;"></span><span>United
                                                States</span><span>+1</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+93" href="javascript:void(0);"><span
                                                style="background-position: 0px -2311px;"></span><span>Afghanistan</span><span>+93</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+355" href="javascript:void(0);"><span
                                                style="background-position: 0px -1034px;"></span><span>Albania</span><span>+355</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+213" href="javascript:void(0);"><span
                                                style="background-position: 0px -528px;"></span><span>Algeria</span><span>+213</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1684" href="javascript:void(0);"><span
                                                style="background-position: 0px -1562px;"></span><span>American
                                                Samoa</span><span>+1684</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+376" href="javascript:void(0);"><span
                                                style="background-position: 0px -594px;"></span><span>Andorra</span><span>+376</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+244" href="javascript:void(0);"><span
                                                style="background-position: 0px -1947px;"></span><span>Angola</span><span>+244</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1264" href="javascript:void(0);"><span
                                                style="background-position: 0px -1980px;"></span><span>Anguilla</span><span>+1264</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1268" href="javascript:void(0);"><span
                                                style="background-position: 0px -869px;"></span><span>Antigua and
                                                Barbuda</span><span>+1268</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+54" href="javascript:void(0);"><span
                                                style="background-position: 0px -2377px;"></span><span>Argentina</span><span>+54</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+374" href="javascript:void(0);"><span
                                                style="background-position: 0px -176px;"></span><span>Armenia</span><span>+374</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+297" href="javascript:void(0);"><span
                                                style="background-position: 0px -792px;"></span><span>Aruba</span><span>+297</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+247" href="javascript:void(0);"><span
                                                style="background-position: 0px -55px;"></span><span>Ascension
                                                Island</span><span>+247</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+61" href="javascript:void(0);"><span
                                                style="background-position: 0px -1716px;"></span><span>Australia</span><span>+61</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+43" href="javascript:void(0);"><span
                                                style="background-position: 0px -1331px;"></span><span>Austria</span><span>+43</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+994" href="javascript:void(0);"><span
                                                style="background-position: 0px -1243px;"></span><span>Azerbaijan</span><span>+994</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1242" href="javascript:void(0);"><span
                                                style="background-position: 0px -363px;"></span><span>Bahamas</span><span>+1242</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+973" href="javascript:void(0);"><span
                                                style="background-position: 0px -1496px;"></span><span>Bahrain</span><span>+973</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+880" href="javascript:void(0);"><span
                                                style="background-position: 0px -1771px;"></span><span>Bangladesh</span><span>+880</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1246" href="javascript:void(0);"><span
                                                style="background-position: 0px -1573px;"></span><span>Barbados</span><span>+1246</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+375" href="javascript:void(0);"><span
                                                style="background-position: 0px -1100px;"></span><span>Belarus</span><span>+375</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+32" href="javascript:void(0);"><span
                                                style="background-position: 0px 0px;"></span><span>Belgium</span><span>+32</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+501" href="javascript:void(0);"><span
                                                style="background-position: 0px -484px;"></span><span>Belize</span><span>+501</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+229" href="javascript:void(0);"><span
                                                style="background-position: 0px -1298px;"></span><span>Benin</span><span>+229</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1441" href="javascript:void(0);"><span
                                                style="background-position: 0px -1914px;"></span><span>Bermuda</span><span>+1441</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+975" href="javascript:void(0);"><span
                                                style="background-position: 0px -1848px;"></span><span>Bhutan</span><span>+975</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+591" href="javascript:void(0);"><span
                                                style="background-position: 0px -1650px;"></span><span>Bolivia</span><span>+591</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+599" href="javascript:void(0);"><span
                                                style="background-position: 0px -2719px;"></span><span>Bonaire, Sint
                                                Eustatius</span><span>+599</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+387" href="javascript:void(0);"><span
                                                style="background-position: 0px -1584px;"></span><span>Bosnia and
                                                Herzegovina</span><span>+387</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+267" href="javascript:void(0);"><span
                                                style="background-position: 0px -2707px;"></span><span>Botswana</span><span>+267</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+55" href="javascript:void(0);"><span
                                                style="background-position: 0px -770px;"></span><span>Brazil</span><span>+55</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+673" href="javascript:void(0);"><span
                                                style="background-position: 0px -1683px;"></span><span>Brunei</span><span>+673</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+359" href="javascript:void(0);"><span
                                                style="background-position: 0px -2586px;"></span><span>Bulgaria</span><span>+359</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+226" href="javascript:void(0);"><span
                                                style="background-position: 0px -726px;"></span><span>Burkina
                                                Faso</span><span>+226</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+257" href="javascript:void(0);"><span
                                                style="background-position: 0px -1892px;"></span><span>Burundi</span><span>+257</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+855" href="javascript:void(0);"><span
                                                style="background-position: 0px -242px;"></span><span>Cambodia</span><span>+855</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+237" href="javascript:void(0);"><span
                                                style="background-position: 0px -2057px;"></span><span>Cameroon</span><span>+237</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1" href="javascript:void(0);"><span
                                                style="background-position: 0px -1375px;"></span><span>Canada</span><span>+1</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+238" href="javascript:void(0);"><span
                                                style="background-position: 0px -2652px;"></span><span>Cape
                                                Verde</span><span>+238</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1345" href="javascript:void(0);"><span
                                                style="background-position: 0px -308px;"></span><span>Cayman
                                                Islands</span><span>+1345</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+236" href="javascript:void(0);"><span
                                                style="background-position: 0px -1837px;"></span><span>Central African
                                                Republic</span><span>+236</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+235" href="javascript:void(0);"><span
                                                style="background-position: 0px -814px;"></span><span>Chad</span><span>+235</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+56" href="javascript:void(0);"><span
                                                style="background-position: 0px -1342px;"></span><span>Chile</span><span>+56</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+86" href="javascript:void(0);"><span
                                                style="background-position: 0px -825px;"></span><span>China</span><span>+86</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+57" href="javascript:void(0);"><span
                                                style="background-position: 0px -330px;"></span><span>Colombia</span><span>+57</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+269" href="javascript:void(0);"><span
                                                style="background-position: 0px -1430px;"></span><span>Comoros and
                                                Mayotte</span><span>+269</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+242" href="javascript:void(0);"><span
                                                style="background-position: 0px -1793px;"></span><span>Congo</span><span>+242</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+243" href="javascript:void(0);"><span
                                                style="background-position: 0px -1518px;"></span><span>Congo Dem
                                                Rep</span><span>+243</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+682" href="javascript:void(0);"><span
                                                style="background-position: 0px -2267px;"></span><span>Cook
                                                Islands</span><span>+682</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+506" href="javascript:void(0);"><span
                                                style="background-position: 0px -2090px;"></span><span>Costa
                                                Rica</span><span>+506</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+225" href="javascript:void(0);"><span
                                                style="background-position: 0px -1661px;"></span><span>Cote
                                                d'Ivoire</span><span>+225</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+385" href="javascript:void(0);"><span
                                                style="background-position: 0px -902px;"></span><span>Croatia</span><span>+385</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+53" href="javascript:void(0);"><span
                                                style="background-position: 0px -748px;"></span><span>Cuba</span><span>+53</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+599" href="javascript:void(0);"><span
                                                style="background-position: 0px -2729px;"></span><span>Curaçao</span><span>+599</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+357" href="javascript:void(0);"><span
                                                style="background-position: 0px -561px;"></span><span>Cyprus</span><span>+357</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+420" href="javascript:void(0);"><span
                                                style="background-position: 0px -2256px;"></span><span>Czech
                                                Republic</span><span>+420</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+45" href="javascript:void(0);"><span
                                                style="background-position: 0px -1386px;"></span><span>Denmark</span><span>+45</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+246" href="javascript:void(0);"><span
                                                style="background-position: 0px -55px;"></span><span>Diego
                                                Garcia</span><span>+246</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+253" href="javascript:void(0);"><span
                                                style="background-position: 0px -2101px;"></span><span>Djibouti</span><span>+253</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1767" href="javascript:void(0);"><span
                                                style="background-position: 0px -2432px;"></span><span>Dominica</span><span>+1767</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1809" href="javascript:void(0);"><span
                                                style="background-position: 0px -1529px;"></span><span>Dominican
                                                Republic</span><span>+1809</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+593" href="javascript:void(0);"><span
                                                style="background-position: 0px -1188px;"></span><span>Ecuador</span><span>+593</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+20" href="javascript:void(0);"><span
                                                style="background-position: 0px -2201px;"></span><span>Egypt</span><span>+20</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+503" href="javascript:void(0);"><span
                                                style="background-position: 0px -1639px;"></span><span>El
                                                Salvador</span><span>+503</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+240" href="javascript:void(0);"><span
                                                style="background-position: 0px -1507px;"></span><span>Equatorial
                                                Guinea</span><span>+240</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+291" href="javascript:void(0);"><span
                                                style="background-position: 0px -715px;"></span><span>Eritrea</span><span>+291</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+372" href="javascript:void(0);"><span
                                                style="background-position: 0px -2410px;"></span><span>Estonia</span><span>+372</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+251" href="javascript:void(0);"><span
                                                style="background-position: 0px -2443px;"></span><span>Ethiopia</span><span>+251</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+500" href="javascript:void(0);"><span
                                                style="background-position: 0px -2762px;"></span><span>Falkland
                                                Islands</span><span>+500</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+298" href="javascript:void(0);"><span
                                                style="background-position: 0px -1111px;"></span><span>Faroe
                                                Islands</span><span>+298</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+679" href="javascript:void(0);"><span
                                                style="background-position: 0px -1859px;"></span><span>Fiji</span><span>+679</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+358" href="javascript:void(0);"><span
                                                style="background-position: 0px -1903px;"></span><span>Finland</span><span>+358</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+33" href="javascript:void(0);"><span
                                                style="background-position: 0px -1012px;"></span><span>France</span><span>+33</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+594" href="javascript:void(0);"><span
                                                style="background-position: 0px -2234px;"></span><span>French
                                                Guiana</span><span>+594</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+689" href="javascript:void(0);"><span
                                                style="background-position: 0px -1705px;"></span><span>French
                                                Polynesia</span><span>+689</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+241" href="javascript:void(0);"><span
                                                style="background-position: 0px -880px;"></span><span>Gabon</span><span>+241</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+220" href="javascript:void(0);"><span
                                                style="background-position: 0px -627px;"></span><span>Gambia</span><span>+220</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+995" href="javascript:void(0);"><span
                                                style="background-position: 0px -858px;"></span><span>Georgia</span><span>+995</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+49" href="javascript:void(0);"><span
                                                style="background-position: 0px -2509px;"></span><span>Germany</span><span>+49</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+233" href="javascript:void(0);"><span
                                                style="background-position: 0px -2112px;"></span><span>Ghana</span><span>+233</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+350" href="javascript:void(0);"><span
                                                style="background-position: 0px -275px;"></span><span>Gibraltar</span><span>+350</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+30" href="javascript:void(0);"><span
                                                style="background-position: 0px -165px;"></span><span>Greece</span><span>+30</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+299" href="javascript:void(0);"><span
                                                style="background-position: 0px -1760px;"></span><span>Greenland</span><span>+299</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1473" href="javascript:void(0);"><span
                                                style="background-position: 0px -2399px;"></span><span>Grenada</span><span>+1473</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+590" href="javascript:void(0);"><span
                                                style="background-position: 0px -407px;"></span><span>Guadeloupe</span><span>+590</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1671" href="javascript:void(0);"><span
                                                style="background-position: 0px -2366px;"></span><span>Guam</span><span>+1671</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+502" href="javascript:void(0);"><span
                                                style="background-position: 0px -935px;"></span><span>Guatemala</span><span>+502</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+224" href="javascript:void(0);"><span
                                                style="background-position: 0px -2575px;"></span><span>Guinea</span><span>+224</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+245" href="javascript:void(0);"><span
                                                style="background-position: 0px -1925px;"></span><span>Guinea
                                                Bissau</span><span>+245</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+592" href="javascript:void(0);"><span
                                                style="background-position: 0px -803px;"></span><span>Guyana</span><span>+592</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+509" href="javascript:void(0);"><span
                                                style="background-position: 0px -319px;"></span><span>Haiti</span><span>+509</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+504" href="javascript:void(0);"><span
                                                style="background-position: 0px -2156px;"></span><span>Honduras</span><span>+504</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+852" href="javascript:void(0);"><span
                                                style="background-position: 0px -2696px;"></span><span>Hong
                                                Kong</span><span>+852</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+36" href="javascript:void(0);"><span
                                                style="background-position: 0px -682px;"></span><span>Hungary</span><span>+36</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+354" href="javascript:void(0);"><span
                                                style="background-position: 0px -1991px;"></span><span>Iceland</span><span>+354</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+91" href="javascript:void(0);"><span
                                                style="background-position: 0px -1694px;"></span><span>India</span><span>+91</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+62" href="javascript:void(0);"><span
                                                style="background-position: 0px -1958px;"></span><span>Indonesia</span><span>+62</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+98" href="javascript:void(0);"><span
                                                style="background-position: 0px -2013px;"></span><span>Iran</span><span>+98</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+964" href="javascript:void(0);"><span
                                                style="background-position: 0px -649px;"></span><span>Iraq</span><span>+964</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+353" href="javascript:void(0);"><span
                                                style="background-position: 0px -1969px;"></span><span>Ireland</span><span>+353</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+972" href="javascript:void(0);"><span
                                                style="background-position: 0px -341px;"></span><span>Israel</span><span>+972</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+39" href="javascript:void(0);"><span
                                                style="background-position: 0px -143px;"></span><span>Italy</span><span>+39</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1876" href="javascript:void(0);"><span
                                                style="background-position: 0px -1727px;"></span><span>Jamaica</span><span>+1876</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+81" href="javascript:void(0);"><span
                                                style="background-position: 0px -429px;"></span><span>Japan</span><span>+81</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+962" href="javascript:void(0);"><span
                                                style="background-position: 0px -1463px;"></span><span>Jordan</span><span>+962</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+7" href="javascript:void(0);"><span
                                                style="background-position: 0px -1210px;"></span><span>Kazakhstan</span><span>+7</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+254" href="javascript:void(0);"><span
                                                style="background-position: 0px -2630px;"></span><span>Kenya</span><span>+254</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+686" href="javascript:void(0);"><span
                                                style="background-position: 0px -374px;"></span><span>Kiribati</span><span>+686</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+850" href="javascript:void(0);"><span
                                                style="background-position: 0px -1804px;"></span><span>Korea,
                                                North</span><span>+850</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+82" href="javascript:void(0);"><span
                                                style="background-position: 0px -2245px;"></span><span>Korea,
                                                South</span><span>+82</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+965" href="javascript:void(0);"><span
                                                style="background-position: 0px -2487px;"></span><span>Kuwait</span><span>+965</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+996" href="javascript:void(0);"><span
                                                style="background-position: 0px -1617px;"></span><span>Kyrgyzstan</span><span>+996</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+856" href="javascript:void(0);"><span
                                                style="background-position: 0px -451px;"></span><span>Laos</span><span>+856</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+371" href="javascript:void(0);"><span
                                                style="background-position: 0px -1936px;"></span><span>Latvia</span><span>+371</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+961" href="javascript:void(0);"><span
                                                style="background-position: 0px -1254px;"></span><span>Lebanon</span><span>+961</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+266" href="javascript:void(0);"><span
                                                style="background-position: 0px -2190px;"></span><span>Lesotho</span><span>+266</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+231" href="javascript:void(0);"><span
                                                style="background-position: 0px -2068px;"></span><span>Liberia</span><span>+231</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+218" href="javascript:void(0);"><span
                                                style="background-position: 0px -132px;"></span><span>Libya</span><span>+218</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+423" href="javascript:void(0);"><span
                                                style="background-position: 0px -979px;"></span><span>Liechtenstein</span><span>+423</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+370" href="javascript:void(0);"><span
                                                style="background-position: 0px -1122px;"></span><span>Lithuania</span><span>+370</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+352" href="javascript:void(0);"><span
                                                style="background-position: 0px -1474px;"></span><span>Luxembourg</span><span>+352</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+853" href="javascript:void(0);"><span
                                                style="background-position: 0px -2597px;"></span><span>Macao</span><span>+853</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+389" href="javascript:void(0);"><span
                                                style="background-position: 0px -1353px;"></span><span>Macedonia</span><span>+389</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+261" href="javascript:void(0);"><span
                                                style="background-position: 0px -1287px;"></span><span>Madagascar</span><span>+261</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+265" href="javascript:void(0);"><span
                                                style="background-position: 0px -2145px;"></span><span>Malawi</span><span>+265</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+60" href="javascript:void(0);"><span
                                                style="background-position: 0px -1870px;"></span><span>Malaysia</span><span>+60</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+960" href="javascript:void(0);"><span
                                                style="background-position: 0px -616px;"></span><span>Maldives</span><span>+960</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+223" href="javascript:void(0);"><span
                                                style="background-position: 0px -2520px;"></span><span>Mali</span><span>+223</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+356" href="javascript:void(0);"><span
                                                style="background-position: 0px -1551px;"></span><span>Malta</span><span>+356</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+692" href="javascript:void(0);"><span
                                                style="background-position: 0px -1144px;"></span><span>Marshall
                                                Islands</span><span>+692</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+596" href="javascript:void(0);"><span
                                                style="background-position: 0px -198px;"></span><span>Martinique</span><span>+596</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+222" href="javascript:void(0);"><span
                                                style="background-position: 0px -253px;"></span><span>Mauritania</span><span>+222</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+230" href="javascript:void(0);"><span
                                                style="background-position: 0px -2179px;"></span><span>Mauritius</span><span>+230</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+52" href="javascript:void(0);"><span
                                                style="background-position: 0px -2024px;"></span><span>Mexico</span><span>+52</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+691" href="javascript:void(0);"><span
                                                style="background-position: 0px -1738px;"></span><span>Micronesia</span><span>+691</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+373" href="javascript:void(0);"><span
                                                style="background-position: 0px -2685px;"></span><span>Moldova</span><span>+373</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+377" href="javascript:void(0);"><span
                                                style="background-position: 0px -913px;"></span><span>Monaco</span><span>+377</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+976" href="javascript:void(0);"><span
                                                style="background-position: 0px -2553px;"></span><span>Mongolia</span><span>+976</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+382" href="javascript:void(0);"><span
                                                style="background-position: 0px -2167px;"></span><span>Montenegro</span><span>+382</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1664" href="javascript:void(0);"><span
                                                style="background-position: 0px -583px;"></span><span>Montserrat</span><span>+1664</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+212" href="javascript:void(0);"><span
                                                style="background-position: 0px -2333px;"></span><span>Morocco</span><span>+212</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+258" href="javascript:void(0);"><span
                                                style="background-position: 0px -638px;"></span><span>Mozambique</span><span>+258</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+95" href="javascript:void(0);"><span
                                                style="background-position: 0px -11px;"></span><span>Myanmar</span><span>+95</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+264" href="javascript:void(0);"><span
                                                style="background-position: 0px -1881px;"></span><span>Namibia</span><span>+264</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+674" href="javascript:void(0);"><span
                                                style="background-position: 0px -1749px;"></span><span>Nauru</span><span>+674</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+977" href="javascript:void(0);"><span
                                                style="background-position: 0px -110px;"></span><span>Nepal</span><span>+977</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+31" href="javascript:void(0);"><span
                                                style="background-position: 0px -1441px;"></span><span>Netherlands</span><span>+31</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+687" href="javascript:void(0);"><span
                                                style="background-position: 0px -1276px;"></span><span>New
                                                Caledonia</span><span>+687</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+64" href="javascript:void(0);"><span
                                                style="background-position: 0px -1540px;"></span><span>New
                                                Zealand</span><span>+64</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+505" href="javascript:void(0);"><span
                                                style="background-position: 0px -154px;"></span><span>Nicaragua</span><span>+505</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+227" href="javascript:void(0);"><span
                                                style="background-position: 0px -550px;"></span><span>Niger</span><span>+227</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+234" href="javascript:void(0);"><span
                                                style="background-position: 0px -2476px;"></span><span>Nigeria</span><span>+234</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+683" href="javascript:void(0);"><span
                                                style="background-position: 0px -2079px;"></span><span>Niue</span><span>+683</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+6723" href="javascript:void(0);"><span
                                                style="background-position: 0px -209px;"></span><span>Norfolk
                                                Island</span><span>+6723</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1" href="javascript:void(0);"><span
                                                style="background-position: 0px -704px;"></span><span>Northern Mariana
                                                Islands</span><span>+1</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+47" href="javascript:void(0);"><span
                                                style="background-position: 0px -836px;"></span><span>Norway</span><span>+47</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+968" href="javascript:void(0);"><span
                                                style="background-position: 0px -2454px;"></span><span>Oman</span><span>+968</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+92" href="javascript:void(0);"><span
                                                style="background-position: 0px -2035px;"></span><span>Pakistan</span><span>+92</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+680" href="javascript:void(0);"><span
                                                style="background-position: 0px -231px;"></span><span>Palau</span><span>+680</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+970" href="javascript:void(0);"><span
                                                style="background-position: 0px -1199px;"></span><span>Palestinian
                                                Territories</span><span>+970</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+507" href="javascript:void(0);"><span
                                                style="background-position: 0px -847px;"></span><span>Panama</span><span>+507</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+63" href="javascript:void(0);"><span
                                                style="background-position: 0px -1485px;"></span><span>Papua New
                                                Guinea</span><span>+63</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+595" href="javascript:void(0);"><span
                                                style="background-position: 0px -2344px;"></span><span>Paraguay</span><span>+595</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+51" href="javascript:void(0);"><span
                                                style="background-position: 0px -946px;"></span><span>Peru</span><span>+51</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+63" href="javascript:void(0);"><span
                                                style="background-position: 0px -1815px;"></span><span>Philippines</span><span>+63</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+48" href="javascript:void(0);"><span
                                                style="background-position: 0px -1177px;"></span><span>Poland</span><span>+48</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+351" href="javascript:void(0);"><span
                                                style="background-position: 0px -517px;"></span><span>Portugal</span><span>+351</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1787" href="javascript:void(0);"><span
                                                style="background-position: 0px -473px;"></span><span>Puerto
                                                Rico</span><span>+1787</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+974" href="javascript:void(0);"><span
                                                style="background-position: 0px -462px;"></span><span>Qatar</span><span>+974</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+262" href="javascript:void(0);"><span
                                                style="background-position: 0px -264px;"></span><span>Reunion</span><span>+262</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+40" href="javascript:void(0);"><span
                                                style="background-position: 0px -671px;"></span><span>Romania</span><span>+40</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+7" href="javascript:void(0);"><span
                                                style="background-position: 0px -660px;"></span><span>Russia</span><span>+7</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+250" href="javascript:void(0);"><span
                                                style="background-position: 0px -2674px;"></span><span>Rwanda</span><span>+250</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+599" href="javascript:void(0);"><span
                                                style="background-position: 0px -2719px;"></span><span>Saba</span><span>+599</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+590" href="javascript:void(0);"><span
                                                style="background-position: 0px -1012px;"></span><span>Saint
                                                Barthélemy</span><span>+590</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+290" href="javascript:void(0);"><span
                                                style="background-position: 0px -495px;"></span><span>Saint
                                                Helena</span><span>+290</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1869" href="javascript:void(0);"><span
                                                style="background-position: 0px -99px;"></span><span>Saint Kitts and
                                                Nevis</span><span>+1869</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1758" href="javascript:void(0);"><span
                                                style="background-position: 0px -1397px;"></span><span>Saint
                                                Lucia</span><span>+1758</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+590" href="javascript:void(0);"><span
                                                style="background-position: 0px -55px;"></span><span>Saint
                                                Martin</span><span>+590</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+508" href="javascript:void(0);"><span
                                                style="background-position: 0px -1078px;"></span><span>Saint Pierre and
                                                Miquelon</span><span>+508</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1784" href="javascript:void(0);"><span
                                                style="background-position: 0px -2619px;"></span><span>Saint Vincent
                                                Grenadines</span><span>+1784</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+685" href="javascript:void(0);"><span
                                                style="background-position: 0px -2300px;"></span><span>Samoa</span><span>+685</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+378" href="javascript:void(0);"><span
                                                style="background-position: 0px -2123px;"></span><span>San
                                                Marino</span><span>+378</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+239" href="javascript:void(0);"><span
                                                style="background-position: 0px -2388px;"></span><span>Sao Tome and
                                                Principe</span><span>+239</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+966" href="javascript:void(0);"><span
                                                style="background-position: 0px -33px;"></span><span>Saudi
                                                Arabia</span><span>+966</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+221" href="javascript:void(0);"><span
                                                style="background-position: 0px -2134px;"></span><span>Senegal</span><span>+221</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+381" href="javascript:void(0);"><span
                                                style="background-position: 0px -2465px;"></span><span>Serbia</span><span>+381</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+248" href="javascript:void(0);"><span
                                                style="background-position: 0px -1045px;"></span><span>Seychelles</span><span>+248</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+232" href="javascript:void(0);"><span
                                                style="background-position: 0px -737px;"></span><span>Sierra
                                                Leone</span><span>+232</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+65" href="javascript:void(0);"><span
                                                style="background-position: 0px -22px;"></span><span>Singapore</span><span>+65</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1721" href="javascript:void(0);"><span
                                                style="background-position: 0px -2773px;"></span><span>Sint
                                                Maarten</span><span>+1721</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+421" href="javascript:void(0);"><span
                                                style="background-position: 0px -2212px;"></span><span>Slovakia</span><span>+421</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+386" href="javascript:void(0);"><span
                                                style="background-position: 0px -1221px;"></span><span>Slovenia</span><span>+386</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+677" href="javascript:void(0);"><span
                                                style="background-position: 0px -1067px;"></span><span>Solomon
                                                Islands</span><span>+677</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+252" href="javascript:void(0);"><span
                                                style="background-position: 0px -1364px;"></span><span>Somalia</span><span>+252</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+27" href="javascript:void(0);"><span
                                                style="background-position: 0px -2355px;"></span><span>South
                                                Africa</span><span>+27</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+211" href="javascript:void(0);"><span
                                                style="background-position: 0px -2741px;"></span><span>South
                                                Sudan</span><span>+211</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+34" href="javascript:void(0);"><span
                                                style="background-position: 0px -1155px;"></span><span>Spain</span><span>+34</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+94" href="javascript:void(0);"><span
                                                style="background-position: 0px -2641px;"></span><span>Sri
                                                Lanka</span><span>+94</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+249" href="javascript:void(0);"><span
                                                style="background-position: 0px -352px;"></span><span>Sudan</span><span>+249</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+597" href="javascript:void(0);"><span
                                                style="background-position: 0px -2663px;"></span><span>Suriname</span><span>+597</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+268" href="javascript:void(0);"><span
                                                style="background-position: 0px -2278px;"></span><span>Swaziland</span><span>+268</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+46" href="javascript:void(0);"><span
                                                style="background-position: 0px -385px;"></span><span>Sweden</span><span>+46</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+41" href="javascript:void(0);"><span
                                                style="background-position: 0px -1320px;"></span><span>Switzerland</span><span>+41</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+963" href="javascript:void(0);"><span
                                                style="background-position: 0px -1826px;"></span><span>Syria</span><span>+963</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+886" href="javascript:void(0);"><span
                                                style="background-position: 0px -506px;"></span><span>Taiwan</span><span>+886</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+992" href="javascript:void(0);"><span
                                                style="background-position: 0px -187px;"></span><span>Tajikistan</span><span>+992</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+255" href="javascript:void(0);"><span
                                                style="background-position: 0px -2289px;"></span><span>Tanzania</span><span>+255</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+66" href="javascript:void(0);"><span
                                                style="background-position: 0px -957px;"></span><span>Thailand</span><span>+66</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+670" href="javascript:void(0);"><span
                                                style="background-position: 0px -2784px;"></span><span>Timor-Leste</span><span>+670</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+228" href="javascript:void(0);"><span
                                                style="background-position: 0px -605px;"></span><span>Togo</span><span>+228</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+690" href="javascript:void(0);"><span
                                                style="background-position: 0px -2751px;"></span><span>Tokelau</span><span>+690</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+676" href="javascript:void(0);"><span
                                                style="background-position: 0px -1089px;"></span><span>Tonga</span><span>+676</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1868" href="javascript:void(0);"><span
                                                style="background-position: 0px -440px;"></span><span>Trinidad and
                                                Tobago</span><span>+1868</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+216" href="javascript:void(0);"><span
                                                style="background-position: 0px -539px;"></span><span>Tunisia</span><span>+216</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+90" href="javascript:void(0);"><span
                                                style="background-position: 0px -1606px;"></span><span>Turkey</span><span>+90</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+993" href="javascript:void(0);"><span
                                                style="background-position: 0px -2542px;"></span><span>Turkmenistan</span><span>+993</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1649" href="javascript:void(0);"><span
                                                style="background-position: 0px -1309px;"></span><span>Turks and
                                                Caicos</span><span>+1649</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+688" href="javascript:void(0);"><span
                                                style="background-position: 0px -286px;"></span><span>Tuvalu</span><span>+688</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+256" href="javascript:void(0);"><span
                                                style="background-position: 0px -1166px;"></span><span>Uganda</span><span>+256</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+380" href="javascript:void(0);"><span
                                                style="background-position: 0px -2002px;"></span><span>Ukraine</span><span>+380</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+971" href="javascript:void(0);"><span
                                                style="background-position: 0px -2223px;"></span><span>United Arab
                                                Emirates</span><span>+971</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+44" href="javascript:void(0);"><span
                                                style="background-position: 0px -55px;"></span><span>United
                                                Kingdom</span><span>+44</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1" href="javascript:void(0);"><span
                                                style="background-position: 0px -44px;"></span><span>United
                                                States</span><span>+1</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+598" href="javascript:void(0);"><span
                                                style="background-position: 0px -2608px;"></span><span>Uruguay</span><span>+598</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+998" href="javascript:void(0);"><span
                                                style="background-position: 0px -1001px;"></span><span>Uzbekistan</span><span>+998</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+678" href="javascript:void(0);"><span
                                                style="background-position: 0px -1265px;"></span><span>Vanuatu</span><span>+678</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+379" href="javascript:void(0);"><span
                                                style="background-position: 0px -2322px;"></span><span>Vatican
                                                City</span><span>+379</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+58" href="javascript:void(0);"><span
                                                style="background-position: 0px -1056px;"></span><span>Venezuela</span><span>+58</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+84" href="javascript:void(0);"><span
                                                style="background-position: 0px -968px;"></span><span>Vietnam</span><span>+84</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1284" href="javascript:void(0);"><span
                                                style="background-position: 0px -1408px;"></span><span>Virgin Islands,
                                                British</span><span>+1284</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+1340" href="javascript:void(0);"><span
                                                style="background-position: 0px -1782px;"></span><span>Virgin Islands,
                                                US</span><span>+1340</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+681" href="javascript:void(0);"><span
                                                style="background-position: 0px -1012px;"></span><span>Wallis and
                                                Futuna</span><span>+681</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+967" href="javascript:void(0);"><span
                                                style="background-position: 0px -1672px;"></span><span>Yemen</span><span>+967</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+260" href="javascript:void(0);"><span
                                                style="background-position: 0px -1595px;"></span><span>Zambia</span><span>+260</span></a>
                                    </li>
                                    <li>
                                        <a cunt_code="+263" href="javascript:void(0);"><span
                                                style="background-position: 0px -2046px;"></span><span>Zimbabwe</span><span>+263</span></a>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
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
                                                        id="" class="cart-header">My Cart(<span id="cart_total_item">1</span> items)</span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in cart_items" role="tabpanel"
                                            aria-labelledby="headingOne">


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
                                                                    data-bs-target="#collapseOne123"
                                                                    aria-expanded="true" aria-controls="collapseOne">
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
                                                                <button class="accordion-button collapsed"
                                                                    type="button" data-bs-toggle="collapse"
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
                                                        <div class="right-text">Rs. <span id="cart_subtotal">200</span></div>
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
                                                        <div class="left-textstrong"><strong>Rs. <span id="cart_total"></span></strong></div>
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
                                                        <a class="btn" style="background:#ee6826;color:white" data-bs-toggle="collapse"
                                                            href="" role="button">
                                                            <span style=" font-size:20px;font-weight:bold"> Cash On
                                                                Delivery</span>
                                                        </a>
                                                        <br>
                                                        <a class="btn " style="background:#ee6826;color:white" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseExample" aria-expanded="false"
                                                            aria-controls="collapseExample">
                                                            <span style="font-size:20px;font-weight:bold"> Cash On
                                                                Delivery</span>
                                                        </a>
                                                    </p>
                                                    <div class="collapse" id="collapseExample">
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
                            console.log('item===>>>>',element.name);
                            html +=`<div class="panel-body">
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

        $(document).ready(function () {
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
@endsection
