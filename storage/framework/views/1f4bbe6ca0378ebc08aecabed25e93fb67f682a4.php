<?php $__env->startSection('product'); ?>
    12
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>









    <style>
        .cart-items-container {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 15px;
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

        @media screen and (max-width: 768px) {
            .cart-item img {
                max-width: 80px;
                max-height: 80px;
            }

            .cart-image {
                width: 120px;
                height: 120px;
            }

            img.d-block.w-100 {
                height: 25vh;
            }

            .col-lg-8 {
                max-width: 100%;
            }

            .container {
                padding: 15px;
            }
        }
    </style>

    <div class="container col-12">
        <div class="col-12 ms-auto py-3 ps-3 pe-3">
            <h3 class="text-center" style="color: #ffd700">Shopping Cart</h3>

            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="cart-items-container">
                    <hr />
                    <?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="cart-item py-2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <img class="cart-image d-block" src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
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

    <div class="col-12 ms-auto container">
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
                <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" required>
                <input type="hidden" name="section" value="accessory">
                <input type="hidden" name="cart_total" value="<?php echo e($subtotal); ?>">
                <button type="submit" class="btn w-100 mt-2" id="contactbtn">Apply Coupon</button>
            </form>
            <hr />

            <div class="latest-spin">
                <!-- Total and Coupon Apply Section -->
                <!-- Latest Spin Prize Section -->
                <div class="latest-spin">
                    <?php if($latestSpin): ?>
                    <?php
                        $isExpired = now()->greaterThan($latestSpin->expires_at);  // Check if the prize has expired
                        $isUsed = $latestSpin->is_used;  // Check if the prize has already been used
                    ?>

                    <div class="prize-info">
                        <?php if($isExpired): ?>
                            <p>Your prize has expired.</p>
                        <?php elseif($isUsed): ?>
                            <p>Your prize has already been used.Try after 30 days</p>

                        <?php else: ?>
                            <?php if($latestSpin->prize): ?>
                                <p>Congratulations! You won a <?php echo e($latestSpin->prize); ?>% discount!</p>
                                <input type="hidden" id="spin-prize" value="<?php echo e($latestSpin->prize); ?>">
                                <button type="button" class="btn butonn" id="apply-prize">Apply Discount</button>
                            <?php else: ?>
                                <p>Sorry, no prize won this time. Try spinning again!</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <p>You haven't spun the wheel yet. Try your luck!</p>
                <?php endif; ?>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>Total</div>
                    <div>
                        <strong class="total-amount" data-original-total="<?php echo e($subtotal); ?>">
                            <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                            <?php echo e($subtotal); ?>

                        </strong>
                    </div>
                </div>
            </div>


            

            <hr style="color: #ffd700">
            <h1 style="color: #ffd700; text-align:center;">Related Products</h1>
            <hr style="color: #ffd700; font-size:2px">
            <div class="card col-12 h-16 m-auto text-center" style="border-radius: 5%">
                <div id="relatedCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="related">
                        <?php $__currentLoopData = $accessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cheap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                                <img class="d-block w-100" src="<?php echo e($cheap->image_url); ?>" alt="Related product image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($cheap->name); ?></h5>
                                    <div>
                                        <strong>
                                            <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                            <?php echo e($cheap->discount_price ?? $cheap->price); ?>

                                        </strong>
                                    </div>
                                    <a href="<?php echo e(route('cart.add', $cheap->id)); ?>" id="contactbtn"
                                        class="btn  add-to-cart m-auto me-2 <?php echo e($cheap->quantity === 'Out of Stock' ? 'disabled' : ''); ?>">
                                        <i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i>
                                    </a>
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

            <form action="<?php echo e(route('checkout.form')); ?>" method="GET">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="spin-prize" value="<?php echo e($latestSpin->discount ?? ''); ?>">
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
            document.querySelector('form[action="<?php echo e(route('coupon.apply')); ?>"]').addEventListener('submit', async function(
                event) {
                event.preventDefault(); // Prevent form reload

                const form = event.target;
                const couponCode = form.querySelector('input[name="coupon_code"]').value.trim();
                const cartTotal = parseFloat(form.querySelector('input[name="cart_total"]').value);
                const section = form.querySelector('input[name="section"]').value;

                // Check if the coupon code is empty or invalid
                if (!couponCode) {
                    alert('Please enter a valid coupon code.');
                    return;
                }

                if (isNaN(cartTotal) || cartTotal <= 0) {
                    alert('Invalid cart total.');
                    return;
                }

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                        },
                        body: JSON.stringify({
                            coupon_code: couponCode,
                            cart_total: cartTotal,
                            section: section
                        }),
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
                                        location
                                    .reload(); // Reload the page after successful removal
                                    } else {
                                        alert('Failed to remove item: ' + data.message);
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                        }
                    });
                });
            });
            // Apply discount prize
            document.getElementById('apply-prize').addEventListener('click', async function() {
        const prize = document.getElementById('spin-prize').value;
        const subtotal = parseFloat(document.querySelector('.total-amount').getAttribute('data-original-total'));

        try {
            const response = await fetch("<?php echo e(route('apply.prize')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    prize: prize,
                    subtotal: subtotal
                })
            });

            const data = await response.json();

            if (response.ok) {
                const discountedTotal = data.discounted_total.toFixed(2);

                // Update the total on the page
                const totalAmountElement = document.querySelector('.total-amount');
                if (totalAmountElement) {
                    totalAmountElement.innerHTML = `
                        <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        ${discountedTotal}
                    `;
                    totalAmountElement.setAttribute('data-original-total', discountedTotal);
                }

                // Redirect the user to the checkout form with the discounted total
                const checkoutForm = document.createElement('form');
                checkoutForm.action = "<?php echo e(route('checkout.form')); ?>";
                checkoutForm.method = 'GET';

                // Include CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                checkoutForm.appendChild(csrfInput);

                // Include hidden inputs for subtotal, discount, and total
                const subtotalInput = document.createElement('input');
                subtotalInput.type = 'hidden';
                subtotalInput.name = 'subtotal';
                subtotalInput.value = subtotal.toFixed(2);
                checkoutForm.appendChild(subtotalInput);

                const discountInput = document.createElement('input');
                discountInput.type = 'hidden';
                discountInput.name = 'discount';
                discountInput.value = (subtotal - discountedTotal).toFixed(2);
                checkoutForm.appendChild(discountInput);

                const totalInput = document.createElement('input');
                totalInput.type = 'hidden';
                totalInput.name = 'total';
                totalInput.value = discountedTotal;
                checkoutForm.appendChild(totalInput);

                // Submit the form
                document.body.appendChild(checkoutForm);
                checkoutForm.submit();
            } else {
                alert(data.error); // Show error message
            }
        } catch (error) {
            console.error('Error applying prize:', error);
            alert('Something went wrong. Please try again.');
        }
    });
        </script>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.front_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Client Project\CarShop\AiakMotors\resources\views/Frontend/cart.blade.php ENDPATH**/ ?>