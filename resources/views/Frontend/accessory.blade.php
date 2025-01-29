@extends('Frontend.layouts.front_end')
@section('sidenav')
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="{{ route('car') }}" class="d-flex"   style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="{{ route('accessory') }}" class="d-flex"  style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="{{ route('service') }}" class="d-flex"  style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="{{ route('spinner') }}" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="{{ route('our.shop.details') }}" class="d-flex" style="color: #ffd700">About Us<span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
    </div>
</div>
@endsection

@section('catefilter')
<div class="row">
    <div class="col-6">
        <div class="dropdown">
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
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100"
                    type="button"
                    id="priceFilterDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="background-color: inherit; border: 2px solid #ffd700; color: #ffd700;">
                Price Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="priceFilterDropdown">
                <li><a class="dropdown-item" href="{{ route('accessory', ['price' => 'high_to_low']) }}" style="color: #ffd700;">High to Low</a></li>
                <li><a class="dropdown-item" href="{{ route('accessory', ['price' => 'low_to_high']) }}" style="color: #ffd700;">Low to High</a></li>
            </ul>
        </div>

    </div>
</div>
@endsection
@section('product')
9
@endsection
@section('content')
<style>
    #quantity {
            position: absolute;
            top: 20px;
            right: 15px;
            background: black;
            color: #ffd700;
            padding: 0.3rem 0.5rem;
            border-radius: 20px;
            font-size: 0.85rem;
        }
</style>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
    @foreach ($accessories as $accessory)
    <div class="col">

        <a href="{{ route('item.show', ['type' => 'accessory', 'id' => $accessory->id]) }}" class="text-decoration-none">
            <div class="card h-100">
                <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8aW1hZ2V8ZW58MHx8MHx8fDA%3D" class="card-img-top" alt="{{ $accessory->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ Str::ucfirst($accessory->name) }}</h5>
                    <div id="quantity">
                        <span>
                            @if ($accessory->stock === 'In Stock')
                                Available Now
                            @elseif ($accessory->stock  === 'Out of Stock')
                                Currently Unavailable
                            @elseif ($accessory->stock  === 'Limited Stock')
                                Hurry! Limited Stock
                            @endif
                        </span>
                    </div>
                    @if ($accessory->discount_price)
                        <h6 class="text-white mt-1 text-bg-light text-decoration-line-through">
                            {{ $accessory->price }}
                            <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        </h6>
                    @else
                        <h6 class="text-white mt-1 text-bg-light">
                            {{ $accessory->price }}
                            <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        </h6>
                    @endif
                    @if ($accessory->discount_price)
                        <h6 class="text-white mt-1 text-bg-light">
                            {{ $accessory->discount_price }}
                            <span><i class="fa-solid fa-bangladeshi-taka-sign sm"></i></span>
                        </h6>
                    @endif
                    <div class="d-flex mt-2 btn-group" >
                        <a href="{{ route('cart.add', $accessory->id) }}" id="contactbtn" class="btn add-to-cart me-2 {{ $accessory->stock === 'Out of Stock' ? 'disabled' : '' }}">
                           <i class="fa-solid fa-cart-shopping" style="color: #ffd700;"></i>
                        </a>
                        <form action="{{ route('checkout.form') }}" method="GET">
                            @csrf
                            <input type="hidden" name="subtotal" id="checkout-subtotal" value="{{ $accessory->discount_price && $accessory->discount_valid_time > now() ? $accessory->discount_price : $accessory->price }}">
                            <input type="hidden" name="discount" id="checkout-discount" value="0">
                            <input type="hidden" name="total" id="checkout-total" value="{{ $accessory->discount_price && $accessory->discount_valid_time > now() ? $accessory->discount_price : $accessory->price }}">
                            <button type="submit" class="btn btn-sm">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-3">
    {{ $accessories->links('pagination::bootstrap-5') }}
</div>
@endsection







