<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">

</head>

<body>
        <style>
    .value {
    font-size: 0.6em;

    }
    .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #000000;
    margin: auto;
    padding: 0;
    border: 1px solid #ffd700;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}


/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #ffd;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #000000;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #ffd;
    color: white;
}

body{
    color:aliceblue !important;
}


</style>
    <div class="row">
        @yield('sidenav')
        {{-- <div class="col-3 sidenavbar" style="height: 100vh;">
            <div class="sidenav">
                <a href="{{ route('car') }}" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
                <hr style="width: 100%; color: #ffd700; ">
                <a href="{{ route('accessory') }}" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
                <hr style="width: 100%; color: #ffd700; ">
                <a href="{{ route('spinner') }}" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
                <hr style="width: 100%; color: #ffd700; ">
            </div>
        </div> --}}

        <div class="col-@yield('product')" style="height: 100vh;">
            <div class="row ">
                <div class=" col-4 col-lg-6 col-xl-8 logo center mb-2">
                    <a href="{{ route('car') }}">
                        @if (!@isset($logo->logo_url))
                            <img src="{{ asset('Images/car logo.jpeg') }}" alt="..">
                        @else
                            <img src="{{ $logo->logo_url }}" alt="..">
                        @endif
                    </a>
                </div>
                <div class=" col-8 col-lg-6 col-xl-4 d-flex mt-3 text-end me-0 pl-3">
                    <!--add to cart , profile buton-->

                    <div class="dropdown btn-group-sm profile">
                        <a class="btn dropdown-toggle btn-sm btn-group-sm" style="border: 2px solid #ffd700;"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style="color: #ffd700"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            @guest
                                <li><a class="dropdown-item active" href="{{ route('user.login') }}">Log In</a></li>
                                <li><a class="dropdown-item active" href="{{ route('user.register') }}">Register</a></li>
                            @else
                                <li><a class="dropdown-item active" href="{{ route('user.profile') }}">Profile</a></li>
                                <li>
                                    <a class="dropdown-item active" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    <a type="button" href="{{ route('cart.checkout') }}" class="cart-btn btn position-relative">
                        <i class="fa-solid fa-cart-shopping"
                            style="color: #ffd700; border: 2px solid #ffd700; padding: 6px;"></i>
                        <span style="border:1px solid #ffd700;"
                            class="badge position-absolute text-sm top-0 start-50 translate-middle badge rounded-pill">
                            {{ $cartCount }}+
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-12 p-1 search">
                <div class="container">
                    <form class="d-flex" action="{{ route('searchResults') }}" method="GET" id="searchForm">
                        <input class="form-control me-2" name="query" id="searchbar" type="search" placeholder="Search" aria-label="Search" autocomplete="off" value="{{ request()->get('query') }}">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <!-- Display Search Results -->
                    <div class="searchresult">
                        <ul id="resultsList" style="list-style: none; padding-left: 0;"></ul>
                    </div>

                </div>

            </div>
            <div class="marque-text">
                <a href="#">
                    <div class="scroll-left">
                        <p>CLICK HERE FOR INFORMATION ABOUT OUR AMERICAN 2018 SOLAR ECLIPSE GLASSES</p>
                        <p class="second">CLICK HERE FOR INFORMATION ABOUT OUR AMERICAN 2018 SOLAR ECLIPSE GLASSES</p>
                    </div>
                </a>
            </div>
            @yield('catefilter')

            {{-- <div class="row">
                <div class="col-6" >
                    <div class="dropdown" >
                        <button class="btn btn-secondary dropdown-toggle btn-sm w-100 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categories
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            @foreach ($categories as $cate)
                            <li><a class="dropdown-item active" href="{{ route('category', $cate->slug) }}">{{ Str::ucfirst($cate->title) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                  <div class="dropdown" >
                    <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Price Filter
                    </button>
                        <select id="sortOrder" class="dropdown-menu dropdown-menu-dark">
                            <option value="high_to_low" class="btn" type="submit">High to Low</option>
                            <option value="low_to_high" class="btn" >Low to High</option>
                        </select>
                </div>
                </div>
            </div> --}}


            @yield('content')

            {{-- {{ dd(Auth::user()) }} --}}


            <div class="container my-5 " id="social">

                <footer class="text-center text-lg-start social-btn">
                    <div class="container d-flex justify-content-center py-5">
                        <a href="{{ $social->facebook }}"class="btn btn-group-sm btn-floating mx-2"
                            style="background-color: #54456b;">
                            <i class="fa-brands fa-facebook" style="color: blue;"></i>
                        </a>
                        <a href="{{ $social->messanger }}" class="btn btn-group-sm  btn-floating mx-2"
                            style="background-color: #54456b;">
                            <i class="fa-brands fa-facebook-messenger" style="color: #168aff;"></i>
                        </a>
                        <a href="https://wa.me/{{ $social->whatsapp }}"class="btn btn-group-sm  btn-floating mx-2"
                            style="background-color: #54456b;">
                            <i class="fa-brands fa-whatsapp" style="color: #25D366;"></i>
                        </a>
                    </div>
                    <div>
                        <h5 class="text-white text-center">{{ $comapnyinfo->phone_number }}</h5>
                        <h6 class="text-white text-center text-sm"> {!! $footer->details !!}</h6>
                    </div>

                    <!-- Copyright -->
                    <div class="text-center text-white p-3">
                        © 2024 Copyright:
                        <a class="text-white" href="{{ env('APP_URL') }}">aiakmotors.com</a>
                    </div>
                    <!-- Copyright -->
                </footer>

            </div>
            <!-- End of .container -->
        </div>

    </div>

    </div>

    {{-- <div id="exit-popup"
    style="display: none;
           position: fixed;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           padding: 20px;
           background-color: white;
           border: 2px solid #ffd700;
           z-index: 9999;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    <div class="popup-content text-center">
        <p></p>
        <button onclick="hideExitPopup()" style="background-color: #ffd700; border: none; padding: 10px 20px; margin: 5px;">Cancel</button>
        <button onclick="redirectToPage()" style="background-color: #ffd700; border: none; padding: 10px 20px; margin: 5px;">Yes, Leave</button>
    </div>
</div> --}}

<div id="exit-popup"  class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <button onclick="hideExitPopup()" style="background-color: #ffd700; border: none; padding: 10px 20px; margin: 5px;">Cancel</button>
            <button onclick="redirectToPage()" style="background-color: #ffd700; border: none; padding: 10px 20px; margin: 5px;">Yes, Leave</button>
        </div>
        <p id="text">{!! $popup->description !!}</p>
        <a href="{{ route('spinner') }}" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>









    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    @stack('customJs')

    <script>


       $("#searchbar").on("keyup", function(event) {
    let searchQuery = $("#searchbar").val().trim();
    let selectedCategory = $("#categoryFilter").val(); // Assuming this category filter exists

    // Trigger the search when there are at least 2 characters OR when the Enter key is pressed
    if (event.keyCode === 13 || searchQuery.length >= 2) {
        $.ajax({
            url: "{{ route('search') }}", // Make sure this route exists
            method: "GET",
            data: {
                query: searchQuery,
                category: selectedCategory
            },
            success: function(data) {
                let resultsList = $("#resultsList");
                resultsList.empty();  // Clear previous results

                let foundResults = false;

                if (data.cars && data.cars.length > 0) {
                    resultsList.append("<strong>Cars:</strong>");
                    data.cars.forEach(function(result) {
                        resultsList.append("<li><a href='/product/car/" + result.id + "'>" + result.name + "</a></li>");
                    });
                    foundResults = true;
                }

                if (data.accessories && data.accessories.length > 0) {
                    resultsList.append("<strong>Accessories:</strong>");
                    data.accessories.forEach(function(result) {
                        resultsList.append("<li><a href='/product/accessory/" + result.id + "'>" + result.name + "</a></li>");
                    });
                    foundResults = true;
                }

                // If no results were found
                if (!foundResults) {
                    resultsList.append("<li>No results found.</li>");
                }
            },
            error: function(xhr, status, error) {
                console.log("Error with the AJAX request: " + error);
                $("#resultsList").empty().append("<li>Something went wrong. Please try again.</li>");
            }
        });
    } else if (searchQuery.length < 2) {
        $("#resultsList").empty();  // Clear results if query is less than 2 characters
    }
});






let isExitPopupVisible = false;
let touchStartX = 0;

// Function to show the custom exit popup
function showExitPopup() {
    if (!isExitPopupVisible) {
        isExitPopupVisible = true;
        document.getElementById("exit-popup").style.display = "block";
    }
}

// Function to hide the exit popup
function hideExitPopup() {
    isExitPopupVisible = false;
    document.getElementById("exit-popup").style.display = "none";
}

// Function to allow the user to leave the page
function redirectToPage() {
    // Close the exit popup and allow navigation
    window.location.href = document.referrer || '/'; // Redirect to the previous page or home
}

// Only show the exit popup when leaving the site (not navigating to a different page within the site)
window.addEventListener("beforeunload", function (event) {
    if (isExitPopupVisible) {
        event.preventDefault(); // Prevent the default unload
        event.returnValue = ''; // Required for certain browsers to show the confirmation
    }
});

// Trigger the exit popup when the mouse leaves the top of the page (indicating they might close the tab)
document.addEventListener("mouseleave", function (event) {
    if (event.clientY <= 0 && !isExitPopupVisible) {
        // Trigger the exit popup when the mouse leaves the top of the page
        showExitPopup();
    }
});

// Prevent the popup from triggering when navigating within the site
document.addEventListener("click", function (event) {
    const target = event.target.closest("a"); // Find the closest anchor tag
    if (target && target.hostname === window.location.hostname) {
        // If the navigation is internal, do not show the exit popup
        isExitPopupVisible = false;
        hideExitPopup();
    }
});

// Prevent popup from showing on page load or when navigating between internal pages
document.addEventListener("DOMContentLoaded", function () {
    isExitPopupVisible = false; // Reset to false to ensure popup isn't triggered immediately
});

// Detect swipe gestures (for mobile users) to show exit popup
document.addEventListener("touchstart", function (event) {
    touchStartX = event.changedTouches[0].pageX;
}, false);

document.addEventListener("touchend", function (event) {
    let touchEndX = event.changedTouches[0].pageX;
    let swipeDistance = touchEndX - touchStartX;

    if (Math.abs(swipeDistance) > 50 && !isExitPopupVisible) {
        // Detect swipe from left or right edge
        if (swipeDistance < 0 || swipeDistance > 0) {
            showExitPopup();
        }
    }
}, false);

// For mobile users, show the exit popup when they attempt to navigate away (e.g., using the back button)
window.addEventListener("popstate", function (event) {
    if (!isExitPopupVisible) {
        showExitPopup();
        history.pushState(null, null, location.href); // Prevent the back button from navigating
    }
});

// Attach event listeners to the "Cancel" and "Yes, Leave" buttons in the popup
document.querySelector("#exit-popup button:nth-child(1)").addEventListener("click", hideExitPopup);
document.querySelector("#exit-popup button:nth-child(2)").addEventListener("click", redirectToPage);

// Modal functionality (assuming the modal code is included for display)
btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
</body>

</html>
