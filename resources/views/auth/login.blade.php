<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        .custom-color {
            color: #233a4a;
        }
        .custom-border {
            border-color: #233a4a !important;
        }
        .custom-bg {
            background-color: #233a4a !important;
        }
        .custom-bg:hover {
            background-color: #1d2e3c !important;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-5 p-4 bg-white rounded shadow-lg">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Title -->
            <h2 class="text-center mb-4 custom-color">Login</h2>

            <!-- Email Address -->
            <div class="form-group">
                <label for="username" class="custom-color font-weight-bold">{{ __('Username') }}</label>
                <input id="username" class="form-control custom-border custom-focus" type="text" name="username" required autofocus autocomplete="username">
                @if ($errors->has('username'))
                    <div class="text-danger mt-2">{{ $errors->first('username') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="custom-color font-weight-bold">{{ __('Password') }}</label>
                <input id="password" class="form-control custom-border custom-focus" type="password" name="password" required autocomplete="current-password">
                @if ($errors->has('password'))
                    <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="form-group form-check">
                <input id="remember_me" type="checkbox" class="form-check-input custom-border" name="remember">
                <label for="remember_me" class="form-check-label custom-color">{{ __('Remember me') }}</label>
            </div>

            <!-- Forgot Password and Submit Button -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                @if (Route::has('password.request'))
                    <a class="text-decoration-none custom-color" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn custom-bg text-white w-100">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
