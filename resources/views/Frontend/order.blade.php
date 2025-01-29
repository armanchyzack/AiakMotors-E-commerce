@extends('Frontend.layouts.front_end')

@section('content')
<style>
    div {
        color: #ffd700 !important;
    }
</style>

<div class="container">
    <div class="card">

        <h1 class="mt-3 text-center">Order Details</h1>
        <form action="{{ route('order') }}" method="GET">
            @csrf
            <div class="card mb-3">
                <div class="card-body">
                    <h4>Order Summary</h4>
                    <hr>
                    @foreach ($items as $cart)
                    <div class="cart-item">
                        <!-- Accessing the product name through the accessory relationship -->
                        <h5>{{ $cart->accessory->name }}</h5> <!-- Accessory name -->
                    </div>
                    @endforeach

                    <!-- Order Total -->
                    <div class="d-flex justify-content-between">
                        <strong>Subtotal:</strong>
                        <span>
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ $subtotal }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Discount:</strong>
                        <span>
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ $discount }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <strong>Total:</strong>
                        <span>
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ $total }}
                        </span>
                    </div>
                    <input type="hidden" name="product_names[]" value="{{ $cart->accessory->name }}">
                    <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                    <input type="hidden" name="discount" value="0">
                    <input type="hidden" name="total" value="{{ $subtotal }}">
                </div>
            </div>

            <!-- Customer Information -->
            <div class="card">
                <div class="card-body">
                    <h4>Billing Details</h4>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="customer_name" id="name" value="{{ old('customer_name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="customer_phone" id="phone" value="{{ old('customer_phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" name="customer_address" id="address" required>{{ old('customer_address') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Place Order</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
