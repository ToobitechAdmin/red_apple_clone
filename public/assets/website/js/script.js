$(document).ready(function () {

    setTimeout(function () {
        $('#ctn-preloader').addClass('loaded');
        // Una vez haya terminado el preloader aparezca el scroll
        $('body').removeClass('no-scroll-y');

        if ($('#ctn-preloader').hasClass('loaded')) {
            // Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
            $('#preloader').delay(1000).queue(function () {
                $(this).remove();
            });
        }
    }, 3000);

});




// //Code by ARiyou2000

// var currentTab = 0;
// document.addEventListener("DOMContentLoaded", function (event) {


//     showTab(currentTab);

// });

// function showTab(n) {
//     var x = document.getElementsByClassName("tab");
//     x[n].style.display = "block";
//     if (n == 0) {
//         document.getElementById("prvoisform").style.display = "block"
//         document.getElementById("prevBtn").style.display = "none";
//     } else {
//         document.getElementById("prvoisform").style.display = "none"
//         document.getElementById("prevBtn").style.display = "inline";
//     }
//     if (n == (x.length - 1)) {
//         document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
//     } else {
//         document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
//     }
//     fixStepIndicator(n)

// }

// function nextPrev(n) {

//     var x = document.getElementsByClassName("tab");
//     if (n == 1 && !validateForm()) return false;
//     x[currentTab].style.display = "none";

//     currentTab = currentTab + n;

//     if (currentTab >= x.length) {
//         document.getElementById("form2").style.display = "none";
//         var baseUrl = window.location.origin;

//         console.log(baseUrl);
//         // window.open("home.php","_self");

//         document.getElementById("nextprevious").style.display = "none";
//         document.getElementById("all-steps").style.display = "none";
//         document.getElementById("register").style.display = "none";
//         document.getElementById("text-message").style.display = "none";







//     }

//     showTab(currentTab);

// }

// function validateForm() {
//     var x, y, i, valid = true;
//     x = document.getElementsByClassName("tab");
//     y = x[currentTab].getElementsByTagName("input");

//     for (i = 0; i < y.length; i++) {

//         if (y[i].value == "") {
//             y[i].className += " invalid";
//             valid = false;

//         }


//     }


//     return valid;


// }



document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            document.getElementById('navbar_top').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
        } else {
            document.getElementById('navbar_top').classList.remove('fixed-top');
            // remove padding top from body
            document.body.style.paddingTop = '0';
        }
    });
});





const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    const answer = item.nextElementSibling;
    const icon = item.querySelector('i');

    item.addEventListener('click', () => {
        faqItems.forEach(otherItem => {
            if (otherItem !== item) {
                const otherAnswer = otherItem.nextElementSibling;
                const otherIcon = otherItem.querySelector('i');

                otherAnswer.classList.remove('active');
                otherIcon.classList.remove('active');
                otherAnswer.style.maxHeight = "0";
            }
        });

        answer.classList.toggle('active');
        icon.classList.toggle('active');
        if (answer.classList.contains('active')) {
            answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
            answer.style.maxHeight = "0";
        }
    });
});


const items = document.querySelectorAll(".accordion a");

function toggleAccordion() {
    this.classList.toggle('active');
    this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));



function setCountry(code) {
    if (code || code == '') {
        var text = jQuery('a[cunt_code="' + code + '"]').html();
        $(".dropdown dt a span").html(text);
    }
}
$(document).ready(function () {
    $(".dropdown img.flag").addClass("flagvisibility");

    $(".dropdown dt a").click(function () {
        $(".dropdown dd ul").toggle();
    });

    $(".dropdown dd ul li a").click(function () {
        //console.log($(this).html())
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("country-select"));
    });

    function getSelectedValue(id) {
        //console.log(id,$("#" + id).find("dt a span.value").html())
        return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown"))
            $(".dropdown dd ul").hide();
    });


    $("#flagSwitcher").click(function () {
        $(".dropdown img.flag").toggleClass("flagvisibility");
    });
});




var collapseElementList = [].slice.call(document.querySelectorAll('.collapse'))
var collapseList = collapseElementList.map(function (collapseEl) {
    collapseEl.addEventListener('hidden.bs.collapse', function () {
        let children = this.querySelectorAll('.collapse.show');
        children.forEach((c) => {
            var collapse = bootstrap.Collapse.getInstance(c)
            collapse.hide()
        })
    })
})










const selectContainer = document.getElementById("js_pn-select");
const countrySearchInput = document.getElementById("js_search-input");
const noResultListItem = document.getElementById("js_no-results-found");
const dropdownTrigger = document.getElementById("js_trigger-dropdown");
const phoneNumberInput = document.getElementById("js_input-phonenumber");
const dropdownContainer = document.getElementById("js_dropdown");
const selectedPrefix = document.getElementById("js_number-prefix");
const selectedFlag = document.getElementById("js_selected-flag");
const listContainer = document.getElementById("js_list");

let countryList;

const init = async countries => {
    const selectCountry = e => {
        const {
            flag,
            prefix
        } = e.target.closest("li").dataset;
        setNewSelected(prefix, flag);
        closeDropdown();
        addSelectedModifier(flag);
    };

    // -------------- Update the 'Selected country flag' to reflect changes

    const setNewSelected = (prefix, flag) => {
        selectedFlag.src = `https://flagpedia.net/data/flags/icon/36x27/${flag}.png`;
        selectedPrefix.value = `+${prefix}`;
        selectContainer.style.setProperty("--prefix-length", prefix.length);
    };

    // -------------- Removes and adds modifier to selected country

    const addSelectedModifier = flag => {
        const previousSelected = document.getElementsByClassName(
            "pn-list-item--selected")[
            0];
        const newSelected = document.querySelectorAll(
            `.pn-list-item[data-flag=${flag}]`)[
            0];
        previousSelected.classList.remove("pn-list-item--selected");
        newSelected.classList.add("pn-list-item--selected");
    };

    // -------------- Close dropdown

    const closeDropdown = () => {
        selectContainer.classList.remove("pn-select--open");
        listContainer.scrollTop = 0;
        countrySearchInput.value = "";
        countryList.search();
        phoneNumberInput.focus();
        removeDropdownEvents();
    };

    // -------------- Open dropdown

    const openDropdown = () => {
        selectContainer.classList.add("pn-select--open");
        attatchDropdownEvents();
    };

    // -------------- Dropdown event listeners

    let countdown;

    const closeOnMouseLeave = () => {
        // console.log("countdown activated");
        countdown = setTimeout(() => closeDropdown(), 2000);
    };

    const clearTimeOut = () => clearTimeout(countdown);

    const attatchDropdownEvents = () => {
        // console.log("Adding event listeners");
        dropdownContainer.addEventListener("mouseleave", closeOnMouseLeave);
        dropdownContainer.addEventListener("mouseenter", clearTimeOut);
    };

    const removeDropdownEvents = () => {
        // console.log("Removing event listeners and countdown");
        clearTimeout(countdown);
        dropdownContainer.removeEventListener("mouseleave", closeOnMouseLeave);
        dropdownContainer.removeEventListener("mouseenter", clearTimeOut);
    };

    // -------------- Close when clicked outside the dropdown

    document.addEventListener("click", e => {
        if (
            e.target !== selectContainer &&
            !selectContainer.contains(e.target) &&
            selectContainer.classList.contains("pn-select--open")) {
            closeDropdown();
        }
    });

    // -------------- Append generated listItems to list element

    const createList = () =>
        new Promise((resolve, _) => {
            countries.forEach((country, index, countries) => {
                const {
                    name,
                    prefix,
                    flag
                } = country;

                const element = `<li class="pn-list-item ${
      flag === "nl" ? "pn-list-item--selected" : ""
      } js_pn-list-item" data-flag="${flag}" data-prefix="${prefix}" tabindex="0" role="button" aria-pressed="false">
          <img class="pn-list-item__flag" src="https://flagpedia.net/data/flags/icon/36x27/${flag}.png" />
          <span class="pn-list-item__country js_country-name">${name}</span>
          <span class="pn-list-item__prefix js_country-prefix">(+${prefix})</span>
        </li>`;

                listContainer.innerHTML += element;

                if (index === countries.length - 1) {
                    resolve();
                }
            });
        });

    // -------------- After all the listItems are created we loop over the items to attach the eventListeners

    const attatchListItemEventListeners = () =>
        new Promise((resolve, _) => {
            const listItems = [...document.getElementsByClassName("js_pn-list-item")];

            listItems.forEach((item, index, listItems) => {
                item.addEventListener("click", event => {
                    selectCountry(event);
                });
                // Keydown event listener - https://dev.to/tylerjdev/when-role-button-is-not-enough-dac
                item.addEventListener("keydown", function (e) {
                    const keyD = e.key !== undefined ? e.key : e.keyCode;
                    if (
                        keyD === "Enter" ||
                        keyD === 13 || ["Spacebar", " "].indexOf(keyD) >= 0 ||
                        keyD === 32) {
                        e.preventDefault();
                        this.click();
                    }
                });

                if (index === listItems.length - 1) {
                    resolve();
                }
            });
        });

    // -------------- After all the listItems are created we initate list and it's listeners

    const initiateList = () => {
        countryList = new List("js_pn-select", {
            valueNames: ["js_country-name", "js_country-prefix"]
        });


        // Add 'updated' listener for search results
        countryList.on("updated", list => {
            if (list.matchingItems.length < 5)
                listContainer.classList.toggle("pn-list--no-scroll");

            noResultListItem.style.display =
                list.matchingItems.length > 0 ? "none" : "block";
        });
    };

    await createList();
    await attatchListItemEventListeners();
    initiateList();

    dropdownTrigger.addEventListener("click", () => {
        const isOpen = selectContainer.classList.contains("pn-select--open");
        isOpen ? closeDropdown() : openDropdown();
    });
};

const countries = [

    {
        name: "pak",
        prefix: 993,
        flag: "pk"
    },
    {
        name: "Austria",
        prefix: 43,
        flag: "at"
    },



    {
        name: "Belgium",
        prefix: 32,
        flag: "be"
    },

    {
        name: "Bulgaria",
        prefix: 359,
        flag: "bg"
    },

    {
        name: "Croatia",
        prefix: 385,
        flag: "hr"
    },

    {
        name: "Cyprus",
        prefix: 357,
        flag: "cy"
    },

    {
        name: "Czech Republic",
        prefix: 420,
        flag: "cz"
    },

    {
        name: "Denmark",
        prefix: 45,
        flag: "dk"
    },

    {
        name: "Estonia",
        prefix: 372,
        flag: "ee"
    },

    {
        name: "Finland",
        prefix: 358,
        flag: "fi"
    },

    {
        name: "France",
        prefix: 33,
        flag: "fr"
    },

    {
        name: "Germany",
        prefix: 49,
        flag: "de"
    },

    {
        name: "Greece",
        prefix: 30,
        flag: "gr"
    },

    {
        name: "Hungary",
        prefix: 36,
        flag: "hu"
    },

    {
        name: "Iceland",
        prefix: 354,
        flag: "is"
    },

    {
        name: "Republic of Ireland",
        prefix: 353,
        flag: "ie"
    },

    {
        name: "Italy",
        prefix: 39,
        flag: "it"
    },

    {
        name: "Latvia",
        prefix: 371,
        flag: "lv"
    },

    {
        name: "Liechtenstein",
        prefix: 423,
        flag: "li"
    },

    {
        name: "Lithuania",
        prefix: 370,
        flag: "lt"
    },

    {
        name: "Luxembourg",
        prefix: 352,
        flag: "lu"
    },

    {
        name: "Malta",
        prefix: 356,
        flag: "mt"
    },

    {
        name: "Netherlands",
        prefix: 31,
        flag: "nl"
    },

    {
        name: "Norway",
        prefix: 47,
        flag: "no"
    },

    {
        name: "Poland",
        prefix: 48,
        flag: "pl"
    },

    {
        name: "Portugal",
        prefix: 351,
        flag: "pt"
    },

    {
        name: "Romania",
        prefix: 40,
        flag: "ro"
    },

    {
        name: "Slovakia",
        prefix: 421,
        flag: "sk"
    },

    {
        name: "Slovenia",
        prefix: 386,
        flag: "si"
    },

    {
        name: "Spain",
        prefix: 34,
        flag: "es"
    },

    {
        name: "Sweden",
        prefix: 46,
        flag: "se"
    }
];

AOS.init({
    duration: 1200,
})
