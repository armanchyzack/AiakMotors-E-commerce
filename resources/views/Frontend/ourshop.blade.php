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
    <div class="container mt-5">
        <h2 class="text-center" style="color: #ffd700;">About Us</h2>

        @if ($companyInfo)
            <div class="row">
                <div class="col-12">
                    <h4 style="color: #ffd700;">Our Story</h4>
                    <p style="color: #fff;">
                        {{ $companyInfo->details }}
                    </p>
                </div>
            </div>

            <div class="mt-5">
                <h4 style="color: #ffd700;">Contact Information</h4>
                <p style="color: #fff;">
                    <strong>Phone Number:</strong> {{ $companyInfo->phone_number }}<br>
                    <strong>Email:</strong> <a href="mailto:{{ $companyInfo->email }}" style="color: #ffd700;">{{ $companyInfo->email }}</a><br>
                    <strong>Address:</strong> {{ $companyInfo->address }}<br>
                    
                        {{ $companyInfo->address_map_link }}

                </p>
            </div>

            <div class="mt-5">
                <h4 style="color: #ffd700;">Visit Us</h4>
                <div id="google-map" style="width: 100%; height: 400px;"></div>
            </div>
        @else
            <p style="color: #fff;">No company information available.</p>
        @endif
    </div>

    @push('customJs')
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAP_API_KEY&callback=initMap" async defer></script>

        <script>
            function initMap() {
                // Use the coordinates from the company's map link (assumed to be in 'lat,lng' format)
                var location = {
                    lat: parseFloat('{{ explode(",", $companyInfo->address_map_link)[0] }}'),
                    lng: parseFloat('{{ explode(",", $companyInfo->address_map_link)[1] }}')
                };

                var map = new google.maps.Map(document.getElementById("google-map"), {
                    zoom: 15,
                    center: location,
                });

                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Your Company",
                });
            }
        </script>
    @endpush
@endsection
