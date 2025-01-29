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
@section('product')
9
@endsection





@section('content')

<div class="card-group carde">
    @foreach ($services as $service)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card mb-4" style="border-radius: 5%; background-color: #2f2f2f;">
            <img src="https://picsum.photos/200/300" class="card-img-top" alt="{{ $service->name }}">
            <div class="card-body text-white">
                <h5 class="card-title">{{ Str::ucfirst($service->name) }}</h5>
                <h6 class="mt-1 text-bg-light text-dlight">{{ $service->price }}<span><i class="ms-1 fa-solid fa-bangladeshi-taka-sign sm"></i></span></h6>
                <div class="mt-2">
                    <a href="#social" id="contactbtn" class="btn  add-to-cart me-2">Contact Us</a>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $services->links('pagination::bootstrap-5') }}
</div>

@endsection
