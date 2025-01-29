{{-- Coupon Edit View (Backend.Coupons.edit) --}}
@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="container">
    <h2>Edit Coupon</h2>
    <form action="{{ route('discount.code.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This tells Laravel it's an update request -->

        <div class="form-group">
            <label for="code">Coupon Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $coupon->code) }}" required>
        </div>

        <div class="form-group">
            <label for="discount">Discount Amount</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount', $coupon->discount) }}" required step="0.01">
        </div>

        <div class="form-group">
            <label for="section">Target Section</label>
            <select name="section" id="section" class="form-control" required>
                <option value="accessory" {{ $coupon->section == 'accessory' ? 'selected' : '' }}>Accessory</option>
                <option value="car" {{ $coupon->section == 'car' ? 'selected' : '' }}>Car</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ $coupon->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $coupon->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="usage_limit_per_user">Usage Limit Per User</label>
            <input type="number" name="usage_limit_per_user" id="usage_limit_per_user" class="form-control" value="{{ old('usage_limit_per_user', $coupon->usage_limit_per_user) }}" required min="1">
        </div>

        <div class="form-group">
            <label for="usage_limit_total">Total Usage Limit</label>
            <input type="number" name="usage_limit_total" id="usage_limit_total" class="form-control" value="{{ old('usage_limit_total', $coupon->usage_limit_total) }}" required min="1">
        </div>

        <div class="form-group">
            <label for="valid_from">Valid From</label>
            <input type="datetime-local" name="valid_from" id="valid_from" class="form-control" value="{{ old('valid_from', $coupon->valid_from->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="valid_until">Valid Until</label>
            <input type="datetime-local" name="valid_until" id="valid_until" class="form-control" value="{{ old('valid_until', $coupon->valid_until->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Coupon</button>
        <a href="{{ route('discount.code.all') }}" class="btn btn-secondary">Back to Coupons List</a>
    </form>
</div>
@endsection
