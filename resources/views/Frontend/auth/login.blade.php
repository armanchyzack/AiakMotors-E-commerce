@extends('Frontend.layouts.front_end')

@section('content')
    <!--login form-->
    <div class="container mt-3">
        <div class="box">

          <div class="card" style="border: 5px solid #ffd700; border-radius: 5%;">
            <div class="card-header text-bg" style="color: #ffd700"><h1>{{ __('Login') }}</h1></div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6"  style="border: 1px solid #ffd700">
                            <input id="email" aria-label="Email address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="hi">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" style="color: #ffd700" class="me-2 col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6" style="border: 1px solid #ffd700;">
                            <input id="password" type="password" class=" custom-input  form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" style="border: 1px solid #ffd700"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember" style="color: #ffd700" >
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class=" btn-sm text-sm nav-link" style="color: #ffd700" href="{{ route('user.password.forget', ['token' => $token ?? 'default_token'] ) }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <a class="nav-link" href="{{ route('user.register') }}" style="color: #ffd700;">
                                You don't have account !Sign Up.
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
      </div>



@endsection
