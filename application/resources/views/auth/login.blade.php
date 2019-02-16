<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ATM, by Agilia systems') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    </style>

    <!-- Custom fonts for this template-->
    {{--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">--}}

    <!-- Custom styles for this template-->
    {{--<link href="css/sb-admin.css" rel="stylesheet">--}}

</head>

<body class="bg-dark">

<div class="container" id="app">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus placeholder="Email address" required >
                        <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <label for="password">{{ __('Password') }}</label>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="{{ __('Login') }}">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                <a class="d-block small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </div>
            <div><img  class="img-fluid" src="images\big_logo.jpg" alt="Logo"></div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

</body>

</html>


