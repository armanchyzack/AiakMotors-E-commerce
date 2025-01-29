@extends('Frontend.layouts.front_end')

@section('sidenav')
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="{{ route('car') }}" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="{{ route('accessory') }}" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; ">
        <a href="{{ route('service') }}" class="d-flex" style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
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
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Price Filter
            </button>
            <select id="sortOrder" class="dropdown-menu dropdown-menu-dark">
                <option value="high_to_low" class="btn" type="submit">High to Low</option>
                <option value="low_to_high" class="btn">Low to High</option>
            </select>
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

<div class="container">
    <h2 class="text-center" style="color:#ffd700;">Category: {{ Str::ucfirst($category->title) }}</h2>

    <!-- Display Cars -->
    <div class="row">
        <h3>Products</h3>
        @foreach ($paginatedItems as $product)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="card">
                    <img src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?cs=srgb&dl=pexels-mikebirdy-170811.jpg&fm=jpg" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <div id="quantity">
                            <span>
                                @if ($product->stock === 'In Stock')
                                    Available Now
                                @elseif ($product->stock  === 'Out of Stock')
                                    Currently Unavailable
                                @elseif ($product->stock  === 'Limited Stock')
                                    Hurry! Limited Stock
                                @endif
                            </span>
                        </div>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <p class="card-text">Price: {{ $product->price }} <span><i class="fa-solid fa-bangladeshi-taka-sign"></i></span></p>
                        <!-- View Details -->
                        <a href="{{ route('item.show', ['type' => $product instanceof Car ? 'car' : 'accessory', 'id' => $product->id]) }}" id="contactbtn" class="btn">View Details</a>

                        @if('type' == 'accessory'){
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
                        }
                     @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $paginatedItems->links('pagination::bootstrap-5') }}
    </div>


</div>

@endsection
