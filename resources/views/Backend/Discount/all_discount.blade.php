{{-- Coupon Index View (Backend.Coupons.index) --}}
@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="container">
    <h2>Manage Coupons</h2>
    <a href="{{ route('discount.code.view') }}" class="btn btn-primary mb-3">Create New Coupon</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Code</th>
                <th>Discount</th>
                <th>Section</th>
                <th>Status</th>
                <th>Usage Limit</th>
                <th>Totall Limit</th>
                <th>Valid From</th>
                <th>Valid Until</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount }}</td>
                    <td>{{ ucfirst($coupon->section) }}</td>
                    <td>{{ ucfirst($coupon->status) }}</td>
                    <td>{{ $coupon->usage_limit_per_user }}</td>
                    <td> {{ $coupon->usage_limit_total }}</td>
                    <td>{{ $coupon->valid_from->format('Y-m-d H:i') }}</td>
                    <td>{{ $coupon->valid_until->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('discount.code.edit', $coupon) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('discount.code.delete', $coupon) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this coupon?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
