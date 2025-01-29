@extends('Frontend.layouts.front_end')

@section('product')
    12
@endsection

@section('content')









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
                    @forelse ($carts as $cart)
                        <div class="cart-item py-2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="d-flex justify-content-between mb-3">
                                        <img class="cart-image d-block" src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                            alt="" />
                                        <div class="mx-3">
                                            <h6>{{ Str::ucfirst($cart->accessory->name) }}</h6>
                                            <h5>
                                                @if ($cart->accessory->discount_price)
                                                    <h6 class="text-white mt-1 text-bg-light text-decoration-line-through">
                                                        {{ $cart->accessory->price }} <span><i
                                                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                    </h6>
                                                @else
                                                    <h6 class="text-white mt-1 text-bg-light">{{ $cart->accessory->price }}
                                                        <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                    </h6>
                                                @endif
                                                @if ($cart->accessory->discount_price)
                                                    <h6 class="text-white mt-1 text-bg-light">
                                                        {{ $cart->accessory->discount_price }} <span><i
                                                                class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                                    </h6>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="remove-item-btn butonn" data-id="{{ $cart->id }}"
                            aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                </div>
            @empty
                <div>
                    <h2 class="text-center">No item in cart</h2>
                </div>
                @endforelse
                <hr />
            </div>
        </div>
    </div>

    <div class="col-12 ms-auto container">
        <div class="bg-dark rounded-3 p-4 sticky-top">
            <h2 class="mb-4 text-center">Order Summary</h2>
            <hr>

            @forelse ($carts as $key => $cart)
                <div class="d-flex justify-content-between align-items-center">
                    <div>{{ ++$key }}</div>
                    <div>{{ Str::ucfirst($cart->accessory->name) }}</div>
                    <div>
                        <strong>
                            <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                            {{ $cart->accessory->discount_price ?? $cart->accessory->price }}
                        </strong>
                    </div>
                </div>
                <hr />
            @empty
                <div class="text-center py-4">
                    <p>Your cart is currently empty. <a class="nav-link btn butonn" href="{{ route('accessory') }}"
                            class="text-primary">Continue shopping</a></p>
                </div>
            @endforelse

            <div class="d-flex justify-content-between align-items-center">
                <div>Delivery Charge</div>
                <div><strong>Will be added</strong></div>
            </div>
            <hr />

            <form action="{{ route('coupon.apply') }}" method="POST">
                @csrf
                <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" required>
                <input type="hidden" name="section" value="accessory">
                <input type="hidden" name="cart_total" value="{{ $subtotal }}">
                <button type="submit" class="btn w-100 mt-2" id="contactbtn">Apply Coupon</button>
            </form>
            <hr />

            <div class="latest-spin">
                <!-- Total and Coupon Apply Section -->
                <!-- Latest Spin Prize Section -->
                <div class="latest-spin">
                    @if ($latestSpin)
                    @php
                        $isExpired = now()->greaterThan($latestSpin->expires_at);  // Check if the prize has expired
                        $isUsed = $latestSpin->is_used;  // Check if the prize has already been used
                    @endphp

                    <div class="prize-info">
                        @if ($isExpired)
                            <p>Your prize has expired.</p>
                        @elseif ($isUsed)
                            <p>Your prize has already been used.Try after 30 days</p>

                        @else
                            @if ($latestSpin->prize)
                                <p>Congratulations! You won a {{ $latestSpin->prize }}% discount!</p>
                                <input type="hidden" id="spin-prize" value="{{ $latestSpin->prize }}">
                                <button type="button" class="btn butonn" id="apply-prize">Apply Discount</button>
                            @else
                                <p>Sorry, no prize won this time. Try spinning again!</p>
                            @endif
                        @endif
                    </div>
                @else
                    <p>You haven't spun the wheel yet. Try your luck!</p>
                @endif
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>Total</div>
                    <div>
                        <strong class="total-amount" data-original-total="{{ $subtotal }}">
                            <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                            {{ $subtotal }}
                        </strong>
                    </div>
                </div>
            </div>


            {{-- <div class="alert alert-warning mt-2" role="alert">
                    If you purchase items worth 10k <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span> you'll receive a 10% discount.
                </div> --}}

            <hr style="color: #ffd700">
            <h1 style="color: #ffd700; text-align:center;">Related Products</h1>
            <hr style="color: #ffd700; font-size:2px">
            <div class="card col-12 h-16 m-auto text-center" style="border-radius: 5%">
                <div id="relatedCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="related">
                        @foreach ($accessories as $index => $cheap)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ $cheap->image_url }}" alt="Related product image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $cheap->name }}</h5>
                                    <div>
                                        <strong>
                                            <span class="me-1"><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                                            {{ $cheap->discount_price ?? $cheap->price }}
                                        </strong>
                                    </div>
                                    <a href="{{ route('cart.add', $cheap->id) }}" id="contactbtn"
                                        class="btn  add-to-cart m-auto me-2 {{ $cheap->quantity === 'Out of Stock' ? 'disabled' : '' }}">
                                        <i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
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

            <form action="{{ route('checkout.form') }}" method="GET">
                @csrf
                <input type="hidden" id="spin-prize" value="{{ $latestSpin->discount ?? '' }}">
                <input type="hidden" name="subtotal" id="checkout-subtotal" value="{{ $subtotal }}">
                <input type="hidden" name="discount" id="checkout-discount" value="0">
                <input type="hidden" name="total" id="checkout-total" value="{{ $subtotal }}">
                <button type="submit" class="btn btn-primary w-100 mt-4 butonn">Checkout</button>
            </form>
        </div>
    </div>
    </div>


    @push('customJs')
        <script>
            document.querySelector('form[action="{{ route('coupon.apply') }}"]').addEventListener('submit', async function(
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
            const response = await fetch("{{ route('apply.prize') }}", {
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
                checkoutForm.action = "{{ route('checkout.form') }}";
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
    @endpush

@endsection
