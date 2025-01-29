<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo e(asset('Frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('Frontend/css/bootstrap.min.css')); ?>">
</head>

<body>
    <div class="row">
        <?php echo $__env->yieldContent('sidenav'); ?>
        

        <div class="col-<?php echo $__env->yieldContent('product'); ?>" style="height: 100vh;">
            <div class="row ">
                <div class=" col-4 col-lg-6 col-xl-8 logo center mb-2">
                    <a href="#">
                        <?php if(!@isset($logo->logo_url)): ?>
                            <img src="<?php echo e(asset('Images/car logo.jpeg')); ?>" alt="..">
                        <?php else: ?>
                            <img src="<?php echo e($logo->logo_url); ?>" alt="..">
                        <?php endif; ?>
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
                            <?php if(auth()->guard()->guest()): ?>
                                <li><a class="dropdown-item active" href="<?php echo e(route('user.login')); ?>">Log In</a></li>
                                <li><a class="dropdown-item active" href="<?php echo e(route('user.regester')); ?>">Register</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item active" href="<?php echo e(route('user.profile')); ?>">Profile</a></li>
                                <li>
                                    <a class="dropdown-item active" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <a type="button" href="<?php echo e(route('cart.checkout')); ?>" class="cart-btn btn position-relative">
                        <i class="fa-solid fa-cart-shopping"
                            style="color: #ffd700; border: 2px solid #ffd700; padding: 6px;"></i>
                        <span style="border:1px solid #ffd700;"
                            class="badge position-absolute text-sm top-0 start-50 translate-middle badge rounded-pill">
                            <?php echo e($cartCount); ?>+
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-12 p-1 search">
                <div class="container">
                    <form class="d-flex" id="searchForm">
                        <input class="form-control me-2" name="search" id="searchbar" type="search"
                            placeholder="Search" aria-label="Search" autocomplete="off">
                        <!-- Dropdown for Category -->

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
            <?php echo $__env->yieldContent('catefilter'); ?>

            


            <?php echo $__env->yieldContent('content'); ?>

            


            <div class="container my-5 " id="social">

                <footer class="text-center text-lg-start social-btn">
                    <div class="container d-flex justify-content-center py-5">
                        <a href="<?php echo e($social->facebook); ?>"class="btn btn-group-sm btn-floating mx-2"
                            style="background-color: #54456b;">
                            <i class="fa-brands fa-facebook" style="color: blue;"></i>
                        </a>
                        <a href="<?php echo e($social->messanger); ?>" class="btn btn-group-sm  btn-floating mx-2"
                            style="background-color: #54456b;">
                            <i class="fa-brands fa-facebook-messenger" style="color: #168aff;"></i>
                        </a>
                        <a href="https://wa.me/<?php echo e($social->whatsapp); ?>"class="btn btn-group-sm  btn-floating mx-2"
                            style="background-color: #54456b;">
                            <i class="fa-brands fa-whatsapp" style="color: #25D366;"></i>
                        </a>
                    </div>
                    <div>
                        <h5 class="text-white text-center">Our Shop</h5>
                        <h6 class="text-white text-center text-sm"> <?php echo $footer->details; ?></h6>
                    </div>

                    <!-- Copyright -->
                    <div class="text-center text-white p-3">
                        © 2024 Copyright:
                        <a class="text-white" href="<?php echo e(env('APP_URL')); ?>">aiakmotors.com</a>
                    </div>
                    <!-- Copyright -->
                </footer>

            </div>
            <!-- End of .container -->
        </div>

    </div>

    </div>













    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('customJs'); ?>

    <script>
        $("#searchbar").on("keyup", function() {
            let searchQuery = $("#searchbar").val().trim();
            let selectedCategory = $("#categoryFilter").val();

            // Only trigger AJAX if there is something typed in the search bar
            if (searchQuery.length >= 2) { // Start searching after 2 characters
                // Make the AJAX request
                $.ajax({
                    url: "<?php echo e(route('search')); ?>", // Use Laravel's route helper
                    method: "GET",
                    data: {
                        query: searchQuery,
                        category: selectedCategory
                    },
                    success: function(data) {
                        // Display the search results
                        let resultsList = $("#resultsList");
                        resultsList.empty(); // Clear previous results

                        // Check if any results are found for each category
                        if (data.cars && data.cars.length > 0) {
                            resultsList.append("<strong>Cars:</strong>");
                            data.cars.forEach(function(result) {
                                resultsList.append("<li>" + result + "</li>");
                            });
                        }

                        if (data.accessories && data.accessories.length > 0) {
                            resultsList.append("<strong>Accessories:</strong>");
                            data.accessories.forEach(function(result) {
                                resultsList.append("<li>" + result + "</li>");
                            });
                        }

                        if (data.services && data.services.length > 0) {
                            resultsList.append("<strong>Services:</strong>");
                            data.services.forEach(function(result) {
                                resultsList.append("<li>" + result + "</li>");
                            });
                        }

                        // If no results were found
                        if (resultsList.children().length === 0) {
                            resultsList.append("<li>No results found.</li>");
                        }
                    },
                    error: function() {
                        console.log("Error with the AJAX request.");
                    }
                });
            } else {
                // Clear results if the search query is empty
                $("#resultsList").empty();
            }
        });
    </script>
</body>

</html>
<?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\layouts\front_end.blade.php ENDPATH**/ ?>