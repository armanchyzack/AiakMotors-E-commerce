@extends('Frontend.layouts.front_end')

@section('product')
    12
@endsection

@section('content')
    <style>
        #related img {
            height: 22vh;
        }

        .prductimg img.card-img-top {
            height: 22vh;
        }

        .breadcrumb {
            display: flex;
            list-style: none;
            padding: 0.75rem 1rem;
            background-color: rgba(170, 182, 7, 0.7);
            backdrop-filter: saturate(180%) blur(10px);
            border-radius: 0.5rem;
        }

        .breadcrumb-item {
            margin-right: 5px;
        }

        .breadcrumb-item a {
            text-decoration: none;
            color: #fff;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }

        .breadcrumb-item.active {
            color: #ffd700;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: white;
            content: var(--bs-breadcrumb-divider, "/");
        }

        .carousel img {
            max-height: 300px;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .card-body h5 {
            color: #ffd700;
        }

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

        .btn {
            border-radius: 20px;
        }

        #relaed .card-img, .card-img-top {
    height: 18vh !important;
    margin: auto;
}
    </style>

    <!-- Breadcrumb -->
    <div class="container p-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breadcrumb as $crumb)
                    @if ($crumb['url'])
                        <li class="breadcrumb-item">
                            <a href="{{ $crumb['url'] }}">{{ $crumb['name'] }}</a>
                        </li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $crumb['name'] }}
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>

        <!-- Product Details -->
        @if ($type === 'car' || $type === 'accessory')
            <div class="card col-12 mt-3 mx-auto" style="max-width: 800px;">
                @if ($type === 'car')
                    <!-- Carousel -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if ($item && count($image) > 0)
                                <div class="carousel-item active">
                                    <img src="https://www.gemoo-resource.com/tools/img/image_urlgenerator_step2@2x.png" class="d-block w-100" alt="...">
                                </div>
                                @foreach ($image as $img)
                                    <div class="carousel-item">
                                        <img src="{{ $img->image_url }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img src="{{ $item->image_url }}" class="d-block w-100" alt="...">
                                </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                @else
                    <img src="https://www.gemoo-resource.com/tools/img/image_urlgenerator_step2@2x.png" class="d-block w-100" alt="{{ $item->name }}">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ Str::ucfirst($item->name) }}</h5>
                    <div id="quantity">
                        <span>
                            @if ($item->stock === 'In Stock')
                                Available Now
                            @elseif ($item->stock  === 'Out of Stock')
                                Currently Unavailable
                            @elseif ($item->stock  === 'Limited Stock')
                                Hurry! Limited Stock
                            @endif
                        </span>
                    </div>
                    <h6 class="text-white mt-1 text-bg-light">
                        @if ($item->discount_price)
                            <span class="text-decoration-line-through">{{ $item->price }} <i
                                    class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                            <span class="ms-2">{{ $item->discount_price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                        @else
                            {{ $item->price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        @endif
                    </h6>
                    <p class="mt-3" style="color: #ffd700;">{!! $item->description !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        @if ($type === 'accessory')
                            <form action="{{ route('checkout.form') }}" method="GET">
                                @csrf
                                <input type="hidden" name="subtotal" value="{{ $item->discount_price ?? $item->price }}">
                                <button type="submit" class="btn btn-warning">Buy Now</button>
                            </form>
                        @endif

                        @if ($type == 'car')
                            <a href="#social" class="text-start" style="color: #ffd700;">Contact us:</a>
                            <p class="text-end" style="color: #ffd700;" id="phoneNumber" onclick="copyAndCall()">+01888888888</p>
                        @elseif ($type == 'accessory')

                            <a href="{{ route('cart.add', $item->id) }}" style="background: inherit; color:#ffd700;" class="btn add-to-cart btn-warning {{ $item->stock === 'Out of Stock' ? 'disabled' : '' }}">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </a>

                        @endif

                    </div>
                </div>
            </div>
        @endif

        <!-- Related Products -->
        <div class="mt-5">
            <h3 class="text-center" style="color: #ffd700;">Related Products</h3>
            <hr>
            <div class="row">
                @foreach ($relatedProducts as $related)
                    <div class="col-md-3 col-6 mb-4">
                        <div class="card h-100" id="related">
                            <a href="{{ route('item.show', ['type' => $type, 'id' => $related->id]) }}">
                                <img src="https://www.gemoo-resource.com/tools/img/image_urlgenerator_step2@2x.png" class="card-img-top" alt="{{ $related->name }}">
                            </a>
                            <div class="card-body text-center">
                                <h6 style="color: #ffd700;">{{ $related->name }}</h6>
                                <p class="text-white mb-0 d-flex text-center justify-content-between">
                                    @if ($related->discount_price)
                                        <span class="text-decoration-line-through">{{ $related->price }} <i
                                                class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                        <span class="ms-2">{{ $related->discount_price }} <i
                                                class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                    @else
                                        {{ $related->price }} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @push('customJs')
    <script>
        function copyAndCall() {
            // Step 1: Copy the number to the clipboard
            const phoneNumber = document.getElementById("phoneNumber").textContent;

            navigator.clipboard.writeText(phoneNumber).then(() => {
                alert("Phone number copied to clipboard!");

                // Step 2: Initiate a call using the phone's call app (works on mobile)
                window.location.href = `tel:${phoneNumber}`;
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        }
    </script>
    @endpush
@endsection
