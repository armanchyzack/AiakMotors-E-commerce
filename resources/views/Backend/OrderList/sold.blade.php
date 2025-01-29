@extends('Backend.Layouts.back_end_layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Delivered Orders (Sold Items)</h2>
    </div>
    <div class="card-body row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Total</th>
                    <th>Date Shipped</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $orders->links() }}
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('warning'))
    <div class="alert alert-warning">{{ session('warning') }}</div>
@endif
@endsection
