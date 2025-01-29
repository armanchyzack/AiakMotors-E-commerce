@extends('Frontend.layouts.front_end')
@section('content')
<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: auto;
    }

    .box {
        background-color: #2c2c2c;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #333;
        color: #ffd700;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
    }

    .prize-info {
        padding: 15px;
        background-color: #444;
        border-radius: 10px;
        margin-top: 20px;
        color: #ffd700;
    }

    .prize-info p {
        margin-bottom: 10px;
    }

    /* Button Styles */
    .btnn {
        border: 2px solid #ffd700;
        background-color: transparent;
        color: #ffd700;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btnn:hover {
        background-color: #ffd700;
        color: #333;
    }

    .btnn:active {
        transform: scale(0.98);
    }

    .btnn:focus {
        outline: none;
    }

    /* Text Styling */
    h3 {
        font-size: 28px;
        font-weight: bold;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        .card-header {
            font-size: 24px;
        }

        .prize-info {
            padding: 10px;
        }

        .btnn {
            width: 100%;
            padding: 12px 20px;
            font-size: 18px;
        }

        h3 {
            font-size: 22px;
        }
    }

    @media (max-width: 480px) {
        .btnn {
            font-size: 16px;
            padding: 12px 15px;
        }

        h3 {
            font-size: 20px;
        }
    }
</style>

<!--login form-->
<div class="container mt-3">
    <div class="box">
        <div class="card">
            <div class="card-header">
                <h3>Welcome to {{ Str::ucfirst(env('APP_NAME')) }} {{ Str::ucfirst(Auth::user()->name) }}</h3>
            </div>

            <div class="card">
                @if ($latestSpin)
    @php
        $isExpired = now()->greaterThan($latestSpin->expires_at);
        $isUsed = $latestSpin->is_used;  // Check if the prize is used
    @endphp
    <div class="prize-info">
        @if ($isUsed)
            <p>Your prize has already been used.Try after 30 days</p>
        @elseif ($isExpired)
            <p>Your prize has expired.</p>
        @else
            @if ($latestSpin->discount)
                <p>Congratulations! You won a {{ $latestSpin->discount }}% discount!</p>
            @else
                <p>Congratulations, you won {{ $latestSpin->prize }} Off</p>
            @endif
            <p>Your prize expires on {{ $latestSpin->expires_at->format('d M Y H:i') }}.</p>
        @endif
    </div>



@else
    <p>You have not won any prizes yet.</p>
@endif

                <p><a href="{{ route('our.shop.details') }}" class="btnn btn mt-3">Contact</a></p>
                <p><a href="{{ route('profile.edit') }}" class="btnn btn">Edit Profile</a></p>
                <p><a class="btnn btn" href="{{ route('order.list') }}">My Orders</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
