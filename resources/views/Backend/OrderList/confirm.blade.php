@extends('Backend.Layouts.back_end_layout')
@section('content')
    <h2>Confirmed Orders</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Product Names</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user ? $order->user->name : 'User not found' }}</td>
                    <td>{{ $order->product_names }}</td>
                    <td>{{ $order->discounted_total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <!-- Status selection with Bootstrap styling -->
                        <form action="{{ route('orders.update.status', $order->id) }}" method="POST">
                            @csrf
                            @method('patch')

                            <select name="status" class="form-select form-select-sm">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $order->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>

                            <button type="submit" class="btn btn-primary btn-sm mt-2">Update Status</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
