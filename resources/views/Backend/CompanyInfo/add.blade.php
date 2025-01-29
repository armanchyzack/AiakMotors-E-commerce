{{-- Coupon Create View (Backend.Coupons.create) --}}
@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="container mt-5">
    <h2 class="text-center">Company Information</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ isset($companyInfo) ? route('company.info.update', $companyInfo) : route('company.info.store') }}" method="POST">
        @csrf
        @if(isset($companyInfo))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $companyInfo->phone_number ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $companyInfo->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea class="form-control" id="details" name="details" rows="3" required>{{ old('details', $companyInfo->details ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $companyInfo->address ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="address_map_link" class="form-label">Google Map Address Link</label>
            <input type="text" class="form-control" id="address_map_link" name="address_map_link" value="{{ old('address_map_link', $companyInfo->address_map_link ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($companyInfo) ? 'Update' : 'Save' }}</button>
    </form>

    <div class="mt-5 mb-3">
        <h4>Visit Us</h4>
        @if(isset($companyInfo) && $companyInfo->address_map_link)
            <div id="google-map" style="width: 100%; height: 400px;"></div>
        @endif
    </div>
</div>

@push('customJs')
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAP_API_KEY&callback=initMap" async defer></script>
    <script>
        function initMap() {
            @if(isset($companyInfo) && $companyInfo->address_map_link)
                var location = { lat: parseFloat('{{ $companyInfo->address_map_link }}'.split(',')[0]), lng: parseFloat('{{ $companyInfo->address_map_link }}'.split(',')[1]) };
                var map = new google.maps.Map(document.getElementById("google-map"), {
                    zoom: 15,
                    center: location,
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: "Your Company",
                });
            @endif
        }
    </script>
@endpush
@endsection
