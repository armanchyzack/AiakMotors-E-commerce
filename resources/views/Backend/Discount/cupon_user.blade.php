{{-- Coupon Index View (Backend.Coupons.index) --}}
@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="container">
    <h2>Manage Coupons</h2>
    <a href="{{ route('discount.code.all') }}" class="btn btn-primary mb-3">Create New Coupon</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Coupon Code</th>
                <th>Total Usage</th>
            </tr>
        </thead>
        <tbody>
            @foreach($couponUsageData as $key=>$usage)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $usage->user->name }}</td>
                <td>{{ $usage->coupon->code }}</td>
                <td>{{ $usage->total_usage }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
