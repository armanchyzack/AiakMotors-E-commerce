@extends('Frontend.layouts.front_end')

@section('content')

<style>
    @media (max-width: 576px) {
        table {
            font-size: 12px;
        }
        .badge {
            font-size: 10px;
        }
        .order-item p {
            font-size: 12px;
        }
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #2d2d2d;
    }
    .table-striped tbody tr:nth-of-type(even) {
        background-color: #1f1f1f;
    }
    table.table.table-striped {
        color: #ffd700 !important;
    }
    td {
        color: #ffd700 !important;
    }
    hr {
        color: #ffd700;
    }
    h1 {
        color: #ffd700;
    }
    .alert-info {
        color: #ffd700;
        background-color: inherit;
        border-color: #ffd700;
    }
    .order-item {
        margin-bottom: 10px;
    }
    .order-item p {
        margin: 0;
    }
</style>

<div class="container my-5">
    <h1 class="text-center mb-4">Your Order List:</h1>
    <hr/>

    @if($orders->isEmpty())
        <div class="alert alert-info text-center">You have no orders yet.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>৳{{ number_format($order->total, 2) }}</td>
                            </td>
                            <td>{{ $order->created_at->format('d M, Y') }}</td>
                            <td>
                                @if($order->product_names)
                                    <p>{{ $order->product_names }}</p>
                                @else
                                    <p>No product names available.</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>





        </div>
    @endif
</div>

@endsection
