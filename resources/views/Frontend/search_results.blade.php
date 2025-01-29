@extends('Frontend.layouts.front_end')

@section('sidenav')
<div class="col-3 sidenavbar" style="height: 100vh;">
    <div class="sidenav">
        <a href="{{ route('car') }}" class="d-flex" style="color: #ffd700">Car <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="{{ route('accessory') }}" class="d-flex" style="color: #ffd700">Accessories <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="{{ route('service') }}" class="d-flex" style="color: #ffd700">Service <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="{{ route('spinner') }}" class="d-flex" style="color: #ffd700">Spin Wheel <span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
        <a href="{{ route('our.shop.details') }}" class="d-flex" style="color: #ffd700">About Us<span class="ms-2"><i class="fa-solid fa-arrow-right" style="color: #ffd700"></i></span></a>
        <hr style="width: 100%; color: #ffd700; " />
    </div>
</div>
@endsection

@section('catefilter')
<div class="row">
    <div class="col-6">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <button class="btn btn-secondary dropdown-toggle btn-sm w-100" type="button" id="priceFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: inherit; border: 2px solid #ffd700; color: #ffd700;">
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
<div class="container mt-4">
    <h2  class="text-white">Search Results for "{{Str::ucfirst( $query) }}"</h2>

    @if($cars->isEmpty() && $accessories->isEmpty())
        <p  style="color: #ffd700;">No products found matching your search.</p>
    @else
        <div class="row">
            <!-- Cars Results -->
            @if($cars->isNotEmpty())
                <div class="col-12">
                    <h3>Cars</h3>
                    <div class="row">
                        @foreach ($cars as $car)
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="card">
                                    <img src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="{{ $car->name }}" class="card-img-top" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $car->name }}</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="card-text">Price: {{ $car->price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                            <a href="{{ route('item.show', ['type' => 'car', 'id' => $car->id]) }}" class="btn btn-warning btn-sm">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination for Cars -->
                    <div class="d-flex justify-content-center">
                        {{ $cars->appends(['query' => $query])->links() }}
                    </div>
                </div>
            @endif

            <!-- Accessories Results -->
            @if($accessories->isNotEmpty())
                <div class="col-12 mt-4">
                    <h3>Accessories</h3>
                    <div class="row">
                        @foreach ($accessories as $accessory)
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="card">
                                    <img src="https://images.pexels.com/photos/170811/pexels-photo-170811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="{{ $accessory->name }}" class="card-img-top" />
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $accessory->name }}</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            @if ($accessory->discount_price)
                                                <span class="text-muted text-decoration-line-through">{{ $accessory->price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                                <span class="text-success">{{ $accessory->discount_price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                            @else
                                                <span>{{ $accessory->price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                            @endif
                                            <a href="{{ route('item.show', ['type' => 'accessory', 'id' => $accessory->id]) }}" class="btn btn-warning btn-sm">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="d-flex justify-content-center mt-3">
                        {{ $accessories->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>

@endsection
