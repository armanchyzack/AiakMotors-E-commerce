<?php $__env->startSection('product'); ?>
12
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .cart-items-container {
            max-height: 400px;
            /* Limit the height of the cart container */
            overflow-y: auto;
            /* Enable vertical scroll bar */
            padding-right: 15px;
            /* Space for scroll bar */
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .cart-item img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        a {
            text-decoration: none;
            color: #000;
        }

        body {
            font-family: "Poppins", sans-serif;
            color: #ffd700;
        }

        .card-title {
            font-weight: bold;
        }

        .product-listing {
            transition: all 0.3s linear;
        }

        .product-listing:hover {
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .cart-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }

        .brand-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
        }

        .butonn {
            border: 1px solid #ffd700;
            background: inherit;
            color: #ffd700;
        }

        .footer-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .footer-title::after {
            z-index: 999;
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            background-color: #0d6efd;
            width: 15%;
            height: 2px;
        }

        .footer-app {
            width: 150px;
            object-fit: contain;
        }

        @media screen and (max-width: 789px) {
            .cart-image {
                width: 120px;
                height: 120px;
            }

            img.d-block.w-100 {
                height: 25vh;
            }
        }
    </style>
    <div class="container">
        <div class="col-12 ms-auto py-3 ps-3 pe-3">
            <h3 class="text-center" style="color: #ffd700">Shopping Cart</h3>

            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <!-- Cart items container with scroll functionality -->
                <div class="cart-items-container">
                    <hr />
                    <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="cart-item py-2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <img class="cart-image d-block" src="<?php echo e($cart->accessory->image_url); ?>"
                                            alt="" />
                                        <div class="mx-3">
                                            <h6><?php echo e(Str::ucfirst($cart->accessory->name)); ?></h6>
                                            <h5>
                                                <?php if($cart->accessory->discount_price): ?>
                                                    <h6 class="text-white mt-1 text-bg-light text-decoration-line-through">
                                                        <?php echo e($cart->accessory->price); ?> <span><i
                                                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                    </h6>
                                                <?php else: ?>
                                                    <h6 class="text-white mt-1 text-bg-light"><?php echo e($cart->accessory->price); ?>

                                                        <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                    </h6>
                                                <?php endif; ?>
                                                <?php if($cart->accessory->discount_price): ?>
                                                    <h6 class="text-white mt-1 text-bg-light">
                                                        <?php echo e($cart->accessory->discount_price); ?> <span><i
                                                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                    </h6>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="remove-item-btn butonn" data-id="<?php echo e($cart->id); ?>"
                                aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div>
                            <h2 class="text-center">No item in cart</h2>
                        </div>
                    <?php endif; ?>
                    <hr />
                </div>
            </div>
        </div>

        <div class="col-12  ms-auto">
            <div class="bg-dark rounded-3 p-4 sticky-top">
                <h2 class="mb-4 text-center">Order Summary</h2>
                <hr>

                <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><?php echo e(++$key); ?></div>
                        <div><?php echo e(Str::ucfirst($cart->accessory->name)); ?></div>
                        <div>
                            <strong>
                                <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                <?php echo e($cart->accessory->discount_price ?? $cart->accessory->price); ?>

                            </strong>
                        </div>
                    </div>
                    <hr />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center py-4">
                        <p>Your cart is currently empty. <a class="nav-link btn butonn" href="<?php echo e(route('accessory')); ?>"
                                class="text-primary">Continue shopping</a></p>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-between align-items-center">
                    <div>Delivery Charge</div>
                    <div><strong>Will be added</strong></div>
                </div>
                <hr />

                <form action="<?php echo e(route('coupon.apply')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="coupon_code" placeholder="Enter coupon code" required>
                    <input type="hidden" name="section" value="accessory"> <!-- or "car" based on user's section -->
                    <input type="hidden" name="cart_total" value="<?php echo e($subtotal); ?>"> <!-- Pass the cart total -->
                    <button type="submit">Apply Coupon</button>
                </form>
                <hr />

                <div class="d-flex justify-content-between align-items-center">
                    <div>Total</div>
                    <div>
                        <strong class="total-amount" data-original-total="<?php echo e($subtotal); ?>">
                            <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                            <?php echo e($subtotal); ?>

                        </strong>
                    </div>
                </div>

                <div class="alert alert-warning mt-2" role="alert">
                    If you purchase items worth 10k
                    <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span> you'll receive a 10% discount.
                </div>

                <hr style="color: #ffd700">
                <h1 style="color: #ffd700; text-align:center;">Realated Product</h1>
                <hr style="color: #ffd700; font-size:2px">
                <div class="card col-12 h-16 m-auto text-center" style="border-radius: 5%">
                    <div id="relatedCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="related">
                            <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cheap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                                    <img class="d-block w-100" src="<?php echo e($cheap->image_url); ?>" alt="Related product image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($cheap->name); ?></h5>
                                        <!-- Price logic -->
                                        <div>
                                            <strong>
                                                <span class="me-1"><i
                                                        class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                <?php echo e($cheap->discount_price ?? $cheap->price); ?>

                                            </strong>
                                        </div>
                                        <a href="<?php echo e(route('cart.add', $cheap->id)); ?>"
                                            class="btn btn-primary add-to-cart btn-light me-2 <?php echo e($cheap->quantity === 'Out of Stock' ? 'disabled' : ''); ?>"><i
                                                class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#relatedCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#relatedCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>


                </div>



               <!-- Checkout Form -->
               <form action="<?php echo e(route('checkout.from')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="subtotal" id="checkout-subtotal" value="<?php echo e($subtotal); ?>">
                <input type="hidden" name="discount" id="checkout-discount" value="0">
                <input type="hidden" name="total" id="checkout-total" value="<?php echo e($subtotal); ?>">
                <button type="submit" class="btn btn-primary w-100 mt-4 butonn">Checkout</button>
            </form>

            </div>
        </div>
    </div>

    <?php $__env->startPush('customJs'); ?>
        <script>

document.querySelector('form[action="<?php echo e(route('coupon.apply')); ?>"]').addEventListener('submit', async function (event) {
    event.preventDefault(); // Prevent form reload

    const form = event.target;
    const couponCode = form.querySelector('input[name="coupon_code"]').value;
    const cartTotal = parseFloat(form.querySelector('input[name="cart_total"]').value);
    const section = form.querySelector('input[name="section"]').value;

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ coupon_code: couponCode, cart_total: cartTotal, section: section }),
        });

        const data = await response.json();

        if (response.ok) {
            const discountedTotal = data.discounted_total.toFixed(2);
            const discountAmount = (cartTotal - discountedTotal).toFixed(2);

            // Update total on the page
            const totalAmountElement = document.querySelector('.total-amount');
            if (totalAmountElement) {
                totalAmountElement.innerHTML = `
                    <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                    ${discountedTotal}
                `;
            }

            // Update hidden fields for checkout
            document.getElementById('checkout-discount').value = discountAmount;
            document.getElementById('checkout-total').value = discountedTotal;

            alert(data.message); // Show success message
        } else {
            alert(data.error); // Show error message
        }
    } catch (error) {
        console.error('Error applying coupon:', error);
        alert('Something went wrong. Please try again.');
    }
});



            // Update subtotal dynamically
            function updateSubtotal() {
                const itemPrices = Array.from(document.querySelectorAll('.cart-item')).map(item => {
                    const priceElement = item.querySelector(
                        'h6:not(.text-decoration-line-through)'); // Adjust this selector if necessary
                    return parseFloat(priceElement.textContent.trim().replace('৳', '')) || 0; // Ensure no NaN values
                });

                const subtotal = itemPrices.reduce((total, price) => total + price, 0);
                const totalAmountElement = document.querySelector('.total-amount');

                if (totalAmountElement) {
                    totalAmountElement.innerHTML = `
                <span class="me-1">
                    <i class="fa-solid fa-bangladeshi-taka-sign sm"></i>
                </span>
                ${subtotal.toFixed(2)}
            `;
                    totalAmountElement.setAttribute('data-original-total', subtotal.toFixed(2));
                }
            }

            













            // Remove item from cart
            document.addEventListener('DOMContentLoaded', () => {
                const removeButtons = document.querySelectorAll('.remove-item-btn');

                removeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const itemId = this.getAttribute('data-id');

                        if (confirm('Are you sure you want to remove this item from the cart?')) {
                            fetch(`/cart/${itemId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute('content'),
                                        'Content-Type': 'application/json',
                                    },
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        this.closest('.cart-item').remove(); // Remove item from DOM
                                        updateSubtotal(); // Update total after item removal
                                    } else {
                                        alert('Failed to remove item: ' + data.message);
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    });
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views\Frontend\cart.blade.php ENDPATH**/ ?>