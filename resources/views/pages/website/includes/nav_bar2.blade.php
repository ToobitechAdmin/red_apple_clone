<style>
    .tab-scroller {
        position: relative;
        max-width: 100%;
        overflow: hidden;
    }

    .tab-scroller-arrow {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 25px;
        cursor: pointer;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ffffff;
        border: 1px solid #222222;
    }

    .tab-scroller .right-arrow {
        right: 0;
    }

    .tab-scroller .left-arrow {
        left: 0;
    }

    .tab-scroller .left-arrow.d-none~.nav {
        padding-left: 0;
    }

    .tab-scroller .nav {
        position: relative;
        padding-left: 35px;
        flex-wrap: nowrap;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background: #da291c;
    }

    .nav-link:focus,
    .nav-link:hover {
        color: #da291c;
    }
</style>





<div class="container-fluid bg-white mt-4">

    <div class="row" id="fortagesss" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300"
        data-aos-once="true">

        <div class="col-1 dd" style="width: 40px !important;">
            <button class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <i class="fa-solid fa-bars-staggered" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>


            </button>
        </div>
        <div class="col-11" id="col11">
            <div class="tab-scroller">
                <i class="tab-scroller-arrow left-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                    </svg>
                </i>
                <i class="tab-scroller-arrow right-arrow d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </i>
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    @if (isset($data))

                        @foreach ($data as $item)
                            <li class="nav-item" role="presentation">
                                <a href="#onlineexc{{ $item->id }}" style="text-decoration: none;">
                                    <button class="nav-link" id="pills-home-tab " data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">{{ $item->name ?? '' }}</button>
                                </a>
                            </li>
                        @endforeach
                    @endif



                </ul>
            </div>
        </div>

    </div>
</div>

<div class="">
    <div class="col-lg-6">
        <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvas" data-bs-keyboard="false"
            data-bs-backdrop="false">
            <div class="offcanvas-header">
                <h6 class="offcanvas-title " id="offcanvas">Menu</h6>

                <span id="forcolosebtncss">
                    <button type="button" class="btn-close  text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </span>
            </div>
            <div class="offcanvas-body px-0">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
                    @if (isset($data))

                        @foreach ($data as $item)
                            <li class="nav-item lefttag" data-bs-dismiss="offcanvas" aria-label="Close">
                                <a href="#onlineexc" class="nav-link text-truncate">
                                    <i class="fs-5 bi-house"></i><span class="ms-1  d-sm-inline" id="leftagfont">{{ $item->name??'' }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>

    </div>


    <!-- JavaScript Bundle with Popper -->

    <!-- Custom js -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            //  selector
            document.querySelectorAll(".tab-scroller").forEach((el) => {
                let scrollTabInner = el.querySelector(".nav")
                let scrollTabItem = el.querySelectorAll(".nav-item")
                let leftArrow = el.querySelector(".left-arrow")
                let rightArrow = el.querySelector(".right-arrow")
                //scrollable tab width
                let scrollTabWidth = el.offsetWidth

                //all tab items width
                let scrollTabItemsWidth = () => {
                    let itemsWidth = 0;
                    scrollTabItem.forEach(el => {
                        let itemWidth = el.offsetWidth;
                        itemsWidth += itemWidth;
                    });
                    return itemsWidth
                }

                //hidden tab item width
                let widthOfHiddenItems = scrollTabItemsWidth() - scrollTabWidth;
                let rightValue = 0;
                if (scrollTabItemsWidth() > scrollTabWidth) {
                    rightArrow.classList.remove("d-none")
                }

                //right arrow click functionality
                rightArrow.addEventListener("click", () => {
                    if (rightValue > widthOfHiddenItems) {
                        rightArrow.classList.add("d-none")
                        leftArrow.classList.remove("d-none")
                        scrollTabInner.style.cssText = `right: ${widthOfHiddenItems + 35}px;`
                    } else {
                        rightArrow.classList.remove("d-none")
                        leftArrow.classList.remove("d-none")
                        rightValue += 200;
                        scrollTabInner.style.cssText = `right: ${rightValue}px;`

                    }
                })

                //left arrow click functionality
                leftArrow.addEventListener("click", () => {
                    rightValue -= 200;
                    scrollTabInner.style.cssText = `right: ${rightValue}px;`
                    rightArrow.classList.remove("d-none")
                    if (rightValue <= 0) {
                        leftArrow.classList.add("d-none")
                        rightArrow.classList.remove("d-none")
                        scrollTabInner.style.cssText = `right: 0px;`
                    }
                })
            })
        })
    </script>
