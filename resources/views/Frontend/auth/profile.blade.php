@extends('Frontend.layouts.front_end')

@section('content')
    <!-- Profile Update Form -->
    <div class="container mt-3">
        <div class="box">

            <div class="card" style="border: 5px solid #ffd700; border-radius: 5%;">
                <div class="card-header text-bg" style="color: #ffd700">
                    <h1>{{ __('Update Profile') }}</h1>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="name" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" required autocomplete="name" placeholder="Enter your name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="row mb-3">
                            <label for="email" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="email" placeholder="Enter your email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="row mb-3">
                            <label for="password" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter new password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="row mb-3">
                            <label for="password_confirmation" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6" style="border: 1px solid #ffd700">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
