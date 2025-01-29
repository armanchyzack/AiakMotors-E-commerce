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
    .popup {
        display: none;
        position: fixed;
        padding: 10px;
        width: 280px;
        left: 50%;
        margin-left: -150px;
        height: 180px;
        top: 50%;
        margin-top: -100px;
        background: #FFF;
        border: 3px solid #ffd700;
        z-index: 20;
    }

    #popup:after {
        position: fixed;
        content: "";
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: -2;
    }

    #popup:before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: #FFF;
        z-index: -1;
    }

    .popupk {
        display: none;
        position: fixed;
        padding: 10px;
        width: 280px;
        left: 50%;
        margin-left: -150px;
        height: 60vh;
        top: 50%;
        margin-top: -100px;
        background: #FFF;
        border: 3px solid #ffd700;
        z-index: 20;
    }

    #popupk:after {
        position: fixed;
        content: "";
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: -2;
    }

    #popupk:before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background: #FFF;
        z-index: -1;
    }

    .popup img {
        height: 150px;
        width: 260px;
    }
</style>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
    @foreach ($cars as $car)
        <div class="col">
            <div class="card h-100" style="border-radius: 5%">
                <img src="{{ $car->image_url }}" class="card-img-top" alt="{{ $car->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ Str::ucfirst($car->name) }}</h5>
                    @if ($car->discount_price)
                        <h6 class="text-white mt-1 text-bg-light text-decoration-line-through">{{ $car->price }} <span><i
                                    class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                    @else
                        <h6 class="text-white mt-1 text-bg-light">{{ $car->price }} <span><i
                                    class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                    @endif
                    @if ($car->discount_price)
                        <h6 class="text-white mt-1 text-bg-light">{{ $car->discount_price }} <span><i
                                    class="fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                    @endif
                    <button class="btn btn-sm allimg gallery-link" onclick="show('popup-{{ $car->id }}')">All Image</button>
                    <div class="d-flex mt-2">
                        <a id="contactbtn" href="{{ route('item.show', ['type' => 'car', 'id' => $car->id]) }}" class="btn btn-sm">More Details</a>
                    </div>
                </div>

                <!-- Image Gallery Pop-up -->
               <!-- Image Gallery Pop-up -->
               <div id="popup-{{ $car->id }}" class="popup">
                <div id="carousel-{{ $car->id }}" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        @foreach ($car->images as $index => $img)
                            <button type="button" data-bs-target="#carousel-{{ $car->id }}" data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>

                    <!-- Slideshow -->
                    <div class="carousel-inner">
                        @foreach ($car->images as $index => $img)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $img->image_url }}" alt="Image {{ $index + 1 }}" class="d-block w-100">
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $car->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $car->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <button class="btn btn-sm mt-4" onclick="hide('popup-{{ $car->id }}')">Close</button>
            </div>

            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-3">
    {{ $cars->links('pagination::bootstrap-5') }}
</div>
@push('customJs')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>

$ = function(id) {
                return document.getElementById(id);
            }

            var show = function(id) {
                $(id).style.display = 'block';
            }
            var hide = function(id) {
                $(id).style.display = 'none';
            }





            document.querySelectorAll('.carousel').forEach((carousel) => {
    let startX = 0;
    let endX = 0;

    // Record touch start
    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });

    // Record touch end and detect direction
    carousel.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;

        if (startX > endX + 50) {
            // Swipe left
            bootstrap.Carousel.getInstance(carousel).next();
        } else if (startX < endX - 50) {
            // Swipe right
            bootstrap.Carousel.getInstance(carousel).prev();
        }
    });
});

        </script>
    @endpush
@endsection















